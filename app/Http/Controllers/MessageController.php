<?php
/**
 * Class MessageController.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @version <PHP: 1.0.0>
 * @link    http://www.amentotech.com
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use DB;
use App\User;
use App\Helper;
use Auth;
use Carbon\Carbon;
use App\SiteManagement;

/**
 * Class MessageController
 *
 */
class MessageController extends Controller
{
    protected $message;

    /**
     * Create a new controller instance.
     *
     * @param mixed $message make instance
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $senders = '';
            $senders =  $this->message::select('user_id')->where('receiver_id', auth()->user()->id)->groupBy('user_id')->get();
            $chat_settings = SiteManagement::getMetaValue('chat_settings');
            if (file_exists(resource_path('views/extend/back-end/chat-room/index.blade.php'))) {
                return View(
                    'extend.back-end.chat-room.index',
                    compact('senders', 'chat_settings')
                );
            } else {
                return View(
                    'back-end.chat-room.index',
                    compact('senders', 'chat_settings')
                );
            }
        } else {
            abort(404);
        }
    }

    /**
     * Get Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsers()
    {
        $unreadNotifyClass  = '';
        $user_id = auth()->user()->id;
        $users = DB::select(
            DB::raw(
                "SELECT * FROM messages
                    WHERE id IN (
                        SELECT MAX(id) AS id
                FROM (
                    SELECT id, user_id AS chat_sender
                    FROM messages
                    WHERE receiver_id = $user_id OR user_id = $user_id
                UNION ALL
                    SELECT id, receiver_id AS chat_sender
                    FROM messages
                    WHERE user_id = $user_id OR receiver_id = $user_id )
                    t GROUP BY chat_sender ) ORDER BY id DESC"
            )
        );
        $json = array();
        if (!empty($users)) {
            foreach ($users as $key => $userVal) {
                $chat_user_id   = '';
                if ($user_id === intval($userVal->user_id)) {
                    $chat_user_id = intval($userVal->receiver_id);
                } else {
                    $chat_user_id = intval($userVal->user_id);
                }
                $json[$key]['id'] = $chat_user_id;
                $json[$key]['image'] = Helper::getProfileImage($chat_user_id);
                $json[$key]['name'] = Helper::getUserName($chat_user_id);
                $json[$key]['tagline'] = User::find($chat_user_id)->profile->tagline;
                $json[$key]['image_name'] = User::find($chat_user_id)->profile->avater;
            }
            $message_status = $this->message::where('receiver_id', $user_id)->where('status', 0)->count();
            if ($message_status > 0) {
                $unreadNotifyClass = 'wt-dotnotification';
            }
            $json[$key]['status_class'] = $unreadNotifyClass;
            return response()->json($json);
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.user_not_found');
            return $json;
        }
    }

    /**
     * Get user messages.
     *
     * @param mixed $request $req->attr
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserMessages(Request $request)
    {
        $json = array();
        if (!empty($request['sender_id'])) {
            $user_id = auth()->user()->id;
            $receiver_id = $request['sender_id'];
            $selected_user = User::find($receiver_id);
            DB::table('messages')
                ->where('user_id', $receiver_id)
                ->where('receiver_id', $user_id)
                ->update(['status' => 1]);
            $messages = DB::table('messages')->select('*')
                ->where(
                    function ($query) use ($user_id, $receiver_id) {
                        $query->where('user_id', '=', $user_id)
                            ->Where('receiver_id', '=', $receiver_id);
                    }
                )
                ->orWhere(
                    function ($query) use ($user_id, $receiver_id) {
                        $query->where('receiver_id', '=', $user_id)
                            ->Where('user_id', '=', $receiver_id);
                    }
                )
                ->get()->toArray();
            foreach ($messages as $key => $message) {
                $message_read = '';
                if ($message->status == 1 && $message->user_id == $user_id) {
                    $message_read = 'wt-readmessage';
                }
                $json['messages'][$key]['is_sender'] = 'no';
                if ($message->user_id == $user_id) {
                    $json['messages'][$key]['is_sender'] = 'yes';
                }
                $json['messages'][$key]['id'] = $message->id;
                $json['messages'][$key]['user_id'] = $message->user_id;
                $json['messages'][$key]['image'] = url(Helper::getProfileImage($message->user_id));
                $json['messages'][$key]['message'] = $message->body;
                $json['messages'][$key]['date'] =  $message->created_at;
                $json['messages'][$key]['read_status'] = $message_read;
            }
            $json['selected']['selected_user_name'] = Helper::getUserName($receiver_id);
            $json['selected']['selected_user_slug'] = $selected_user->slug;
            $json['selected']['selected_user_tagline'] = $selected_user->profile->tagline;
            $json['selected']['selected_user_image'] = url(Helper::getProfileImage($receiver_id));
            $json['selected']['selected_user_verified'] = $selected_user->user_verified;
            return response()->json($json);
        }
    }


    /**
     * Store messages.
     *
     * @param mixed $request $req->attr
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messsage = $this->message->sendMessage($request);
        return response()->json($messsage);
    }
}
