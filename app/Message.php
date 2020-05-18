<?php

/**
 * Class Message and all of its functions.
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
 * Class Message
 *
 */
class Message extends Model
{
    /**
     * Get the user that owns the message.
     *
     * @return relation
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Send Message
     *
     * @param mixed $request $req->attr
     *
     * @return relation
     */
    public function sendMessage($request)
    {
        $json = array();
        $user = User::find(intval($request['author_id']));
        $this->user()->associate($user);
        $this->receiver_id = intval($request['receiver_id']);
        $this->body = filter_var($request['message'], FILTER_SANITIZE_STRING);
        $this->status = intval($request['status']);
        $this->save();
        $json['author'] =  $request['author_id'];
        $json['receiver'] =  $request['receiver_id'];
        return $json;
    }
}
