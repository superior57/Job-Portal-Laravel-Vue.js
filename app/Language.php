<?php
/**
 * Class Language
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

/**
 * Class Language
 *
 */
class Language extends Model
{
    /**
     * Fillables for the database
     *
     * @access protected
     * @var    array $fillable
     */
    protected $fillable = array(
        'title', 'slug', 'description',
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
     * Get all of the users that are assigned this category.
     *
     * @return relation
     */
    public function users()
    {
        return $this->morphedByMany('App\User', 'langable');
    }

    /**
     * Get all of the users that are assigned this category.
     *
     * @return relation
     */
    public function jobs()
    {
        return $this->morphedByMany('App\Job', 'langable');
    }

    /**
     * Get all of the services that are assigned this category.
     *
     * @return relation
     */
    public function services()
    {
        return $this->morphedByMany('App\Service', 'langable');
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
            if (!Language::all()->where('slug', $temp)->isEmpty()) {
                $i = 1;
                $new_slug = $temp . '-' . $i;
                while (!Language::all()->where('slug', $new_slug)->isEmpty()) {
                    $i++;
                    $new_slug = $temp . '-' . $i;
                }
                $temp = $new_slug;
            }
            $this->attributes['slug'] = $temp;
        }
    }

    /**
     * For saving Languages in Database
     *
     * @param string $request string
     *
     * @return \Illuminate\Http\Response
     */
    public function saveLanguages($request)
    {
        if (!empty($request)) {
            $this->title = filter_var($request['language_title'], FILTER_SANITIZE_STRING);
            $this->slug = filter_var($request['language_title'], FILTER_SANITIZE_STRING);
            $this->description = filter_var($request['language_desc'], FILTER_SANITIZE_STRING);
            return $this->save();
        }
    }

    /**
     * For updating languages
     *
     * @param string $request string
     * @param int    $id      integer
     *
     * @return \Illuminate\Http\Response
     */
    public function updateLanguage($request, $id)
    {
        if (!empty($request)) {
            $langs = self::find($id);
            if ($langs->title != $request['language_title']) {
                $langs->slug = filter_var($request['language_title'], FILTER_SANITIZE_STRING);
            }
            $langs->title = filter_var($request['language_title'], FILTER_SANITIZE_STRING);
            $langs->description = filter_var($request['language_desc'], FILTER_SANITIZE_STRING);
            $langs->save();
        }
    }
}
