<?php

/**
 * Class Location and all of its functions.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */
namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use File;
use Storage;

/**
 * Class Location
 *
 */
class Location extends Model
{
    /**
     * Fillables for the database
     *
     * @access protected
     * @var    array $fillable
     */
    protected $fillable = array(
        'title', 'slug', 'relation_type', 'flag', 'description'
    );

    /**
     * Protected Date
     *
     * @access protected
     * @var    array $dates
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the users for the location.
     *
     * @return relation
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Get the job for the location.
     *
     * @return relation
     */
    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    /**
     * Get the services for the location.
     *
     * @return relation
     */
    public function services()
    {
        return $this->hasMany('App\Service');
    }

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
            if (!Location::all()->where('slug', $temp)->isEmpty()) {
                $i = 1;
                $new_slug = $temp . '-' . $i;
                while (!Location::all()->where('slug', $new_slug)->isEmpty()) {
                    $i++;
                    $new_slug = $temp . '-' . $i;
                }
                $temp = $new_slug;
            }
            $this->attributes['slug'] = $temp;
        }
    }

    /**
     * For saving locations in Database
     *
     * @param mixed $request get file
     *
     * @return \Illuminate\Http\Response
     */
    public function storeLocation($request)
    {
        $parent_cat = filter_var($request['parent_location'], FILTER_VALIDATE_INT);
        $this->title = filter_var($request['title'], FILTER_SANITIZE_STRING);
        $this->slug = filter_var($request['title'], FILTER_SANITIZE_STRING);
        $this->description = filter_var($request['description'], FILTER_SANITIZE_STRING);
        $this->parent = $parent_cat;

        $old_path = Helper::PublicPath() . '/uploads/locations/temp';
        if (!empty($request['uploaded_image'])) {
            $filename = $request['uploaded_image'];
            if (file_exists($old_path . '/' . $request['uploaded_image'])) {
                $new_path = Helper::PublicPath().'/uploads/locations/';
                if (!file_exists($new_path)) {
                    File::makeDirectory($new_path, 0755, true, true);
                }
                $filename = time() . '-' . $request['uploaded_image'];
                rename($old_path . '/' . $request['uploaded_image'], $new_path . '/' . $filename);
                rename($old_path . '/small-' . $request['uploaded_image'], $new_path . '/small-' . $filename);
                rename($old_path . '/medium-' . $request['uploaded_image'], $new_path . '/medium-' . $filename);
            }
            $this->flag = filter_var($filename, FILTER_SANITIZE_STRING);
        } else {
            $this->flag = null;
        }
        $this->save();
    }


    /**
     * Update location in database
     *
     * @param mixed   $request get req attributes
     * @param integer $id      get location ID
     *
     * @return \Illuminate\Http\Response
     */
    public function updateLocation($request, $id)
    {
        $location = self::find($id);
        if ($location->title != $request['title']) {
            $location->slug = filter_var($request['title'], FILTER_SANITIZE_STRING);
        }
        $location->title = filter_var($request['title'], FILTER_SANITIZE_STRING);
        $location->description = filter_var($request['abstract'], FILTER_SANITIZE_STRING);
        $parent_cat = filter_var($request['parent_location'], FILTER_VALIDATE_INT);
        $location->parent = $parent_cat;
        $old_path = Helper::PublicPath() . '/uploads/locations/temp';
        if (!empty($request['uploaded_image'])) {
            $new_path = Helper::PublicPath().'/uploads/locations/';
            $filename = $request['uploaded_image'];
            if (file_exists($old_path . '/' . $request['uploaded_image'])) {
                if (!file_exists($new_path)) {
                    File::makeDirectory($new_path, 0755, true, true);
                }
                $filename = time() . '-' . $request['uploaded_image'];
                rename($old_path . '/' . $request['uploaded_image'], $new_path . '/' . $filename);
                rename($old_path . '/small-' . $request['uploaded_image'], $new_path . '/small-' . $filename);
                rename($old_path . '/medium-' . $request['uploaded_image'], $new_path . '/medium-' . $filename);
            }
            $location->flag = filter_var($filename, FILTER_SANITIZE_STRING);

        } else {
            $location->flag = null;
        }
        $location->save();
    }

    /**
     * Get Location ancestors
     *
     * @param integer $parent_id  get req attributes
     * @param integer $marginleft get location ID
     *
     * @return output
     */
    public function getAncestors($parent_id = 0, $marginleft = 0)
    {
        $query = DB::table('locations')->select('*')->where('parent', '=', $parent_id)->get();
        $output = '';

        if ($parent_id == 0) {
            $marginleft = 0;
        } else {
            $marginleft = $marginleft + 48;
        }
        if ($query->count() > 0) {
            foreach ($query as $child) {
                $output .= $this->getAncestors($child->id, $marginleft);
            }
        }
        return $output;
    }

    /**
     * Location Ancestors
     *
     * @param integer $id get req ID
     *
     * @return $ancestors
     */
    public function ancestors($id)
    {
        $ancestors = DB::table('locations')->select('*')->where('id', '=', $id)->get();
        while ($ancestors->last() && $ancestors->last()->parent !== null) {
            $parent = DB::table('locations')->select('*')->where('id', '=', $ancestors->last()->parent)->get();
            $ancestors = $ancestors->merge($parent);
            dd($ancestors);
        }

        return $ancestors;
    }
}
