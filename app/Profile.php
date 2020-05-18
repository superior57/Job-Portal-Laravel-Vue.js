<?php

/**
 * Class Profile.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use File;
use Storage;
use function Opis\Closure\serialize;
use function Opis\Closure\unserialize;
use DB;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

/**
 * Class Profile
 *
 */
class Profile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'department_id', 'no_of_employees', 'freelancer_type',
        'english_level', 'hourly_rate', 'experience', 'education', 'awards',
        'projects', 'saved_freelancer', 'saved_jobs', 'saved_employers',
        'rating', 'address', 'longitude', 'latitude', 'avater', 'banner',
        'gender', 'tagline', 'description', 'delete_reason', 'delete_description',
        'profile_searchable', 'profile_blocked', 'weekly_alerts', 'message_alerts'
    ];

    /**
     * Get the department that owns the employer.
     *
     * @return relation
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    /**
     * Get the user that has the profile.
     *
     * @return relation
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Store Profile in database
     *
     * @param mixed   $request Request Attributes
     * @param integer $user_id User ID
     *
     * @return json response
     */
    public function storeProfile($request, $user_id)
    {
        $user = User::find($user_id);
        if ($user->first_name . '-' . $user->last_name != $request['first_name'] . '-' . $request['last_name']) {
            $user->slug = filter_var($request['first_name'], FILTER_SANITIZE_STRING) . '-' .
                filter_var($request['last_name'], FILTER_SANITIZE_STRING);
        }
        $user->first_name = filter_var($request['first_name'], FILTER_SANITIZE_STRING);
        $user->last_name = filter_var($request['last_name'], FILTER_SANITIZE_STRING);
        if (!empty($request['email'])) {
            $user->email = filter_var($request['email'], FILTER_SANITIZE_STRING);
        }
        $location = Location::find($request['location']);
        $user->location()->associate($location);
        $user->save();
        $user->skills()->detach();
        if ($request['skills']) {
            $skills = $request['skills'];
            $user->skills()->detach();
            if (!empty($skills)) {
                foreach ($skills as $skill) {
                    $user->skills()->attach($skill['id'], ['skill_rating' => $skill['rating']]);
                }
            }
        }

        $user_profile = $this::select('id')->where('user_id', $user_id)
            ->get()->first();
        if (!empty($user_profile->id)) {
            $profile = Profile::find($user_profile->id);
        } else {
            $profile = $this;
        }

        $profile->user()->associate($user_id);
        $profile->freelancer_type = 'Basic';
        $profile->hourly_rate = intval($request['hourly_rate']);
        $profile->gender = filter_var($request['gender'], FILTER_SANITIZE_STRING);
        $profile->tagline = filter_var($request['tagline'], FILTER_SANITIZE_STRING);
        $profile->description = filter_var($request['description'], FILTER_SANITIZE_STRING);
        $profile->address = filter_var($request['address'], FILTER_SANITIZE_STRING);
        $profile->longitude = filter_var($request['longitude'], FILTER_SANITIZE_STRING);
        $profile->latitude = filter_var($request['latitude'], FILTER_SANITIZE_STRING);
        if ($request['employees']) {
            $profile->no_of_employees = intval($request['employees']);
        }
        if ($request['department']) {
            $department = Department::find($request['department']);
            $profile->department()->associate($department);
        }
        $old_path = Helper::PublicPath() . '/uploads/users/temp';
        if (!empty($request['hidden_avater_image'])) {
            $filename = $request['hidden_avater_image'];
            if (file_exists($old_path . '/' . $request['hidden_avater_image'])) {
                $new_path = Helper::PublicPath() . '/uploads/users/' . $user_id;
                if (!file_exists($new_path)) {
                    File::makeDirectory($new_path, 0755, true, true);
                }
                $filename = time() . '-' . $request['hidden_avater_image'];
                rename($old_path . '/' . $request['hidden_avater_image'], $new_path . '/' . $filename);
                rename($old_path . '/small-' . $request['hidden_avater_image'], $new_path . '/small-' . $filename);
                rename($old_path . '/medium-small-' . $request['hidden_avater_image'], $new_path . '/medium-small-' . $filename);
                rename($old_path . '/medium-' . $request['hidden_avater_image'], $new_path . '/medium-' . $filename);
                if (file_exists($old_path . '/listing-' . $request['hidden_avater_image'])) {
                    rename($old_path . '/listing-' . $request['hidden_avater_image'], $new_path . '/listing-' . $filename);
                }
            }
            $profile->avater = filter_var($filename, FILTER_SANITIZE_STRING);
        } else {
            $profile->avater = null;
        }
        if (!empty($request['hidden_banner_image'])) {
            $filename = $request['hidden_banner_image'];
            if (file_exists($old_path . '/' . $request['hidden_banner_image'])) {
                $new_path = Helper::PublicPath() . '/uploads/users/' . $user_id;
                if (!file_exists($new_path)) {
                    File::makeDirectory($new_path, 0755, true, true);
                }
                $filename = time() . '-' . $request['hidden_banner_image'];
                rename($old_path . '/' . $request['hidden_banner_image'], $new_path . '/' . $filename);
                rename($old_path . '/small-' . $request['hidden_banner_image'], $new_path . '/small-' . $filename);
                rename($old_path . '/medium-' . $request['hidden_banner_image'], $new_path . '/medium-' . $filename);
            }
            $profile->banner = filter_var($filename, FILTER_SANITIZE_STRING);
        } else {
            $profile->banner = null;
        }
        $videos = !empty($request['video']) ? $request['video'] : array();
        if (!empty($videos)) {
            foreach ($videos as $key => $video) {
                $videos[$key]['url'] = $video['url'];
            }
            $profile->videos = serialize($videos);
        } else {
            $profile->videos = null;
        }
        return $profile->save();
    }


    /**
     * Store Email Notifications in database
     *
     * @param mixed   $request Request Attributes
     * @param integer $user_id User ID
     *
     * @return save data
     */
    public function storeEmailNotification($request, $user_id)
    {
        $user_profile = $this::select('id')->where('user_id', $user_id)->get()->first();
        if (!empty($user_profile->id)) {
            $user = $this::find($user_profile->id);
        } else {
            $user = $this;
            $user->user()->associate($user_id);
        }
        $user->weekly_alerts = $request['weekly_alerts'];
        $user->message_alerts = $request['message_alerts'];
        return $user->save();
    }

    /**
     * Store Account Settings
     *
     * @param mixed   $request Request Attributes
     * @param integer $user_id User ID
     *
     * @return save data
     */
    public function storeAccountSettings($request, $user_id)
    {
        $user_profile = $this::select('id')->where('user_id', $user_id)->get()->first();
        if (!empty($user_profile->id)) {
            $profile = $this::find($user_profile->id);
        } else {
            $profile = $this;
            $profile->user()->associate($user_id);
        }
        // $profile->profile_searchable = $request['profile_searchable'];
        //$profile->profile_blocked = $request['profile_blocked'];
        $profile->english_level = $request['english_level'];
        $profile->save();
        $user = User::find($user_id);
        $requested_languages = $request['languages'];
        $user->languages()->sync($requested_languages);
        if (Schema::hasColumn('users', 'is_disabled')) {
            $user->is_disabled = $request['is_disabled'];
        }
        $user->save();
    }

    /**
     * Store Profile in database
     *
     * @param mixed   $request Request Attributes
     * @param integer $user_id User ID
     *
     * @return json response
     */
    public function updateAwardProjectSettings($request, $user_id)
    {
        $json = array();
        $user = User::find($user_id);
        $count = 0;
        $award_counter = 0;
        $request_project = array();
        $request_award = array();
        $old_path = Helper::PublicPath() . '/uploads/users/temp';
        if (!empty($request['project'])) {
            foreach ($request['project'] as $key => $project) {
                if ($project['project_title'] == 'Project title here' || $project['project_url'] == 'Project url here') {
                    $json['type'] = 'error';
                    $json['message'] = trans('lang.empty_fields_not_allowed');
                    return $json;
                }
                $request_project[$count]['project_title'] = $project['project_title'];
                $request_project[$count]['project_url'] = $project['project_url'];
                if (!empty($project['project_hidden_image'])) {
                    $filename = $project['project_hidden_image'];
                    if (file_exists($old_path . '/' . $project['project_hidden_image'])) {
                        $new_path = Helper::PublicPath() . '/uploads/users/' . $user_id . '/projects';
                        if (!file_exists($new_path)) {
                            File::makeDirectory($new_path, 0755, true, true);
                        }
                        $filename = time() . $count . '-' . $project['project_hidden_image'];
                        rename($old_path . '/' . $project['project_hidden_image'], $new_path . '/' . $filename);
                        rename($old_path . '/small-' . $project['project_hidden_image'], $new_path . '/small-' . $filename);
                        rename($old_path . '/medium-' . $project['project_hidden_image'], $new_path . '/medium-' . $filename);
                    }
                    $request_project[$count]['project_hidden_image'] = $filename;
                } else {
                    $request_project[$count]['project_hidden_image'] = $project['project_hidden_image'];
                }
                $count++;
            }
        }
        if (!empty($request['award'])) {
            foreach ($request['award'] as $key => $award) {
                if ($award['award_title'] == 'Award title here' || $award['award_date'] == 'Select Award date') {
                    $json['type'] = 'error';
                    $json['message'] = trans('lang.empty_fields_not_allowed');
                    return $json;
                }
                $request_award[$award_counter]['award_title'] = $award['award_title'];
                $request_award[$award_counter]['award_date'] = $award['award_date'];
                if (!empty($award['award_hidden_image'])) {
                    $filename = $award['award_hidden_image'];
                    if (file_exists($old_path . '/' . $award['award_hidden_image'])) {
                        $new_path = Helper::PublicPath() . '/uploads/users/' . $user_id . '/awards';
                        if (!file_exists($new_path)) {
                            File::makeDirectory($new_path, 0755, true, true);
                        }
                        $filename = time() . $award_counter . '-' . $award['award_hidden_image'];
                        rename($old_path . '/' . $award['award_hidden_image'], $new_path . '/' . $filename);
                        rename($old_path . '/small-' . $award['award_hidden_image'], $new_path . '/small-' . $filename);
                        rename($old_path . '/medium-' . $award['award_hidden_image'], $new_path . '/medium-' . $filename);
                    }
                    $request_award[$award_counter]['award_hidden_image'] = $filename;
                } else {
                    $request_award[$award_counter]['award_hidden_image'] = $award['award_hidden_image'];
                }
                $award_counter++;
            }
        }
        $project = !empty($request['project']) ? serialize($request_project) : '';
        $award = !empty($request['award']) ? serialize($request_award) : '';
        $user_profile = $this::select('id')->where('user_id', $user_id)
            ->get()->first();
        if (!empty($user_profile->id)) {
            $profile = Profile::find($user_profile->id);
        } else {
            $profile = $this;
        }
        $profile->user()->associate($user_id);
        $profile->projects = $project;
        $profile->awards = $award;
        $profile->save();
        $json['type'] = 'success';
        return $json;
    }

    /**
     * Add to whish list
     *
     * @param mixed   $column  Request Attributes
     * @param integer $id      ID
     * @param integer $user_id UserID
     *
     * @return json response
     */
    public function addWishlist($column, $id, $user_id)
    {
        $wishlist = array();
        $user_profile = $this::select('id')->where('user_id', $user_id)->get()->first();
        if (!empty($user_profile->id)) {
            $profile = $this::find($user_profile->id);
        } else {
            $profile = $this;
            $profile->user()->associate($user_id);
        }
        $wishlist = unserialize($profile[$column]);
        $wishlist = !empty($wishlist) && is_array($wishlist) ? $wishlist : array();
        $wishlist[] = $id;
        $wishlist = array_unique($wishlist);
        $profile->$column = serialize($wishlist);
        $profile->save();
        if (!empty($column) && ($column === 'saved_employers' || $column === 'saved_freelancer')) {
            DB::table('followers')->insert(
                [
                    'follower' => $user_id, 'following' => $id,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            );
        }

        return "success";
    }

    /**
     * Update experienceEducation
     *
     * @param mixed   $request Request Attributes
     * @param integer $user_id User ID
     *
     * @return json response
     */
    public function updateExperienceEducation($request, $user_id)
    {
        $json = array();
        $count = 0;
        $count2 = 0;
        $request_experiance = array();
        $request_education = array();
        if ($request['experience']) {
            foreach ($request['experience'] as $key => $experinence) {
                if ($experinence['job_title'] == 'Job title' || $experinence['start_date'] == 'Start Date'
                    || $experinence['end_date'] == 'End Date'
                ) {
                    $json['type'] = 'error';
                    $json['message'] = trans('lang.empty_fields_not_allowed');
                    return $json;
                }
                $request_experiance[$count] = $experinence;
                $count++;
            }
        }
        if ($request['education']) {
            foreach ($request['education'] as $key => $education) {
                if ($education['degree_title'] == 'Degree title' || $education['start_date'] == 'Start Date'
                    || $education['end_date'] == 'End Date'
                ) {
                    $json['type'] = 'error';
                    $json['message'] = trans('lang.empty_fields_not_allowed');
                    return $json;
                }
                $request_education[$count2] = $education;
                $count2++;
            }
        }
        $experience = !empty($request['experience']) ? serialize($request_experiance) : '';
        $education = !empty($request['education']) ? serialize($request_education) : '';
        $user_profile = $this::select('id')->where('user_id', $user_id)
            ->get()->first();
        if (!empty($user_profile->id)) {
            $profile = Profile::find($user_profile->id);
        } else {
            $profile = $this;
        }
        $profile->user()->associate($user_id);
        $profile->experience = $experience;
        $profile->education = $education;
        $profile->save();
        $json['type'] = 'success';
        return $json;
    }

    /**
     * Save Experiences.
     *
     * @param string $request req->attr
     * @param string $user_id user ID
     *
     * @return \Illuminate\Http\Response
     */
    public function savePayoutDetail($request, $user_id)
    {
        $json = array();
        $count = 0;
        $payouts = array();
        $user_profile = $this::select('id')->where('user_id', $user_id)
            ->get()->first();
        if (!empty($user_profile->id)) {
            $profile = Profile::find($user_profile->id);
        } else {
            $profile = $this;
        }
        $profile->user()->associate($user_id);
        if (!empty($request['payout_settings'])) {
            $payout_setting = $request['payout_settings'];
            $payouts['type'] = $payout_setting['type'];
            if ($payout_setting['type'] == 'paypal') {
                $payouts['paypal_email'] = $payout_setting['paypal_email'];
            } elseif ($payout_setting['type'] == 'bacs') {
                $payouts['bank_account_name'] = $payout_setting['bank_account_name'];
                $payouts['bank_account_number'] = $payout_setting['bank_account_number'];
                $payouts['bank_name'] = $payout_setting['bank_name'];
                $payouts['bank_routing_number'] = $payout_setting['bank_routing_number'];
                $payouts['bank_iban'] = $payout_setting['bank_iban'];
                $payouts['bank_bic_swift'] = $payout_setting['bank_bic_swift'];
            }
        }
        $profile->payout_settings  = serialize($payouts);
        $profile->save();
    }
}
