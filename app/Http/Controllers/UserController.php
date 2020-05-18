<?php

/**
 * Class UserController
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @version <PHP: 1.0.0>
 * @link    http://www.amentotech.com
 */

namespace App\Http\Controllers;

use App\EmailTemplate;
use App\Helper;
use App\Invoice;
use App\Job;
use App\Language;
use App\Mail\AdminEmailMailable;
use App\Mail\FreelancerEmailMailable;
use App\Mail\GeneralEmailMailable;
use App\Package;
use App\Profile;
use App\Proposal;
use App\Report;
use App\Review;
use App\SiteManagement;
use App\User;
use Auth;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Input;
use View;
use App\Offer;
use App\Message;
use Illuminate\Support\Arr;
use App\Payout;
use File;
use Storage;
use PDF;
use App\Item;
use App\Http\Controllers\Exception;
use App\Service;
use App\Order;
use App\Mail\EmployerEmailMailable;
use Illuminate\Support\Facades\Schema;

/**
 * Class UserController
 *
 */
class UserController extends Controller
{
    /**
     * Defining public scope of varriable
     *
     * @access public
     *
     * @var array $user
     */
    use HasRoles;
    protected $user;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @param instance $user    make instance
     * @param instance $profile make profile instance
     *
     * @return void
     */
    public function __construct(User $user, Profile $profile)
    {
        $this->user = $user;
        $this->profile = $profile;
    }

    /**
     * Profile Manage Account/ Profile Settings
     *
     * @access public
     *
     * @return View
     */
    public function accountSettings()
    {
        $languages = Language::pluck('title', 'id');
        $user_id = Auth::user()->id;
        $profile = new Profile();
        $saved_options = $profile::select('profile_searchable', 'profile_blocked', 'english_level')
            ->where('user_id', $user_id)->get()->first();
        $english_levels = Helper::getEnglishLevelList();
        $user_level = !empty($saved_options->english_level) ? $saved_options->english_level : trans('lang.basic');
        $user = $this->user::find($user_id);
        $user_languages = array();
        if (!empty($user->languages)) {
            foreach ($user->languages as $user_language) {
                $user_languages[] = $user_language->id;
            }
        }
        if (file_exists(resource_path('views/extend/back-end/settings/security-settings.blade.php'))) {
            return view(
                'extend.back-end.settings.security-settings',
                compact('languages', 'saved_options', 'user_languages', 'english_levels', 'user_level')
            );
        } else {
            return view(
                'back-end.settings.security-settings',
                compact('languages', 'saved_options', 'user_languages', 'english_levels', 'user_level')
            );
        }
    }

    /**
     * Save user account settings.
     *
     * @param mixed $request request attribute
     *
     * @access public
     *
     * @return View
     */
    public function saveAccountSettings(Request $request)
    {
        $server_verification = Helper::worketicIsDemoSite();
        if (!empty($server_verification)) {
            Session::flash('error', $server_verification);
            return Redirect::back();
        }
        $profile = new Profile();
        $user_id = Auth::user()->id;
        $profile->storeAccountSettings($request, $user_id);
        Session::flash('message', trans('lang.account_settings_saved'));
        return Redirect::back();
    }

    /**
     * Reset password form.
     *
     * @access public
     *
     * @return View
     */
    public function resetPassword()
    {
        if (file_exists(resource_path('views/extend/back-end/settings/reset-password.blade.php'))) {
            return view('extend.back-end.settings.reset-password');
        } else {
            return view('back-end.settings.reset-password');
        }
    }

    /**
     * Update reset password.
     *
     * @param mixed $request request attributes
     *
     * @access public
     *
     * @return View
     */
    public function requestPassword(Request $request)
    {
        $server_verification = Helper::worketicIsDemoSite();
        if (!empty($server_verification)) {
            Session::flash('error', $server_verification);
            return Redirect::back();
        }
        if (!empty($request)) {
            Validator::extend(
                'old_password',
                function ($attribute, $value, $parameters) {
                    return Hash::check($value, Auth::user()->password);
                }
            );
            $this->validate(
                $request,
                [
                    'old_password'         => 'required',
                    'confirm_password'     => 'required',
                    'confirm_new_password' => 'required',
                ]
            );
            $user_id = $request['user_id'];
            $user = User::find($user_id);
            if (Hash::check($request->old_password, $user->password)) {
                if ($request->confirm_password === $request->confirm_new_password) {
                    $user->password = Hash::make($request->confirm_password);
                    // Send email
                    if (!empty(config('mail.username')) && !empty(config('mail.password'))) {
                        $email_params = array();
                        $template = DB::table('email_types')->select('id')->where('email_type', 'reset_password_email')->get()->first();
                        if (!empty($template->id)) {
                            $template_data = EmailTemplate::getEmailTemplateByID($template->id);
                            $email_params['name'] = Helper::getUserName($user_id);
                            $email_params['email'] = $user->email;
                            $email_params['password'] = $request->confirm_password;
                            try {
                                Mail::to($user->email)
                                    ->send(
                                        new GeneralEmailMailable(
                                            'reset_password_email',
                                            $template_data,
                                            $email_params
                                        )
                                    );
                            } catch (\Exception $e) {
                                Session::flash('error', trans('lang.ph_email_warning'));
                                return Redirect::back();
                            }
                        }
                    }
                    $user->save();
                    Session::flash('message', trans('passwords.reset'));
                    Auth::logout();
                    return Redirect::to('/');
                } else {
                    Session::flash('error', trans('lang.confirmation'));
                    return Redirect::back();
                }
            } else {
                Session::flash('error', trans('lang.pass_not_match'));
                return Redirect::back();
            }
        } else {
            Session::flash('error', trans('lang.something_wrong'));
            return Redirect::back();
        }
    }

    /**
     * Email Notification Settings Form.
     *
     * @access public
     *
     * @return View
     */
    public function emailNotificationSettings()
    {
        $user_email = !empty(Auth::user()) ? Auth::user()->email : '';
        if (file_exists(resource_path('views/extend/back-end/settings/email-notifications.blade.php'))) {
            return view('extend.back-end.settings.email-notifications', compact('user_email'));
        } else {
            return view('back-end.settings.email-notifications', compact('user_email'));
        }
    }

    /**
     * Save Email Notification Settings.
     *
     * @param mixed $request request attribute
     *
     * @access public
     *
     * @return View
     */
    public function saveEmailNotificationSettings(Request $request)
    {
        $server_verification = Helper::worketicIsDemoSite();
        if (!empty($server_verification)) {
            Session::flash('error', $server_verification);
            return Redirect::back();
        }
        $profile = new Profile();
        $user_id = Auth::user()->id;
        $profile->storeEmailNotification($request, $user_id);
        Session::flash('message', trans('lang.email_settings_saved'));
        return Redirect::back();
    }

    /**
     * Delete Account From.
     *
     * @access public
     *
     * @return View
     */
    public function deleteAccount()
    {
        if (file_exists(resource_path('views/extend/back-end/settings/delete-account.blade.php'))) {
            return view('extend.back-end.settings.delete-account');
        } else {
            return view('back-end.settings.delete-account');
        }
    }

    /**
     * User delete account.
     *
     * @param mixed $request request attributes
     *
     * @access public
     *
     * @return View
     */
    public function destroy(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $this->validate(
            $request,
            [
                'old_password' => 'required',
                'retype_password'    => 'required',
            ]
        );
        $json = array();
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        if (Hash::check($request->old_password, $user->password)) {
            if (!empty($user_id)) {
                $user->profile()->delete();
                $user->skills()->detach();
                $user->languages()->detach();
                $user->categories()->detach();
                $user->roles()->detach();
                $user->delete();
                if (!empty(config('mail.username')) && !empty(config('mail.password'))) {
                    $delete_reason = Helper::getDeleteAccReason($request['delete_reason']);
                    $email_params = array();
                    $template = DB::table('email_types')->select('id')->where('email_type', 'admin_email_delete_account')->get()->first();
                    if (!empty($template->id)) {
                        $template_data = EmailTemplate::getEmailTemplateByID($template->id);
                        $email_params['reason'] = $delete_reason;
                        Mail::to(config('mail.username'))
                            ->send(
                                new AdminEmailMailable(
                                    'admin_email_delete_account',
                                    $template_data,
                                    $email_params
                                )
                            );
                    }
                }
                Auth::logout();
                $json['acc_del'] = trans('lang.acc_deleted');
                return $json;
            } else {
                $json['type'] = 'warning';
                $json['msg'] = trans('lang.something_wrong');
                return $json;
            }
        } else {
            $json['type'] = 'warning';
            $json['msg'] = trans('lang.pass_mismatched');
            return $json;
        }
    }

    /**
     * Delete user by admin.
     *
     * @param mixed $request request attributes
     *
     * @access public
     *
     * @return View
     */
    public function deleteUser(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request['user_id'])) {
            $user = User::find($request['user_id']);
            if (!empty($user)) {
                $role = $user->getRoleNames()->first();
                if ($role == 'employer') {
                    if (!empty($user->jobs)) {
                        foreach ($user->jobs as $key => $job) {
                            Job::deleteRecord($job->id);
                        }
                    }
                } else if ($role == 'freelancer') {
                    if (!empty($user->proposals)) {
                        foreach ($user->proposals as $key => $proposal) {
                            Proposal::deleteRecord($proposal->id);
                        }
                    }
                }
                $user->profile()->delete();
                $user->skills()->detach();
                $user->services()->detach();
                $user->categories()->detach();
                $user->roles()->detach();
                $user->languages()->detach();
                DB::table('reviews')->where('user_id', $request['user_id'])
                    ->orWhere('receiver_id', $request['user_id'])->delete();
                DB::table('payouts')->where('user_id', $request['user_id'])->delete();
                DB::table('offers')->where('user_id', $request['user_id'])
                    ->orWhere('freelancer_id', $request['user_id'])->delete();
                DB::table('messages')->where('user_id', $request['user_id'])
                    ->orWhere('receiver_id', $request['user_id'])->delete();
                DB::table('items')->where('subscriber', $request['user_id'])
                    ->delete();
                DB::table('followers')->where('follower', $request['user_id'])
                    ->orWhere('following', $request['user_id'])->delete();
                DB::table('disputes')->where('user_id', $request['user_id'])->delete();
                $user->delete();
                $json['type'] = 'success';
                $json['message'] = trans('lang.ph_user_delete_message');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Get Manage Account Data
     *
     * @access public
     *
     * @return View
     */
    public function getManageAccountData()
    {
        if (Auth::user()) {
            $json = array();
            $user_id = Auth::user()->id;
            $profile = User::find($user_id)->profile->first();
            if (!empty($profile)) {
                $json['type'] = 'success';
                if ($profile->profile_searchable == 'true') {
                    $json['profile_searchable'] = 'true';
                }
                if ($profile->profile_blocked == 'true') {
                    $json['profile_blocked'] = 'true';
                }
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Get User Notification Settings
     *
     * @access public
     *
     * @return View
     */
    public function getUserEmailNotificationSettings()
    {
        $json = array();
        $profile = new Profile();
        $notifications = $profile::select('weekly_alerts', 'message_alerts')
            ->where('user_id', Auth::user()->id)->get()->first();
        if (!empty($notifications)) {
            $json['type'] = 'success';
            if ($notifications->weekly_alerts == 'true') {
                $json['weekly_alerts'] = 'true';
            }
            if ($notifications->message_alerts == 'true') {
                $json['message_alerts'] = 'true';
            }
        } else {
            $json['type'] = 'error';
        }
        return $json;
    }

    /**
     * Get User Searchable Settings
     *
     * @access public
     *
     * @return View
     */
    public function getUserSearchableSettings()
    {
        $json = array();
        $profile = new Profile();
        // $user_data = $profile::select('profile_searchable', 'profile_blocked')
        //     ->where('user_id', Auth::user()->id)->get()->first();
        $user_data = User::find(Auth::user()->id);
        if (!empty($user_data)) {
            $json['type'] = 'success';
            if ($user_data->is_disabled == 'true') {
                $json['profile_blocked'] = 'true';
            }
        } else {
            $json['type'] = 'error';
        }
        return $json;
    }

    /**
     * Get user saved item list
     *
     * @param mixed $request request attributes
     * @param int   $role    role
     *
     * @access public
     *
     * @return View
     */
    public function getSavedItems(Request $request, $role = '')
    {
        if (Auth::user()) {
            $user = $this->user::find(Auth::user()->id);
            $profile = $user->profile;
            $saved_jobs        = !empty($profile->saved_jobs) ? unserialize($profile->saved_jobs) : array();
            $saved_freelancers = !empty($profile->saved_freelancer) ? unserialize($profile->saved_freelancer) : array();
            $saved_employers   = !empty($profile->saved_employers) ? unserialize($profile->saved_employers) : array();
            $currency          = SiteManagement::getMetaValue('commision');
            $symbol            = !empty($currency) && !empty($currency[0]['currency']) ? Helper::currencyList($currency[0]['currency']) : array();
            if ($request->path() === 'employer/saved-items') {
                if (file_exists(resource_path('views/extend/back-end/employer/saved-items.blade.php'))) {
                    return view(
                        'extend.back-end.employer.saved-items',
                        compact(
                            'profile',
                            'saved_jobs',
                            'saved_freelancers',
                            'saved_employers',
                            'symbol'
                        )
                    );
                } else {
                    return view(
                        'back-end.employer.saved-items',
                        compact(
                            'profile',
                            'saved_jobs',
                            'saved_freelancers',
                            'saved_employers',
                            'symbol'
                        )
                    );
                }
            } elseif ($request->path() === 'freelancer/saved-items') {
                if (file_exists(resource_path('views/extend/back-end/freelancer/saved-items.blade.php'))) {
                    return view(
                        'extend.back-end.freelancer.saved-items',
                        compact(
                            'profile',
                            'saved_jobs',
                            'saved_freelancers',
                            'saved_employers',
                            'symbol'
                        )
                    );
                } else {
                    return view(
                        'back-end.freelancer.saved-items',
                        compact(
                            'profile',
                            'saved_jobs',
                            'saved_freelancers',
                            'saved_employers',
                            'symbol'
                        )
                    );
                }
            }
        } else {
            abort(404);
        }
    }

    /**
     * Get User Saved Item
     *
     * @param mixed $request request attributes
     *
     * @access public
     *
     * @return View
     */
    public function getUserWishlist(Request $request)
    {
        if (Auth::user()) {
            $user = $this->user::find(Auth::user()->id);
            $profile = $user->profile;
            if (!empty($request['slug'])) {
                $json = array();
                $selected_user = DB::table('users')->select('id')
                    ->where('slug', $request['slug'])->get()->first();
                $role = $this->user::getUserRoleType($selected_user->id);
                if ($role->role_type == 'freelancer') {
                    $json['user_type'] = 'freelancer';
                    if (in_array($selected_user->id, unserialize($profile->saved_freelancer))) {
                        $json['current_freelancer'] = 'true';
                    }
                    return $json;
                } else if ($role->role_type == 'employer') {
                    $json['user_type'] = 'employer';
                    $employer_jobs = $this->user::find($selected_user->id)
                        ->jobs->pluck('id')->toArray();
                    if (!empty($employer_jobs) && !empty(unserialize($profile->saved_jobs))) {
                        if (in_array($employer_jobs, unserialize($profile->saved_jobs))) {
                            $json['employer_jobs'] = 'true';
                        }
                    }
                    if (in_array($selected_user->id, unserialize($profile->saved_employers))) {
                        $json['current_employer'] = 'true';
                    }
                    return $json;
                }
            }
        }
    }

    /**
     * Add job to whishlist.
     *
     * @param mixed $request request->attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function addWishlist(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (Auth::user()) {
            $json['authentication'] = true;
            if (!empty($request['id'])) {
                $user_id = Auth::user()->id;
                $id = $request['id'];
                if (!empty($request['column']) && ($request['column'] === 'saved_employers' || $request['column'] === 'saved_freelancer' || $request['column'] === 'saved_services')) {
                    if (!empty($request['seller_id'])) {
                        if ($user_id == $request['seller_id']) {
                            $json['type'] = 'error';
                            $json['message'] = trans('lang.login_from_different_user');
                            return $json;
                        }
                    } else {
                        if ($user_id == $id) {
                            $json['type'] = 'error';
                            $json['message'] = trans('lang.login_from_different_user');
                            return $json;
                        }
                    }
                }
                $profile = new Profile();
                $add_wishlist = $profile->addWishlist($request['column'], $id, $user_id);
                if ($add_wishlist == "success") {
                    $json['type'] = 'success';
                    $json['message'] = trans('lang.added_to_wishlist');
                    return $json;
                } else {
                    $json['type'] = 'error';
                    $json['message'] = trans('lang.something_wrong');
                    return $json;
                }
            }
        } else {
            $json['authentication'] = false;
            $json['message'] = trans('lang.need_to_reg');
            return $json;
        }
    }

    /**
     * Submit Reviews.
     *
     * @param \Illuminate\Http\Request $request request->attr
     *
     * @return \Illuminate\Http\Response
     */
    public function submitReview(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (Auth::user()) {
            if ($request['type']) {
                $project_type = $request['type'];
            } else {
                $project_type = 'job';
            }
            $user_id = Auth::user()->id;
            $submit_review = Review::submitReview($request, $user_id, $project_type);
            if ($submit_review['type'] == "success") {
                $json['type'] = 'success';
                $json['message'] = trans('lang.feedback_submit');
                //send email
                if (!empty(config('mail.username')) && !empty(config('mail.password'))) {
                    $freelancer = User::find($request['receiver_id']);
                    $email_params = array();
                    $email_params['name'] = Helper::getUserName($freelancer->id);
                    $email_params['link'] = url('profile/' . $freelancer->slug);
                    $email_params['employer'] = Helper::getUserName($user_id);
                    $email_params['employer_profile'] = url('profile/' . Auth::user()->slug);
                    $email_params['ratings'] = $submit_review['rating'];
                    $email_params['review'] = $request['feedback'];
                    if ($project_type == 'job') {
                        $job = Job::find($request['job_id']);
                        $email_params['project_title'] = $job->title;
                        $email_params['completed_project_link'] = url('/job/' . $job->slug);
                        //$freelancer = Proposal::select('freelancer_id')->where('status', 'completed')->first();
                        $job_completed_template = DB::table('email_types')->select('id')->where('email_type', 'admin_email_job_completed')->get()->first();
                        if (!empty($job_completed_template->id)) {
                            $template_data = EmailTemplate::getEmailTemplateByID($job_completed_template->id);
                            Mail::to(config('mail.username'))
                                ->send(
                                    new AdminEmailMailable(
                                        'admin_email_job_completed',
                                        $template_data,
                                        $email_params
                                    )
                                );
                        }
                        $freelancer_job_completed_template = DB::table('email_types')->select('id')->where('email_type', 'freelancer_email_job_completed')->get()->first();
                        if (!empty($freelancer_job_completed_template->id)) {
                            $template_data = EmailTemplate::getEmailTemplateByID($freelancer_job_completed_template->id);
                            Mail::to($freelancer->email)
                                ->send(
                                    new FreelancerEmailMailable(
                                        'freelancer_email_job_completed',
                                        $template_data,
                                        $email_params
                                    )
                                );
                        }
                    } else if ($project_type == 'service') {
                        $service = Service::find($request['service_id']);
                        $email_params['project_title'] = $service->title;
                        $email_params['completed_project_link'] = url('service/' . $service->slug);
                        $template_data = Helper::getFreelancerCompletedServiceEmailContent();
                        Mail::to($freelancer->email)
                            ->send(
                                new FreelancerEmailMailable(
                                    'freelancer_email_job_completed',
                                    $template_data,
                                    $email_params
                                )
                            );
                    }
                }
                return $json;
            } elseif ($submit_review['type'] == "rating_error") {
                $json['type'] = 'error';
                $json['message'] = trans('lang.rating_required');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.not_authorize');
            return $json;
        }
    }

    /**
     * Download Attachements.
     *
     * @param \Illuminate\Http\Request $request request->attr
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadAttachments(Request $request)
    {
        if (!empty($request['attachments'])) {
            $freelancer_id = $request['freelancer_id'];
            $path = storage_path() . '/app/uploads/proposals/' . $freelancer_id;
            if (!file_exists($path)) {
                File::makeDirectory($path, 0755, true, true);
            }
            $zip = new \Chumper\Zipper\Zipper();
            foreach ($request['attachments'] as $attachment) {
                $zip->make($path . '/attachments.zip')->add($path . '/' . $attachment);
            }
            $zip->close();
            return response()->download(storage_path('app/uploads/proposals/' . $freelancer_id . '/attachments.zip'));
        } else {
            Session::flash('error', trans('lang.files_not_found'));
            return Redirect::back();
        }
    }

    /**
     * Submit Report
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @access public
     *
     * @return \Illuminate\Http\Response
     */
    public function storeReport(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (Auth::user()) {
            $this->validate(
                $request,
                [
                    'description' => 'required',
                    'reason' => 'required',
                ]
            );
            if ($request['model'] == "App\Job" && $request['report_type'] <> 'proposal_cancel') {
                $job = Job::find($request['id']);
                if ($job->employer->id == Auth::user()->id) {
                    $json['type'] = 'error';
                    $json['message'] = trans('lang.not_authorize');
                    return $json;
                }
            }
            if ($request['model'] == "App\Service" && $request['report_type'] <> 'service_cancel') {
                $service = Service::find($request['id']);
                $freelancer = $service->seller->first();
                if ($freelancer->id == Auth::user()->id) {
                    $json['type'] = 'error';
                    $json['message'] = trans('lang.not_authorize');
                    return $json;
                }
            }
            $report = Report::submitReport($request);
            if ($report == 'success') {
                $json['type'] = 'success';
                $user = $this->user::find(Auth::user()->id);
                //send email
                if (
                    $request['report_type'] == 'job-report'
                    || $request['report_type'] == 'employer-report'
                    || $request['report_type'] == 'freelancer-report'
                ) {
                    if (!empty(config('mail.username')) && !empty(config('mail.password'))) {
                        $email_params = array();
                        if ($request['report_type'] == 'job-report') {
                            $report_project_template = DB::table('email_types')->select('id')->where('email_type', 'admin_email_report_project')->get()->first();
                            if (!empty($report_project_template->id)) {
                                $job = Job::where('id', $request['id'])->first();
                                $template_data = EmailTemplate::getEmailTemplateByID($report_project_template->id);
                                $email_params['reported_project'] = $job->title;
                                $email_params['link'] = url('job/' . $job->slug);
                                $email_params['report_by_link'] = url('profile/' . $user->slug);
                                $email_params['reported_by'] = Helper::getUserName(Auth::user()->id);
                                $email_params['message'] = $request['description'];
                                Mail::to(config('mail.username'))
                                    ->send(
                                        new AdminEmailMailable(
                                            'admin_email_report_project',
                                            $template_data,
                                            $email_params
                                        )
                                    );
                            }
                        } else if ($request['report_type'] == 'employer-report') {
                            $report_employer_template = DB::table('email_types')->select('id')->where('email_type', 'admin_email_report_employer')->get()->first();
                            if (!empty($report_employer_template->id)) {
                                $template_data = EmailTemplate::getEmailTemplateByID($report_employer_template->id);
                                $employer = User::find($request['id']);
                                $email_params['reported_employer'] = Helper::getUserName($request['id']);
                                $email_params['link'] = url('profile/' . $employer->slug);;
                                $email_params['report_by_link'] = url('profile/' . $user->slug);
                                $email_params['reported_by'] = Helper::getUserName(Auth::user()->id);
                                $email_params['message'] = $request['description'];
                                Mail::to(config('mail.username'))
                                    ->send(
                                        new AdminEmailMailable(
                                            'admin_email_report_employer',
                                            $template_data,
                                            $email_params
                                        )
                                    );
                            }
                        } else if ($request['report_type'] == 'freelancer-report') {
                            $report_freelancer_template = DB::table('email_types')->select('id')->where('email_type', 'admin_email_report_freelancer')->get()->first();
                            if (!empty($report_freelancer_template->id)) {
                                $freelancer = User::find($request['id']);
                                $template_data = EmailTemplate::getEmailTemplateByID($report_freelancer_template->id);
                                $email_params['reported_freelancer'] = Helper::getUserName($request['id']);
                                $email_params['link'] = url('profile/' . $freelancer->slug);
                                $email_params['report_by_link'] = url('profile/' . $user->slug);
                                $email_params['reported_by'] = Helper::getUserName(Auth::user()->id);
                                $email_params['message'] = $request['description'];
                                Mail::to(config('mail.username'))
                                    ->send(
                                        new AdminEmailMailable(
                                            'admin_email_report_freelancer',
                                            $template_data,
                                            $email_params
                                        )
                                    );
                            }
                        }
                    }
                } else if ($request['report_type'] == 'proposal_cancel') {
                    $freelancer_job_cancelled = DB::table('email_types')->select('id')->where('email_type', 'freelancer_email_cancel_job')->get()->first();
                    $json['message'] = trans('lang.job_cancelled');
                    if (!empty($freelancer_job_cancelled->id)) {
                        if (!empty(config('mail.username')) && !empty(config('mail.password'))) {
                            $template_data = EmailTemplate::getEmailTemplateByID($freelancer_job_cancelled->id);
                            $job = Job::find($request['id']);
                            $proposal = Proposal::where('id', $request['proposal_id'])->first();
                            $freelancer = User::find($proposal->freelancer_id);
                            $email_params['project_title'] = $job->title;
                            $email_params['cancelled_project_link'] = url('job/' . $job->slug);
                            $email_params['name'] = Helper::getUserName($proposal->freelancer_id);
                            $email_params['link'] = url('profile/' . $freelancer->slug);
                            $email_params['employer_profile'] = url('profile/' . Auth::user()->slug);
                            $email_params['emp_name'] = Helper::getUserName(Auth::user()->id);
                            $email_params['msg'] = $request['description'];
                            Mail::to($freelancer->email)
                                ->send(
                                    new FreelancerEmailMailable(
                                        'freelancer_email_cancel_job',
                                        $template_data,
                                        $email_params
                                    )
                                );
                            $job_cancelle_admin_template = DB::table('email_types')->select('id')->where('email_type', 'admin_email_cancel_job')->get()->first();
                            if (!empty($job_cancelle_admin_template)) {
                                $template_data = EmailTemplate::getEmailTemplateByID($job_cancelle_admin_template->id);
                            } else {
                                $template_data = '';
                            }
                            Mail::to(config('mail.username'))
                                ->send(
                                    new AdminEmailMailable(
                                        'admin_email_cancel_job',
                                        $template_data,
                                        $email_params
                                    )
                                );
                        }
                    }
                } else if ($request['report_type'] == 'service_cancel') {
                    $json['message'] = trans('lang.service_cancelled');
                    if (!empty(config('mail.username')) && !empty(config('mail.password'))) {
                        $freelancer_job_cancelled = DB::table('email_types')->select('id')->where('email_type', 'freelancer_email_cancel_job')->get()->first();
                        if (!empty($freelancer_job_cancelled->id)) {
                            $template_data = EmailTemplate::getEmailTemplateByID($freelancer_job_cancelled->id);
                            $service = Service::find($request['id']);
                            $freelancer = $service->seller->first();
                            $email_params['project_title'] = $service->title;
                            $email_params['cancelled_project_link'] = url('service/' . $service->slug);
                            $email_params['name'] = Helper::getUserName($freelancer->id);
                            $email_params['link'] = url('profile/' . $freelancer->slug);
                            $email_params['employer_profile'] = url('profile/' . Auth::user()->slug);
                            $email_params['emp_name'] = Helper::getUserName(Auth::user()->id);
                            $email_params['msg'] = $request['description'];
                            Mail::to($freelancer->email)
                                ->send(
                                    new FreelancerEmailMailable(
                                        'freelancer_email_cancel_job',
                                        $template_data,
                                        $email_params
                                    )
                                );
                        }

                        $job_cancelle_admin_template = DB::table('email_types')->select('id')->where('email_type', 'admin_email_cancel_job')->get()->first();
                        if (!empty($job_cancelle_admin_template)) {
                            $template_data = EmailTemplate::getEmailTemplateByID($job_cancelle_admin_template->id);
                        } else {
                            $template_data = '';
                        }
                        Mail::to(config('mail.username'))
                            ->send(
                                new AdminEmailMailable(
                                    'admin_email_cancel_job',
                                    $template_data,
                                    $email_params
                                )
                            );
                    }
                }
                if ($request['report_type'] == 'service_cancel') {
                    $json['progress'] = trans('lang.report_submitting');
                }
                $json['message'] = trans('lang.report_submitted');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.not_authorize');
            return $json;
        }
    }

    /**
     * Store resource in DB.
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function sendPrivateMessage(Request $request)
    {
        if (Auth::user()) {
            $server = Helper::worketicIsDemoSiteAjax();
            if (!empty($server)) {
                $response['type'] = 'error';
                $response['message'] = $server->getData()->message;
                return $response;
            }
            if (!empty($request['description'])) {
                $user_id = Auth::user()->id;
                $json = array();

                if ($request['project_type'] == 'job') {
                    $purchased_proposal = DB::table('proposals')->select('status')->where('id', $request['proposal_id'])->get()->first();
                    $status = $purchased_proposal->status;
                    if ($status == "hired") {
                        $proposal = new Proposal();
                        $send_message = $proposal::sendMessage($request, $user_id);
                    } else {
                        $json['type'] = 'error';
                        $json['message'] = trans('lang.not_allowed_msg');
                        return $json;
                    }
                } else {
                    $purchase_service = Helper::getPivotService($request['proposal_id']);
                    $status = $purchase_service->status;
                    if ($status == "hired") {
                        $service = new Service();
                        $send_message = $service::sendMessage($request, $user_id);
                    } else {
                        $json['type'] = 'error';
                        $json['message'] = trans('lang.not_allowed_msg');
                        return $json;
                    }
                }
                if ($send_message = 'success') {
                    $json['type'] = 'success';
                    $json['progress_message'] = trans('lang.sending_msg');
                    $json['message'] = trans('lang.msg_sent');
                    return $json;
                } else {
                    $json['type'] = 'error';
                    $json['message'] = trans('lang.something_wrong');
                    return $json;
                }
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.desc_required');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.not_authorize');
            return $json;
        }
    }

    /**
     * Get Private Messages.
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function getPrivateMessage(Request $request)
    {
        $json = array();
        $messages = array();
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            if (!empty($request['id'])) {
                $freelancer_id = $request['recipent_id'];
                $proposal_id = $request['id'];
                $project_type = !empty($request['project_type']) ? $request['project_type'] : 'job';
                $proposal = new Proposal();
                if (Auth::user()->getRoleNames()[0] == 'admin') {
                    if ($project_type == 'service') {
                        $project = DB::table('service_user')->select('user_id')->where('id', $proposal_id)->first();
                    } else {
                        $job = DB::table('proposals')->select('job_id')->where('id', $proposal_id)->first();
                        $project = DB::table('jobs')->where('id', $job->job_id)->select('user_id')->first();
                    }
                    $message_data = $proposal::getProjectHistory($project->user_id, $freelancer_id, $proposal_id, $project_type);
                } else {
                    $freelancer_id = '';
                    $message_data = $proposal::getMessages($user_id, $freelancer_id, $proposal_id, $project_type);
                }
                // $message_data = $proposal::getMessages($user_id, $freelancer_id, $proposal_id, $project_type);
                if (!empty($message_data)) {
                    foreach ($message_data as $key => $data) {
                        $content = strip_tags(stripslashes($data->content));
                        $excerpt = str_limit($content, 100);
                        $default_avatar = url('images/user-login.png');
                        $profile_image = !empty($data->avater)
                            ? '/uploads/users/' . $data->author_id . '/' . $data->avater
                            : $default_avatar;
                        $messages[$key]['id'] = $data->id;
                        $messages[$key]['author_id'] = $data->author_id;
                        $messages[$key]['proposal_id'] = $data->proposal_id;
                        $messages[$key]['content'] = $content;
                        $messages[$key]['excerpt'] = $excerpt;
                        $messages[$key]['user_image'] = asset($profile_image);
                        $messages[$key]['created_at'] = Carbon::parse($data->created_at)->format('d-m-Y');
                        $messages[$key]['notify'] = $data->notify;
                        $messages[$key]['attachments'] = !empty($data->attachments) ? 1 : 0;
                    }
                    $json['type'] = 'success';
                    $json['messages'] = $messages;
                    return $json;
                } else {
                    $json['messages'] = trans('lang.something_wrong');
                    return $json;
                }
            } else {
                $json['messages'] = trans('lang.something_wrong');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.not_authorize');
            return $json;
        }
    }

    /**
     * Download Attachments.
     *
     * @param \Illuminate\Http\Request $id ID
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadMessageAttachments($id)
    {
        if (!empty($id)) {
            $messages = DB::table('private_messages')->select('attachments', 'author_id', 'project_type')->where('id', $id)->get()->toArray();
            $attachments = unserialize($messages[0]->attachments);
            if ($messages[0]->project_type == 'service') {
                $project_type = 'services';
            } elseif ($messages[0]->project_type == 'job') {
                $project_type = 'proposals';
            }
            $path = storage_path() . '/app/uploads/' . $project_type . '/' . $messages[0]->author_id;
            if (!file_exists($path)) {
                File::makeDirectory($path, 0755, true, true);
            }
            $zip = new \Chumper\Zipper\Zipper();
            foreach ($attachments as $attachment) {
                if (Storage::disk('local')->exists('uploads/' . $project_type . '/' . $messages[0]->author_id . '/' . $attachment)) {
                    $zip->make($path . '/' . $id . '-attachments.zip')->add($path . '/' . $attachment);
                }
            }
            $zip->close();
            if (Storage::disk('local')->exists('uploads/' . $project_type . '/' . $messages[0]->author_id . '/' . $id . '-attachments.zip')) {
                return response()->download(storage_path('app/uploads/' . $project_type . '/' . $messages[0]->author_id . '/' . $id . '-attachments.zip'));
            } else {
                Session::flash('error', trans('lang.file_not_found'));
                return Redirect::back();
            }
        }
    }

    /**
     * Checkout Page.
     *
     * @param \Illuminate\Http\Request $id ID
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout($id)
    {
        if (!empty($id)) {
            $package_options = Helper::getPackageOptions(Auth::user()->getRoleNames()[0]);
            $package = Package::find($id);
            $payout_settings = SiteManagement::getMetaValue('commision');
            $payment_gateway = !empty($payout_settings) && !empty($payout_settings[0]['payment_method']) ? $payout_settings[0]['payment_method'] : array();
            $symbol = !empty($payout_settings) && !empty($payout_settings[0]['currency']) ? Helper::currencyList($payout_settings[0]['currency']) : array();
            $mode = !empty($payout_settings) && !empty($payout_settings[0]['payment_mode']) ? $payout_settings[0]['payment_mode'] : 'true';
            if (file_exists(resource_path('views/extend/back-end/package/checkout.blade.php'))) {
                return view::make('extend.back-end.package.checkout', compact('package', 'package_options', 'payment_gateway', 'symbol', 'mode'));
            } else {
                return view::make('back-end.package.checkout', compact('package', 'package_options', 'payment_gateway', 'symbol', 'mode'));
            }
        }
    }

    /**
     * Store profile settings.
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function generateOrder($id, $type)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($id)) {
            $order = new Order();
            $new_order = $order->saveOrder(Auth::user()->id, $id, $type);
            if ($type == 'service') {
                $json['service_order'] = $new_order['service_order'];
            }
            $json['type'] = 'success';
            $json['order_id'] = $new_order['id'];
            $json['process'] = trans('lang.saving_profile');
            return $json;
        } else {
            $json['type'] = 'error';
            $json['process'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Checkout Page.
     *
     * @param \Illuminate\Http\Request $id ID
     *
     * @return \Illuminate\Http\Response
     */
    public function bankCheckout($id, $order, $type, $project_type = '')
    {
        if (!empty($id) && Auth::user()) {
            $subtitle = '';
            $options = '';
            $seller = '';
            if ($type == 'project') {
                if ($project_type == 'service') {
                    $service_order = DB::table('service_user')->select('service_id')->where('id', $id)->first();
                    $service = Service::find($service_order->service_id);
                    $title = $service->title;
                    $cost = $service->price;
                    $product_id = $id;
                } else {
                    $proposal = Proposal::where('id', $id)->get()->first();
                    if (!empty($proposal)) {
                        $job = $proposal->job;
                        $product_id = $proposal->id;
                        $title = $job->title;
                        $cost = $proposal->amount;
                    } else {
                        abort(404);
                    }
                }
            } else {
                $package = Package::find($id);
                if (!empty($package)) {
                    $options = unserialize($package->options);
                    $product_id = $package->id;
                    $title = $package->title;
                    $cost = $package->cost;
                    $subtitle = $package->subtitle;
                } else {
                    abort(404);
                }
            }
            $payout_settings = SiteManagement::getMetaValue('commision');
            $symbol = !empty($payout_settings) && !empty($payout_settings[0]['currency']) ? Helper::currencyList($payout_settings[0]['currency']) : array();
            $mode = !empty($payout_settings) && !empty($payout_settings[0]['payment_mode']) ? $payout_settings[0]['payment_mode'] : 'true';
            $bank_detail = SiteManagement::getMetaValue('bank_detail');
            if (file_exists(resource_path('views/extend/back-end/package/bank-checkout.blade.php'))) {
                return view::make(
                    'extend.back-end.package.bank-checkout',
                    compact('product_id', 'title', 'symbol', 'mode', 'bank_detail', 'order', 'cost', 'subtitle', 'options', 'type')
                );
            } else {
                return view::make(
                    'back-end.package.bank-checkout',
                    compact('product_id', 'title', 'symbol', 'mode', 'bank_detail', 'order', 'cost', 'subtitle', 'options', 'type')
                );
            }
        } else {
            abort(404);
        }
    }

    /**
     * Store profile settings.
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function submitTransection(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            $type = !empty(session()->get('type')) ? session()->get('type') : '';
            $product_id = !empty(session()->get('product_id')) ? session()->get('product_id') : '';
            $product_title = !empty(session()->get('product_title')) ? session()->get('product_title') : '';
            $product_price = !empty(session()->get('product_price')) ? session()->get('product_price') : '';
            $order = !empty(session()->get('order')) ? session()->get('order') : '';
            if (!empty($type) && !empty($product_id)) {
                $invoice = new Invoice();
                $invoice->title = trans('lang.bank_transfer');
                $invoice->price = $product_price;
                $invoice->payer_name = Helper::getUserName(Auth::user()->id);
                $invoice->payer_email = Auth::user()->email;
                $invoice->shipping_amount = 0;
                $invoice->handling_amount = 0;
                $invoice->insurance_amount = 0;
                $invoice->sales_tax = 0;
                $invoice->payment_mode = 'bacs';
                $invoice->paid = 0;
                $invoice->type = $type;
                $invoice->detail = !empty($request['trans_detail']) ? $request['trans_detail'] : '';
                $old_path = 'uploads\users\temp';
                $trans_attachments = array();
                if (!empty($request['attachments'])) {
                    $attachments = $request['attachments'];
                    foreach ($attachments as $key => $attachment) {
                        if (Storage::disk('local')->exists($old_path . '/' . $attachment)) {
                            $new_path = 'uploads/users/' . Auth::user()->id;
                            if (!file_exists($new_path)) {
                                File::makeDirectory($new_path, 0755, true, true);
                            }
                            $filename = time() . '-' . $attachment;
                            Storage::move($old_path . '/' . $attachment, $new_path . '/' . $filename);
                            $trans_attachments[] = $filename;
                        }
                    }
                    $invoice->transection_doc = serialize($trans_attachments);
                }
                $invoice->save();
                $invoice_id = DB::getPdo()->lastInsertId();
                DB::table('orders')
                    ->where('id', $order)
                    ->update(['invoice_id' => $invoice_id]);
                if (!empty(config('mail.username')) && !empty(config('mail.password'))) {
                    $order = DB::table('orders')->where('id', $order)->first();
                    $email_params = array();
                    $template_data = array();
                    $order_settings = SiteManagement::getMetaValue('order_settings');
                    $template_data['subject'] = !empty($order_settings) && !empty($order_settings['admin_order']['subject']) ? $order_settings['admin_order']['subject'] : '';
                    $template_data['content'] = !empty($order_settings) && !empty($order_settings['admin_order']['email_content']) ? $order_settings['admin_order']['email_content'] : '';
                    $email_params['name'] = Helper::getUserName(Auth::user()->id);
                    $email_params['order_id'] = $order->id;
                    Mail::to(Auth::user()->email)
                        ->send(
                            new AdminEmailMailable(
                                'admin_new_order_received',
                                $template_data,
                                $email_params
                            )
                        );
                }
                session()->forget('product_id');
                session()->forget('product_title');
                session()->forget('product_price');
                session()->forget('order');
                session()->put(['message' => trans('lang.transection_uploaded')]);
                $json['type'] = 'success';
                $json['return_url'] = url(Auth::user()->getRoleNames()[0] . '/dashboard');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['process'] = trans('lang.something_wrong');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['process'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Store profile settings.
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function changeOrderStatus(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            if (!empty($request['id']) && !empty($request['status'])) {
                $item_type = '';
                $order = Order::find($request['id']);
                $order->status = $request['status'];
                $order->save();
                $invoice = Invoice::find($order->invoice->id);
                $invoice->paid = 1;
                $invoice->save();
                $title = '';
                $amount = '';
                if ($order->type == 'job') {
                    $item_type = 'project';
                    $proposal = Proposal::find($order->product_id);
                    $title = $proposal->job->title;
                    $amount = $proposal->amount;
                    $proposal->hired = 1;
                    $proposal->status = 'hired';
                    $proposal->paid = 'pending';
                    $proposal->save();
                    $job = Job::find($proposal->job->id);
                    $job->status = 'hired';
                    $job->save();
                    // send message to freelancer
                    $message = new Message();
                    $user = User::find(intval($order->user_id));
                    $message->user()->associate($user);
                    $message->receiver_id = intval($proposal->freelancer_id);
                    $message->body = trans('lang.hire_for') . ' ' . $job->title . ' ' . trans('lang.project');
                    $message->status = 0;
                    $message->save();
                    // send mail
                    if (!empty(config('mail.username')) && !empty(config('mail.password'))) {
                        $freelancer = User::find($proposal->freelancer_id);
                        $employer = User::find($job->user_id);
                        if (!empty($freelancer->email)) {
                            $email_params = array();
                            $template = DB::table('email_types')->select('id')->where('email_type', 'freelancer_email_hire_freelancer')->get()->first();
                            if (!empty($template->id)) {
                                $template_data = EmailTemplate::getEmailTemplateByID($template->id);
                                $email_params['project_title'] = $job->title;
                                $email_params['hired_project_link'] = url('job/' . $job->slug);
                                $email_params['name'] = Helper::getUserName($freelancer->id);
                                $email_params['link'] = url('profile/' . $freelancer->slug);
                                $email_params['employer_profile'] = url('profile/' . $employer->slug);
                                $email_params['emp_name'] = Helper::getUserName($employer->id);
                                Mail::to($freelancer->email)
                                    ->send(
                                        new FreelancerEmailMailable(
                                            'freelancer_email_hire_freelancer',
                                            $template_data,
                                            $email_params
                                        )
                                    );
                            }
                        }
                    }
                } elseif ($order->type == 'service') {
                    $item_type = 'project';
                    DB::table('service_user')
                        ->where('id', $order->product_id)
                        ->update(['status' => 'hired']);
                    $order_service = DB::table('service_user')->select('service_id')->where('id', $order->product_id)->first();
                    $service = Service::find($order_service->service_id);
                    $title = $service->title;
                    $amount = $service->price;
                    // $service->users()->attach($order->user_id, ['type' => 'employer', 'status' => 'hired', 'seller_id' => $service->seller->id, 'paid' => 'pending']);
                    // $service->save();
                    // send message to freelancer
                    $message = new Message();
                    $user = User::find(intval($order->user_id));
                    $message->user()->associate($user);
                    $message->receiver_id = intval($service->seller[0]->id);
                    $message->body = Helper::getUserName($order->user_id) . ' ' . trans('lang.service_purchase') . ' ' . $service->title;
                    $message->status = 0;
                    $message->save();
                    // send mail
                    if (!empty(config('mail.username')) && !empty(config('mail.password'))) {
                        $email_params = array();
                        $template_data = Helper::getFreelancerNewOrderEmailContent();
                        $email_params['title'] = $service->title;
                        $email_params['service_link'] = url('service/' . $service->slug);
                        $email_params['amount'] = $service->price;
                        $email_params['freelancer_name'] = Helper::getUserName($service->seller[0]->id);
                        $email_params['employer_profile'] = url('profile/' . $user->slug);
                        $email_params['employer_name'] = Helper::getUserName($user->id);
                        $freelancer_data = User::find(intval($service->seller[0]->id));
                        Mail::to($freelancer_data->email)
                            ->send(
                                new FreelancerEmailMailable(
                                    'freelancer_email_new_order',
                                    $template_data,
                                    $email_params
                                )
                            );
                    }
                } elseif ($order->type == 'package') {
                    $item_type = 'package';
                    $package = Package::find($order->product_id);
                    $title = $package->title;
                    $amount = $package->cost;
                }

                if ($order->type == 'package') {
                    if (Schema::hasColumn('items', 'type')) {
                        $item = DB::table('items')->select('id')->where('type', 'package')->where('subscriber', $order->user_id)->first();
                        if (empty($item)) {
                            $item = DB::table('items')->select('id')->where('subscriber', $order->user_id)->first();    
                        }
                    } else {
                        $item = DB::table('items')->select('id')->where('subscriber', $order->user_id)->first();
                    }
                    if (!empty($item)) {
                        $item = Item::find($item->id);
                    } else {
                        $item = new Item();
                    }
                } else {
                    $item = DB::table('items')->select('id')->where('invoice_id', $order->invoice->id)->first();
                    if (!empty($item)) {
                        $item = Item::find($item->id);
                    } else {
                        $item = new Item();
                    }
                }
                $item->invoice_id = filter_var($order->invoice->id, FILTER_SANITIZE_NUMBER_INT);
                $item->product_id = filter_var($order->product_id, FILTER_SANITIZE_NUMBER_INT);
                $item->subscriber = $order->user_id;
                $item->item_name = filter_var($title, FILTER_SANITIZE_STRING);
                $item->item_price = $amount;
                $item->type = $item_type;
                $item->item_qty = 1;
                $item->save();
                // send package mail
                if ($order->type == 'package') {
                    $option = !empty($package->options) ? unserialize($package->options) : '';
                    $expiry = !empty($option) ? $item->created_at->addDays($option['duration']) : '';
                    $expiry_date = !empty($expiry) ? Carbon::parse($expiry)->toDateTimeString() : '';
                    $user = User::find($order->user_id);
                    if (!empty($package->badge_id) && $package->badge_id != 0) {
                        $user->badge_id = $package->badge_id;
                    }
                    $user->expiry_date = $expiry_date;
                    $user->save();
                    // send mail
                    if (!empty(config('mail.username')) && !empty(config('mail.password'))) {
                        $role = $user->getRoleNames()->first();
                        $package_options = unserialize($package->options);
                        $expiry_date = '';
                        if (!empty($invoice)) {
                            if ($package_options['duration'] === 'Quarter') {
                                $expiry_date = $invoice->created_at->addDays(4);
                            } elseif ($package_options['duration'] === 'Month') {
                                $expiry_date = $invoice->created_at->addMonths(1);
                            } elseif ($package_options['duration'] === 'Year') {
                                $expiry_date = $invoice->created_at->addYears(1);
                            }
                        }
                        if ($role === 'employer') {
                            if (!empty($user->email)) {
                                $email_params = array();
                                $template = DB::table('email_types')->select('id')->where('email_type', 'employer_email_package_subscribed')->get()->first();
                                if (!empty($template->id)) {
                                    $template_data = EmailTemplate::getEmailTemplateByID($template->id);
                                    $email_params['employer'] = Helper::getUserName($user->id);
                                    $email_params['employer_profile'] = url('profile/' . $user->slug);
                                    $email_params['name'] = $package->title;
                                    $email_params['price'] = $package->cost;
                                    $email_params['expiry_date'] = !empty($expiry_date) ? Carbon::parse($expiry_date)->format('M d, Y') : '';
                                    Mail::to($user->email)
                                        ->send(
                                            new EmployerEmailMailable(
                                                'employer_email_package_subscribed',
                                                $template_data,
                                                $email_params
                                            )
                                        );
                                }
                            }
                        } elseif ($role === 'freelancer') {
                            if (!empty($user->email)) {
                                $email_params = array();
                                $template = DB::table('email_types')->select('id')->where('email_type', 'freelancer_email_package_subscribed')->get()->first();
                                if (!empty($template->id)) {
                                    $template_data = EmailTemplate::getEmailTemplateByID($template->id);
                                    $email_params['freelancer'] = Helper::getUserName($user->id);
                                    $email_params['freelancer_profile'] = url('profile/' . $user->slug);
                                    $email_params['name'] = $package->title;
                                    $email_params['price'] = $package->cost;
                                    $email_params['expiry_date'] = !empty($expiry_date) ? Carbon::parse($expiry_date)->format('M d, Y') : '';
                                    Mail::to($user->email)
                                        ->send(
                                            new FreelancerEmailMailable(
                                                'freelancer_email_package_subscribed',
                                                $template_data,
                                                $email_params
                                            )
                                        );
                                }
                            }
                        }
                    }
                }
                $json['type'] = 'success';
                $json['message'] = trans('lang.status_updated');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Print Thankyou.
     *
     * @return \Illuminate\Http\Response
     */
    public function thankyou()
    {
        if (Auth::user()) {
            echo trans('lang.thankyou');
        } else {
            abort(404);
        }
    }

    /**
     * Get Invoices.
     *
     * @param \Illuminate\Http\Request $type type
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmployerInvoices($type = '')
    {
        if (Auth::user()->getRoleNames()[0] != 'admin' && Auth::user()->getRoleNames()[0] === 'employer') {
            $currency   = SiteManagement::getMetaValue('commision');
            $symbol = !empty($currency) && !empty($currency[0]['currency']) ? Helper::currencyList($currency[0]['currency']) : array();
            $invoices = array();
            $expiry_date = '';
            if ($type === 'project') {
                $invoices = DB::table('invoices')
                    ->join('items', 'items.invoice_id', '=', 'invoices.id')
                    ->select('invoices.*')
                    ->where('items.subscriber', Auth::user()->id)
                    ->where('invoices.type', $type)
                    ->get();
                if (file_exists(resource_path('views/extend/back-end/employer/invoices/project.blade.php'))) {
                    return view('extend.back-end.employer.invoices.project', compact('invoices', 'type', 'expiry_date', 'symbol'));
                } else {
                    return view('back-end.employer.invoices.project', compact('invoices', 'type', 'expiry_date', 'symbol'));
                }
            } elseif ($type === 'package') {
                $invoices = DB::table('invoices')
                    ->join('items', 'items.invoice_id', '=', 'invoices.id')
                    ->join('packages', 'packages.id', '=', 'items.product_id')
                    ->select('invoices.*', 'packages.options')
                    ->where('items.subscriber', Auth::user()->id)
                    ->where('invoices.type', $type)
                    ->get();
                if (file_exists(resource_path('views/extend/back-end/employer/invoices/package.blade.php'))) {
                    return view('extend.back-end.employer.invoices.package', compact('invoices', 'type', 'expiry_date', 'symbol'));
                } else {
                    return view('back-end.employer.invoices.package', compact('invoices', 'type', 'expiry_date', 'symbol'));
                }
            }
        }
    }

    /**
     * Get Freelancer Invoices.
     *
     * @param \Illuminate\Http\Request $type type
     *
     * @return \Illuminate\Http\Response
     */
    public function getFreelancerInvoices($type = '')
    {
        if (Auth::user()->getRoleNames()[0] != 'admin' && Auth::user()->getRoleNames()[0] === 'freelancer') {
            $invoices = array();
            $invoices = DB::table('invoices')
                ->join('items', 'items.invoice_id', '=', 'invoices.id')
                ->join('packages', 'packages.id', '=', 'items.product_id')
                ->select('invoices.*', 'packages.options')
                ->where('items.subscriber', Auth::user()->id)
                ->where('invoices.type', $type)
                ->get();
            $expiry_date = '';
            $currency   = SiteManagement::getMetaValue('commision');
            $symbol = !empty($currency) && !empty($currency[0]['currency']) ? Helper::currencyList($currency[0]['currency']) : array();
            if ($type === 'project') {
                if (file_exists(resource_path('views/extend/back-end/freelancer/invoices/project.blade.php'))) {
                    return view('extend.back-end.freelancer.invoices.project', compact('invoices', 'type', 'expiry_date', 'symbol'));
                } else {
                    return view('back-end.freelancer.invoices.project', compact('invoices', 'type', 'expiry_date', 'symbol'));
                }
            } elseif ($type === 'package') {
                if (file_exists(resource_path('views/extend/back-end/freelancer/invoices/package.blade.php'))) {
                    return view('extend.back-end.freelancer.invoices.package', compact('invoices', 'type', 'expiry_date', 'symbol'));
                } else {
                    return view('back-end.freelancer.invoices.package', compact('invoices', 'type', 'expiry_date', 'symbol'));
                }
            }
        } else {
            abort(404);
        }
    }

    /**
     * Get Invoices.
     *
     * @param integer $id roletype
     *
     * @return \Illuminate\Http\Response
     */
    public function showInvoice($id)
    {
        if (!empty($id)) {
            $invoice_info = DB::table('invoices')
                ->join('items', 'items.invoice_id', '=', 'invoices.id')
                ->select('items.*', 'invoices.*')
                ->where('invoices.id', '=', $id)
                ->get()->first();
            $currency_code = !empty($invoice_info->currency_code) ? strtoupper($invoice_info->currency_code) : 'USD';
            $code = Helper::currencyList($currency_code);
            $symbol = !empty($code) ? $code['symbol'] : '$';
            if (Auth::user()->getRoleNames()->first() === 'freelancer') {
                if (file_exists(resource_path('views/extend/back-end/freelancer/invoices/show.blade.php'))) {
                    return view::make('extend.back-end.freelancer.invoices.show', compact('invoice_info', 'symbol', 'currency_code'));
                } else {
                    return view::make('back-end.freelancer.invoices.show', compact('invoice_info', 'symbol', 'currency_code'));
                }
            } elseif (Auth::user()->getRoleNames()->first() === 'employer') {
                if (file_exists(resource_path('views/extend/back-end/employer/invoices/show.blade.php'))) {
                    return view::make('extend.back-end.employer.invoices.show', compact('invoice_info', 'symbol', 'currency_code'));
                } else {
                    return view::make('back-end.employer.invoices.show', compact('invoice_info', 'symbol', 'currency_code'));
                }
            }
        }
    }

    /**
     * Get Orders.
     *
     * @param integer $id roletype
     *
     * @return \Illuminate\Http\Response
     */
    public function showOrders()
    {
        $orders = Order::all();
        $currency   = SiteManagement::getMetaValue('commision');
        $symbol = !empty($currency) && !empty($currency[0]['currency']) ? Helper::currencyList($currency[0]['currency']) : array();
        $status_list = Helper::getOrderStatus();
        if (file_exists(resource_path('views/extend/back-end/admin/orders/index.blade.php'))) {
            return view::make('extend.back-end.admin.orders.index', compact('orders', 'symbol', 'status_list'));
        } else {
            return view::make('back-end.admin.orders.index', compact('orders', 'symbol', 'status_list'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminProfileSettings()
    {
        $profile = Profile::where('user_id', Auth::user()->id)
            ->get()->first();
        $banner = !empty($profile->banner) ? $profile->banner : '';
        $avater = !empty($profile->avater) ? $profile->avater : '';
        $tagline = !empty($profile->tagline) ? $profile->tagline : '';
        $description = !empty($profile->description) ? $profile->description : '';
        if (file_exists(resource_path('views/extend/back-end/admin/profile-settings/personal-detail/index.blade.php'))) {
            return view(
                'extend.back-end.admin.profile-settings.personal-detail.index',
                compact(
                    'banner',
                    'avater',
                    'tagline',
                    'description'
                )
            );
        } else {
            return view(
                'back-end.admin.profile-settings.personal-detail.index',
                compact(
                    'banner',
                    'avater',
                    'tagline',
                    'description'
                )
            );
        }
    }

    /**
     * Store profile settings.
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function storeProfileSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $this->validate(
            $request,
            [
                'first_name'    => 'required',
                'last_name'    => 'required',
                'email' => 'required|email',
            ]
        );
        $json = array();
        if (!empty($request)) {
            $user_id = Auth::user()->id;
            $this->profile->storeProfile($request, $user_id);
            $json['type'] = 'success';
            $json['process'] = trans('lang.saving_profile');
            return $json;
        }
    }

    /**
     * Upload Image to temporary folder.
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadTempImage(Request $request, $type = '')
    {
        $path = Helper::PublicPath() . '/uploads/users/temp/';
        if (!empty($request['hidden_avater_image'])) {
            $profile_image = $request['hidden_avater_image'];
            $image_size = array(
                'small' => array(
                    'width' => 36,
                    'height' => 36,
                ),
                'medium-small' => array(
                    'width' => 60,
                    'height' => 60,
                ),
                'medium' => array(
                    'width' => 100,
                    'height' => 100,
                ),
            );
            // return Helper::uploadTempImage($path, $profile_image);
            return Helper::uploadTempImageWithSize($path, $profile_image, '', $image_size);
        } elseif (!empty($request['hidden_banner_image'])) {
            $profile_image = $request['hidden_banner_image'];
            return Helper::uploadTempImage($path, $profile_image);
        } elseif (!empty($type) && $type == 'file') {
            $path = 'uploads/users/temp/';
            return Helper::uploadTempattachments($path, $request->file);
        } else {
            return Helper::uploadTempImage($path, $request->file);
        }
    }

    /**
     * Store project Offer
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeProjectOffers(Request $request)
    {
        $this->validate(
            $request,
            [
                'projects' => 'required',
                'desc'    => 'required',
            ]
        );

        $json = array();
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        if (!empty($request)) {
            $offer = new Offer();
            if (Auth::user()->getRoleNames()->first() === 'employer') {
                $storeProjectOffers = $offer->saveProjectOffer($request, $request['freelancer_id']);
                if ($storeProjectOffers == "success") {
                    $json['type'] = 'success';
                    $json['progressing'] = trans('lang.send_offer');
                    $json['message'] = trans('lang.offer_sent');
                    $user = $this->user::find(Auth::user()->id);
                    //send email
                    if (!empty(config('mail.username')) && !empty(config('mail.password'))) {
                        $email_params = array();
                        $send_freelancer_offer = DB::table('email_types')->select('id')->where('email_type', 'freelancer_email_send_offer')->get()->first();
                        $message = new Message();
                        if (!empty($send_freelancer_offer->id)) {
                            $job = Job::where('id', $request['projects'])->first();
                            $freelancer = User::find($request['freelancer_id']);
                            $f_link = url('profile/' . $freelancer->slug);
                            $f_name = Helper::getUserName($freelancer->id);
                            $e_name = Helper::getUserName(Auth::user()->id);
                            $e_link = url('profile/' . $user->slug);
                            $p_link = url('job/' . $job->slug);
                            $p_title = $job->title;
                            $msg = $request['desc'];
                            $template_data = EmailTemplate::getEmailTemplateByID($send_freelancer_offer->id);
                            $message->user_id = intval(Auth::user()->id);
                            $message->receiver_id = intval($request['freelancer_id']);
                            $message->body = Helper::getProjectOfferContent($e_name, $e_link, $p_link, $p_title, $msg);
                            $message->status = 0;
                            $message->save();
                            $email_params['project_title'] = $p_title;
                            $email_params['project_link'] = $p_link;
                            $email_params['employer_profile'] = $e_link;
                            $email_params['emp_name'] = $e_name;
                            $email_params['link'] = $f_link;
                            $email_params['name'] = $f_name;
                            $email_params['msg'] = $msg;
                            Mail::to($freelancer->email)
                                ->send(
                                    new FreelancerEmailMailable(
                                        'freelancer_email_send_offer',
                                        $template_data,
                                        $email_params
                                    )
                                );
                        }
                    }
                    return $json;
                } else {
                    $json['type'] = 'error';
                    $json['message'] = trans('lang.not_send_offer');
                    return $json;
                }
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.not_authorize');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Raise Dispute
     *
     * @param mixed $slug get job slug
     *
     * @access public
     *
     * @return View
     */
    public function raiseDispute($slug)
    {
        $breadcrumbs_settings = SiteManagement::getMetaValue('show_breadcrumb');
        $show_breadcrumbs = !empty($breadcrumbs_settings) ? $breadcrumbs_settings : 'true';
        $job = Job::where('slug', $slug)->first();
        $reasons = Arr::pluck(Helper::getReportReasons(), 'title', 'title');
        if (file_exists(resource_path('views/extend/back-end/freelancer/jobs/dispute.blade.php'))) {
            return View(
                'extend.back-end.freelancer.jobs.dispute',
                compact(
                    'job',
                    'reasons',
                    'show_breadcrumbs'
                )
            );
        } else {
            return View(
                'back-end.freelancer.jobs.dispute',
                compact(
                    'job',
                    'reasons',
                    'show_breadcrumbs'
                )
            );
        }
    }

    /**
     * Raise dispute
     *
     * @param mixed $request $req->attr
     *
     * @access public
     *
     * @return View
     */
    public function storeDispute(Request $request)
    {
        $json = array();
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $storeDispute = $this->user->saveDispute($request);
        if ($storeDispute == "success") {
            $json['type'] = 'success';
            $json['message'] = trans('lang.dispute_raised');
            $user = $this->user::find(Auth::user()->id);
            //send email
            if (!empty(config('mail.username')) && !empty(config('mail.password'))) {
                $email_params = array();
                $dispute_raised_template = DB::table('email_types')->select('id')->where('email_type', 'admin_email_dispute_raised')->get()->first();
                if (!empty($dispute_raised_template->id)) {
                    $job = Job::where('id', $request['proposal_id'])->first();
                    $template_data = EmailTemplate::getEmailTemplateByID($dispute_raised_template->id);
                    $email_params['project_title'] = $job->title;
                    $email_params['project_link'] = url('job/' . $job->slug);
                    $email_params['sender_link'] = url('profile/' . $user->slug);
                    $email_params['name'] = Helper::getUserName(Auth::user()->id);
                    $email_params['msg'] = $request['description'];
                    $email_params['reason'] = $request['reason'];
                    Mail::to(config('mail.username'))
                        ->send(
                            new AdminEmailMailable(
                                'admin_email_dispute_raised',
                                $template_data,
                                $email_params
                            )
                        );
                }
            }
            return $json;
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Raise dispute
     *
     * @access public
     *
     * @return View
     */
    public function userListing()
    {
        if (Auth::user() && Auth::user()->getRoleNames()->first() === 'admin') {
            if (!empty($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
                $users = $this->user::where('first_name', 'like', '%' . $keyword . '%')->orWhere('last_name', 'like', '%' . $keyword . '%')->paginate(7)->setPath('');
                $pagination = $users->appends(
                    array(
                        'keyword' => Input::get('keyword')
                    )
                );
            } else {
                $users = User::select('*')->latest()->paginate(10);
            }
            if (file_exists(resource_path('views/extend/back-end/admin/users/index.blade.php'))) {
                return view('extend.back-end.admin.users.index', compact('users'));
            } else {
                return view('back-end.admin.users.index', compact('users'));
            }
        } else {
            abort(404);
        }
    }

    /**
     * Get Freelancer Payouts.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPayouts()
    {
        if (!empty($_GET['year']) && !empty($_GET['month'])) {
            $year = $_GET['year'];
            $month = $_GET['month'];
            $payouts =  DB::table('payouts')
                ->select('*')
                ->whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->paginate(7)->setPath('');
            $pagination = $payouts->appends(
                array(
                    'year' => Input::get('year'),
                    'month' => Input::get('month')
                )
            );
        } else {
            $payouts =  Payout::paginate(7);
        }
        $selected_year = !empty($_GET['year']) ? $_GET['year'] : '';
        $selected_month = !empty($_GET['month']) ? $_GET['month'] : '';
        $months = Helper::getMonthList();
        $years = array_combine(range(date("Y"), 1970), range(date("Y"), 1970));
        if (file_exists(resource_path('views/extend/back-end/admin/payouts.blade.php'))) {
            return view(
                'extend.back-end.admin.payouts',
                compact('payouts', 'years', 'selected_year', 'months', 'selected_month')
            );
        } else {
            return view(
                'back-end.admin.payouts',
                compact('payouts', 'years', 'selected_year', 'months', 'selected_month')
            );
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($year, $month, $id = array())
    {
        $slected_ids = array();
        if (!empty($id)) {
            $slected_ids = explode(',', $id);
        }
        $payouts =  DB::table('payouts')
            ->select('*')
            ->whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->whereIn('id', $slected_ids)
            ->get();
        $pdf = PDF::loadView('back-end.admin.payouts-pdf', compact('payouts', 'year', 'month'));
        return $pdf->download('payout-' . $month . '-' . $year . '.pdf');
    }

    // /**
    //  * Verify Code
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function verifyUserEmailCode(Request $request)
    // {
    //     $role = Auth::user()->getRoleNames()->first();
    //     if (!empty($request['code'])) {
    //         if ($request['code'] === $user->verification_code) {
    //             $user->user_verified = 1;
    //             $user->verification_code = null;
    //             $user->save();
    //             return Redirect::to($role . '/dashboard');
    //         } else {
    //             Session::flash('error', trans('lang.ph_email_warning'));
    //             return Redirect::back();
    //         }
    //     } else {
    //         $json['type'] = 'error';
    //         $json['message'] = trans('lang.verify_code');
    //         return $json;
    //     }
    // }

    /**
     * Verify Code
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePayoutStatus(Request $request)
    {
        $role = Auth::user()->getRoleNames()->first();
        if (!empty($request['id'])) {
            $payout = Payout::find($request['id']);
            $payout->status = $request['status'];
            $payout->save();
            if (!empty($request['projects_ids'])) {
                $projects_ids = Unserialize($request['projects_ids']);
                foreach ($projects_ids as $key => $id) {
                    if ($payout->type == 'job') {
                        $proposal = Proposal::find($id);
                        $proposal->paid_progress = 'completed';
                        $proposal->save();
                    } elseif ($payout->type == 'service') {
                        DB::table('service_user')
                            ->where('id', $id)
                            ->update(['paid_progress' => 'completed']);
                    }
                }
            }
            $json['type'] = 'success';
            $json['message'] = trans('lang.status_updated');
            return $json;
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Submit user refound to payouts
     *
     * @return \Illuminate\Http\Response
     */
    public function submitUserRefund(Request $request)
    {
        $server_verification = Helper::worketicIsDemoSite();
        if (!empty($server_verification)) {
            Session::flash('error', $server_verification);
            return Redirect::back();
        }
        $json = array();
        if (!empty($request)) {
            $this->validate(
                $request,
                [
                    'refundable_user_id' => 'required',
                ]
            );
            $role = $this->user::getUserRoleType($request['refundable_user_id']);
            if ($role->role_type == 'freelancer') {
                $update_status = '';
                if ($request['type'] == 'job') {
                    $update_status = $this->user->updateCancelProject($request);
                } elseif ($request['type'] == 'service') {
                    $update_status = $this->user->updateCancelService($request);
                }
                if ($update_status = 'success') {
                    $json['type'] = 'success';
                    $json['message'] = trans('lang.status_updated');
                    return $json;
                } else {
                    $json['type'] = 'error';
                    $json['message'] = trans('lang.something_wrong');
                    return $json;
                }
            } elseif ($role->role_type == 'employer') {
                $refound = $this->user->transferRefund($request);
                if ($refound == 'payout_not_available') {
                    $json['type'] = 'error';
                    $json['message'] = trans('lang.user_payout_not_set');
                    return $json;
                } else if ($refound == 'success') {
                    $json['type'] = 'success';
                    $json['message'] = trans('lang.refund_transfer');
                    return $json;
                } else {
                    $json['type'] = 'error';
                    $json['message'] = trans('lang.all_required');
                    return $json;
                }
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Verify Code
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePayoutDetail(Request $request)
    {
        $user_id = $request['id'];
        if (!empty($user_id)) {

            $payout_setting = $this->profile->savePayoutDetail($request, $user_id);
            $json['type'] = 'success';
            $json['message'] = 'payout update successfully';
            return $json;
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.verify_code');
            return $json;
        }
    }

    /**
     * Get payout detail
     *
     */
    public function getPayoutDetail()
    {
        $json = array();
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            $payout_detail = !empty($user->profile) ? Helper::getUnserializeData($user->profile->payout_settings) : array();
            $json['type'] = 'success';
            $json['payouts'] = $payout_detail;
            return $json;
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.verify_code');
            return $json;
        }
    }
}
