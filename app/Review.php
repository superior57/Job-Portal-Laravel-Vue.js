<?php
/**
 * Class Review
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
use DB;

/**
 * Class Review
 *
 */
class Review extends Model
{
    /**
     * Get user.
     *
     * @return polymorphic relation
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Submit Review
     *
     * @param mixed $request   req->attr
     * @param mixed $author_id Author ID
     *
     * @return request\response
     */
    public static function submitReview($request, $author_id, $project_type)
    {
        $user_rating = array();
        $avg = 0;
        $avg_rating = 0;
        $count = 0;
        $json = array();
        $review = new Review();
        $user = User::find($author_id);
        $review->user()->associate($user);
        $review->receiver_id = intval($request['receiver_id']);
        $review->job_id = intval($request['job_id']);
        $review->feedback = filter_var($request['feedback'], FILTER_SANITIZE_STRING);
        foreach ($request['rating'] as $key => $value) {
            if ($value['rate'] > 0) {
                $count++;
                $user_rating[$key]['rating'] = intval($value['rate']);
                $user_rating[$key]['reason'] = intval($value['reason']);
                $avg = $avg + intval($value['rate']);
            }
        }
        if ($avg <= 0 ) {
            $json['type'] = 'rating_error';
            return $json;
        }
        $avg_rating = $avg / $count;
        $review->rating = serialize($user_rating);
        $review->avg_rating = $avg_rating;
        $review->project_type = $project_type;
        if (!empty($request['service_id'])) {
            $review->service_id = intval($request['service_id']);
        }
        $review->save();

        $freelancer_total_rating =  Self::select('avg_rating')
            ->where('receiver_id', $request['receiver_id'])->sum('avg_rating');
        $freelancer_rating = $freelancer_total_rating / Self::where('receiver_id', $request['receiver_id'])->count();
        if (!empty($freelancer_rating)) {
            $rating = array();
            $freelancer_profile = Profile::find($request['receiver_id']);
            $rating = unserialize($freelancer_profile->rating);
            $rating = !empty($rating) && is_array($rating) ? $rating : array();
            $rating[] = round($freelancer_rating);
            $rating = array_unique($rating);
            $freelancer_profile->ratings = serialize($rating);
            $freelancer_profile->save();   
        }
        if ($project_type == 'service') {
            DB::table('service_user')
                ->where('id', $request['job_id'])
                ->where('user_id', $author_id)
                ->update(['status' => 'completed']);
        } else {
            $proposal = Proposal::find($request['proposal_id']);
            $proposal->status = 'completed';
            $proposal->save();
            $job = Job::find($proposal->job_id);
            $job->status = 'completed';
            $job->save();
        }
        $json['rating'] = $avg_rating;
        $json['type'] = 'success';
        return $json;
    }
}
