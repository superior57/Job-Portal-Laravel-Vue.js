<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Profile as ProfileResource;
use App\Helper;
use Auth;
use function Opis\Closure\unserialize;
use App\Profile;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $json = array();
        $user = User::find($request['profile_id']);
        $save_freelancer = !empty($user->profile->saved_freelancer) ?
            unserialize($user->profile->saved_freelancer) : array();
        $type = $request['listing_type'];
        $user_by_role =  User::role($type)->select('id')->get()->pluck('id')->toArray();
        $users = User::whereIn('id', $user_by_role)->get()->toArray();
        foreach ($users as $key => $user) {
            $json[$key]['favourite'] = in_array($user['id'], $save_freelancer) ? 'yes' : 'no';
            $json[$key]['id'] = $user['id'];
        }
        return $json;
    }

}
