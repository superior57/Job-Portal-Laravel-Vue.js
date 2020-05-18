<?php
/**
 * Class Proposal
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
use File;
use Storage;
use DB;
use Auth;
use App\Job;
use App\EmailTemplate;
use App\Mail\FreelancerEmailMailable;
use App\User;

/**
 * Class Proposal
 *
 */
class Proposal extends Model
{

    /**
     * Get the job that owns the proposal.
     *
     * @return relation
     */
    public function job()
    {
        return $this->belongsTo('App\Job');
    }

    /**
     * Get all of the proposal's report.
     *
     * @return relation
     */
    public function reports()
    {
        return $this->morphOne('App\Report', 'reportable');
    }

    /**
     * Get the freelancer that owns the proposal.
     *
     * @return relation
     */
    public function freelancer()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Store Propsals.
     *
     * @param string $request req->attributes
     * @param string $id      ID
     *
     * @return proposal
     */
    public function storeProposal($request, $id, $login_id ='')
    {
        $json = array();
        if (!empty($request)) {
            $user_id = !empty($login_id) ? $login_id :Auth::user()->id;
            $this->amount = intval($request['amount']);
            $this->completion_time = filter_var($request['completion_time'], FILTER_SANITIZE_STRING);
            $this->content = filter_var($request['description'], FILTER_SANITIZE_STRING);
            $this->freelancer_id = intval($user_id);
            $job = Job::find($id);
            $this->job()->associate($job);
            $old_path = 'uploads\proposals\temp';
            $proposal_attachments = array();
            if (!empty($request['attachments'])) {

                $attachments = $request['attachments'];
                foreach ($attachments as $key => $attachment) {
                    if (Storage::disk('local')->exists($old_path . '/' . $attachment)) {
                        $new_path = 'uploads/proposals/' . $user_id;
                        if (!file_exists($new_path)) {
                            File::makeDirectory($new_path, 0755, true, true);
                        }
                        $filename = time() . '-' . $attachment;
                        Storage::move($old_path . '/' . $attachment, $new_path . '/' . $filename);
                        $proposal_attachments[] = $filename;
                    }
                }
                $this->attachments = serialize($proposal_attachments);
            }
            $this->save();
            $json['type'] = 'success';
            return $json;
        } else {
            $json['type'] = 'error';
            return $json;
        }
    }

    /**
     * AssignJob.
     *
     * @param string $id ID
     *
     * @return proposal
     */
    public function assignJob($id)
    {
        $proposal = $this::find($id);
        $proposal->hired = 1;
        $proposal->status = 'hired';
        $proposal->save();
        $job = Job::find($proposal->job->id);
        $job->status = 'hired';

        return $job->save();
    }

    /**
     * Send Message.
     *
     * @param mixed $request request->attr
     * @param int   $user_id
     *
     * @return response
     */
    public static function sendMessage($request, $user_id)
    {
        if (!empty($request['recipent_id'])) {
            $message_attachments = array();
            if (!empty($request['attachments'])) {
                $old_path = 'uploads\proposals\temp';
                $attachments = $request['attachments'];
                foreach ($attachments as $key => $attachment) {
                    if (Storage::disk('local')->exists($old_path . '/' . $attachment)) {
                        $new_path = 'uploads/proposals/' . $user_id;
                        if (!file_exists($new_path)) {
                            File::makeDirectory($new_path, 0755, true, true);
                        }
                        $filename = time() . '-' . $attachment;
                        Storage::move($old_path . '/' . $attachment, $new_path . '/' . $filename);
                        $message_attachments[] = $filename;
                    }
                }
            }
            $msg_attachments = !empty($message_attachments) ? serialize($message_attachments) : null;
            DB::table('private_messages')->insert(
                [
                    'author_id' => $user_id, 'proposal_id' => $request['proposal_id'], 'content' => $request['description'],
                    'attachments' => $msg_attachments,
                    'notify' => 0, "created_at" => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]
            );

            $lastInsertedID = DB::getPdo()->lastInsertId();
            DB::table('private_messages_to')->insert(
                [
                    'private_message_id' => $lastInsertedID, 'recipent_id' => $request['recipent_id'],
                    'message_read' => 0, 'read_date' => null, "created_at" => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]
            );
            $json['type'] = 'success';
            return $json;
        }
    }

    /**
     * Get message
     *
     * @param mixed $user_id       User ID
     * @param int   $freelancer_id Freelancer ID
     * @param int   $proposal_id   Proposal
     *
     * @return response
     */
    public static function getMessages($user_id, $freelancer_id, $proposal_id, $project_type)
    {
        return DB::table('private_messages')
            ->join('private_messages_to', 'private_messages.id', '=', 'private_messages_to.private_message_id')
            ->join('profiles', 'profiles.user_id', '=', 'private_messages.author_id')
            ->select('private_messages.id', 'private_messages.*', 'profiles.avater')
            ->where('private_messages.proposal_id', $proposal_id)
            ->where('private_messages.project_type', $project_type)
            ->orWhere(function ($query) use ($user_id, $freelancer_id) {
                $query
                    ->where('private_messages_to.recipent_id', '=', $user_id)
                    ->Where('private_messages.author_id', '=', $freelancer_id);
            })
            ->orWhere(function ($query) use ($user_id, $freelancer_id) {
                $query->where('private_messages_to.recipent_id', '=', $freelancer_id)
                    ->Where('private_messages.author_id', '=', $user_id);
            })
            ->orderBy('private_messages.created_at')->get()->toArray();
    }
    
    /**
     * Get message
     *
     * @param mixed $user_id       User ID
     * @param int   $freelancer_id Freelancer ID
     * @param int   $proposal_id   Proposal
     *
     * @return response
     */
    public static function getProjectHistory($user_id, $freelancer_id, $proposal_id, $project_type)
    {
        return DB::table('private_messages')
            ->join('private_messages_to', 'private_messages.id', '=', 'private_messages_to.private_message_id')
            ->join('profiles', 'profiles.user_id', '=', 'private_messages.author_id')
            ->select('private_messages.id', 'private_messages.*', 'profiles.avater')
            ->where('private_messages.proposal_id', $proposal_id)
            ->where('private_messages.project_type', $project_type)
            ->orderBy('private_messages.created_at')->get()->toArray();
    }
    

    /**
     * Get proposals by status.
     *
     * @param mixed  $user_id     User ID
     * @param int    $status      Status
     * @param string $paid_status paid_status
     * @param int    $limit       limit
     *
     * @return \Illuminate\Http\Response
     */
    public static function getProposalsByStatus($user_id, $status, $paid_status = '', $limit = 3)
    {
        $projects = Proposal::select('id', 'amount', 'updated_at')->latest()
            ->where('freelancer_id', $user_id)
            ->where('status', $status);
        if (!empty($paid_status)) {
            $projects->where('paid', $paid_status);
        }
        return $projects->take($limit)->get();
    }

    /**
     * Get proposals by status.
     *
     * @param mixed $job_skills job skill
     *
     * @return \Illuminate\Http\Response
     */
    public function getJobSkillRequirement($job_skills)
    {
        $json = array();
        $skill = '';
        if (!empty($job_skills)) {
            $freelancer_skills = auth()->user()->skills->pluck('id')->toArray();
            foreach ($job_skills as $key => $skill) {
                if (!(in_array($skill, $freelancer_skills))) {
                    $json[$key] = $skill;
                }

            }
            return $json;
        }
    }

    /**
     * Get proposals by status.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFreelancersTotalAmount()
    {
        $this::where('status', 'completed')->sum(amount);
    }

    /**
     * Delete proposal from storage
     *
     * @param string $id ID
     *
     * @return \Illuminate\Http\Response
     */
    public static function deleteRecord($id)
    {
        $proposal = self::find($id);
        $job = Job::find($proposal->job->id);
        if (!empty($job) && $job->status == 'hired') {
            $job->status = 'posted';
            $job->save();
        }
        return $proposal->delete();
    }
}
