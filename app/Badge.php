<?php
/**
 * Class Badge
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
 * Class Badge
 *
 */
class Badge extends Model
{
    /**
     * Fillables for the database
     *
     * @access protected
     *
     * @var array $fillable
     */
    protected $fillable = array(
        'title', 'image'
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
            if (!Badge::all()->where('slug', $temp)->isEmpty()) {
                $i = 1;
                $new_slug = $temp . '-' . $i;
                while (!Badge::all()->where('slug', $new_slug)->isEmpty()) {
                    $i++;
                    $new_slug = $temp . '-' . $i;
                }
                $temp = $new_slug;
            }
            $this->attributes['slug'] = $temp;
        }
    }

    /**
     * Saving categories
     *
     * @param string $request get req attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function saveBadges($request)
    {
        if (!empty($request)) {
            $this->title = filter_var($request['badge_title'], FILTER_SANITIZE_STRING);
            $this->slug = filter_var($request['badge_title'], FILTER_SANITIZE_STRING);
            $old_path = Helper::PublicPath() . '/uploads/badges/temp';
            if (!empty($request['uploaded_image'])) {
                $filename = $request['uploaded_image'];
                if (file_exists($old_path . '/' . $request['uploaded_image'])) {
                    $new_path = Helper::PublicPath().'/uploads/badges/';
                    if (!file_exists($new_path)) {
                        File::makeDirectory($new_path, 0755, true, true);
                    }
                    $filename = time() . '-' . $request['uploaded_image'];
                    rename($old_path . '/' . $request['uploaded_image'], $new_path . '/' . $filename);
                    rename($old_path . '/small-' . $request['uploaded_image'], $new_path . '/small-' . $filename);
                    rename($old_path . '/medium-' . $request['uploaded_image'], $new_path . '/medium-' . $filename);
                }
                $this->image = filter_var($filename, FILTER_SANITIZE_STRING);
            } else {
                $this->image = null;
            }
            $this->color = filter_var($request['color'], FILTER_SANITIZE_STRING);
            $this->save();
            $json['type'] = 'success';
            $json['message'] = trans('lang.badge_created');
            return $json;
        }
    }

    /**
     * Updating Badges
     *
     * @param string $request get request attributes
     * @param int    $id      get department id for updation
     *
     * @return \Illuminate\Http\Response
     */
    public function updateBadges($request, $id)
    {
        if (!empty($request)) {
            $badge = self::find($id);
            if ($badge->title != $request['badge_title']) {
                $badge->slug  =  filter_var($request['badge_title'], FILTER_SANITIZE_STRING);
            }
            $badge->title = filter_var($request['badge_title'], FILTER_SANITIZE_STRING);
            $old_path = Helper::PublicPath() . '/uploads/badges/temp';
            if (!empty($request['uploaded_image'])) {
                $filename = $request['uploaded_image'];
                if (file_exists($old_path . '/' . $request['uploaded_image'])) {
                    $new_path = Helper::PublicPath().'/uploads/badges/';
                    if (!file_exists($new_path)) {
                        File::makeDirectory($new_path, 0755, true, true);
                    }
                    $filename = time() . '-' . $request['uploaded_image'];
                    rename($old_path . '/' . $request['uploaded_image'], $new_path . '/' . $filename);
                    rename($old_path . '/small-' . $request['uploaded_image'], $new_path . '/small-' . $filename);
                    rename($old_path . '/medium-' . $request['uploaded_image'], $new_path . '/medium-' . $filename);
                }
                $badge->image = filter_var($filename, FILTER_SANITIZE_STRING);
            } else {
                $badge->image = null;
            }
            $badge->color = filter_var($request['color'], FILTER_SANITIZE_STRING);
            return $badge->save();
        }
    }
}
