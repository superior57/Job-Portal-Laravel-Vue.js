<?php

/**
 * Class ResponseTime
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


/**
 * Class ResponseTime
 *
 */
class ResponseTime extends Model
{
    /**
     * Fillables for the database
     *
     * @access protected
     *
     * @var array $fillable
     */
    protected $fillable = array(
        'title', 'slug'
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
            if (!ResponseTime::all()->where('slug', $temp)->isEmpty()) {
                $i = 1;
                $new_slug = $temp . '-' . $i;
                while (!ResponseTime::all()->where('slug', $new_slug)->isEmpty()) {
                    $i++;
                    $new_slug = $temp . '-' . $i;
                }
                $temp = $new_slug;
            }
            $this->attributes['slug'] = $temp;
        }
    }

    /**
     * For saving review options in Database
     *
     * @param string $request get request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function saveResponseTime($request)
    {
        if (!empty($request)) {
            $this->title = filter_var($request['response_time_title'], FILTER_SANITIZE_STRING);
            $this->slug = filter_var($request['response_time_title'], FILTER_SANITIZE_STRING);
            return $this->save();
        }
    }

    /**
     * For updating Review Options
     *
     * @param string $request get request attributes
     * @param int    $id      get department id for updation
     *
     * @return \Illuminate\Http\Response
     */
    public function updateResponseTime($request, $id)
    {
        if (!empty($request)) {
            $response_time = self::find($id);
            if ($response_time->title != filter_var($request['response_time_title'], FILTER_SANITIZE_STRING)) {
                $response_time->slug  =  filter_var($request['response_time_title'], FILTER_SANITIZE_STRING);
            }
            $response_time->title = filter_var($request['response_time_title'], FILTER_SANITIZE_STRING);
            $response_time->save();
        }
    }
}
