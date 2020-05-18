<?php
/**
 * Class Package
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
use Auth;

/**
 * Class Package
 *
 */
class Package extends Model
{

    /**
     * Set slug before saving in DB
     *
     * @param string $value value
     *
     * @access public
     *
     * @return string
     */
    public function setSlugAttribute($value)
    {
        if (!empty($value)) {
            $temp = str_slug($value, '-');
            if (!Package::all()->where('slug', $temp)->isEmpty()) {
                $i = 1;
                $new_slug = $temp . '-' . $i;
                while (!Package::all()->where('slug', $new_slug)->isEmpty()) {
                    $i++;
                    $new_slug = $temp . '-' . $i;
                }
                $temp = $new_slug;
            }
            $this->attributes['slug'] = $temp;
        }
    }

   /**
    * Save package
    *
    * @param mixed $request get req attributes
    *
    * @return \Illuminate\Http\Response
    */
    public function savePackage($request)
    {
        if (!empty($request)) {
            $this->title = filter_var($request['package_title'], FILTER_SANITIZE_STRING);
            $this->slug = filter_var($request['package_title'], FILTER_SANITIZE_STRING);
            $this->subtitle = filter_var($request['package_subtitle'], FILTER_SANITIZE_STRING);
            $this->cost = filter_var($request['package_price'], FILTER_SANITIZE_STRING);
            $this->role_id = intval($request['roles'][0]);
            if ($request->roles == '2') {
                $this->options = serialize($request['employer']);
            } else {
                $this->options = serialize($request['freelancer']);
            }
            if (!empty($request->trial)) {
                $this->trial = 1;
            } else {
                $this->trial = 0;
            }
            $this->badge_id = !empty($request['freelancer']['badge']) ? intval($request['freelancer']['badge']) : 0;
            return $this->save();
        }
    }

    /**
     * Update Packages
     *
     * @param mixed $request get req attributes
     * @param int   $slug    get skill id
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePackage($request, $slug)
    {
        if (!empty($request)) {
            $selected_package = self::select('id')->where('slug', $slug)->first();
            $package = Self::find($selected_package->id);
            if ($package->title != $request['package_title']) {
                $package->slug = filter_var($request['package_title'], FILTER_SANITIZE_STRING);
            }
            $package->title = filter_var($request['package_title'], FILTER_SANITIZE_STRING);
            $package->subtitle = filter_var($request['package_subtitle'], FILTER_SANITIZE_STRING);
            $package->cost = filter_var($request['package_price'], FILTER_SANITIZE_STRING);
            $package->role_id = intval($request['roles'][0]);
            if ($request->roles == '2') {
                $package->options = serialize($request['employer']);
            } else {
                $package->options = serialize($request['freelancer']);
            }
            $package->badge_id = !empty($request['freelancer']['badge']) ? intval($request['freelancer']['badge']) : 0;
            $package->save();
        }
    }

    /**
     * Save package
     *
     * @param string $role $role
     *
     * @return \Illuminate\Http\Response
     */
    public function saveTrailPackage($role)
    {
        if (!empty($role)) {
            if ($role == 'employer') {
                $options = 'a:5:{s:4:"jobs";s:1:"5";s:13:"featured_jobs";s:1:"2";s:8:"duration";s:2:"30";s:13:"banner_option";s:4:"true";s:12:"private_chat";s:4:"true";}';
            } else {
                $options = 'a:6:{s:14:"no_of_connects";s:2:"10";s:12:"no_of_skills";s:1:"3";s:8:"duration";s:2:"30";s:5:"badge";N;s:13:"banner_option";s:4:"true";s:12:"private_chat";s:4:"true";}';
            }
                                                    
            DB::table('items')->insert(
                [
                    'title' => 'Trail'.$role, 'subtitle' => '30 Days Trial', 'slug' => 'trial-'.$role,
                    'cost' => 0.00, 'role_id' => $role_id, 'badge_id' => 0, 'options' => $options,
                    "created_at" => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()
                ]
            );
        }
    }

}
