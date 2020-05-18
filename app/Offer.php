<?php
/**
 * Class Offer and all of its functions.
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
 * Class Offer
 *
 */
class Offer extends Model
{
    /**
     * Fillables for the database
     *
     * @access protected
     * @var    array $fillable
     */
    protected $fillable = array(
        'user_id', 'freelancer_id', 'project_id', 'description'
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
     * Get the users record associated with the offer.
     *
     * @return relation
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get Meta Values form meta keys.
     *
     * @param string $request $req->attr
     * @param string $id      FreelancerID
     *
     * @return \Illuminate\Http\Response
     */
    public function saveProjectOffer($request, $id)
    {
        $user = User::find(Auth::user()->id);
        if ($user->getRoleNames()->first() === 'employer') {
            $this->freelancer_id = filter_var($id, FILTER_SANITIZE_STRING);
            $this->project_id = filter_var($request['projects'], FILTER_SANITIZE_STRING);
            $this->description = filter_var($request['desc'], FILTER_SANITIZE_STRING);
            $this->user()->associate($user);
            $this->save();
            return 'success';
        } else {
            return 'warning';
        }
    }
}
