<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Pusher\Pusher;

class NotificationController extends Controller
{

    /**
     * show the notification index page.
     *
     * @param int|String|Object
     */

    public function index()
    {
        $notifications = Notification::paginate(10);
        return view('backend.notification.index', get_defined_vars());
    }

    /**
     * Show all the notification in response.
     *
     * @param int|String|Object
     */

    public function show()
    {
        $notifications = Notification::where([ ['read_at',NULL] , ['sender_id' ,'!=',0], ['receiver_id', auth()->id()] ])
                        ->limit(10)->orderByDesc('id')->get();

        $response['message'] = 'Notification List';
        $response['status_code'] = 200;
        $response['success'] = true;
        $response['data'] = $notifications;
        $response['total_notification'] = $notifications->count();

        return response()->json($response);
    }

    /**
     * Read  notification in response.
     *
     * @param int
     */
    public function read($id)
    {
        $notification = Notification::where('id',$id)->first();
        if($notification){
            $notification->read_at = Carbon::now();
            $notification->save();

            $response['message'] = 'Read Successfully!';
            $response['status_code'] = 200;
            $response['success'] = true;
            return response()->json($response);
        }else{
            $response['message'] = 'Not Found!';
            $response['status_code'] = 404;
            $response['success'] = false;
            return response()->json($response);
        }
    }

    /**
     * Read all the notification in response.
     *
     * @param null
     */
    public function markAllRead()
    {

        Notification::where('receiver_id', auth()->id())->update(['read_at' => Carbon::now()]);

        $response['message'] = "Success Message";
        $response['status_code'] = 200;
        $response['success'] = true;
        return response()->json($response);

    }

    /**
     * Send Notification of order to admin.
     *
     * @param int|String|Object
     */
    public function sendNotification($sender_id,$receiver_id,$slug,$type,$data,$title,$icon,$class,$desc)
    {

        $user_pic = '';
        $user_type = '';
        $sender = User::where('id' , $sender_id)->first();


        if($title != '' && $title !=null){
            $data = array(
                "sender_id" => $sender_id ,
                "receiver_id" => $receiver_id ,
                "slug" => $slug,
                "noti_type" => $type ,
                "noti_data" => $data ,
                "noti_title" => $title,
                "noti_icon" => $icon ,
                "btn_class" => $class ,
                "noti_desc" => $desc ,
                "user_pic" => $user_pic ,
                "user_type" => $user_type ,

            );

            $notify = Notification::create($data);
            if($notify) {
                $pusher = new Pusher(
                    pusherCredentials('key'),
                    pusherCredentials('secret'),
                    pusherCredentials('id'),
                    [
                        'cluster' => pusherCredentials('cluster'),
                        'useTLS' => true
                    ]
                );

                $data = [
                    "receiver" => $receiver_id,
                    "sender" => $sender_id,
                    "message" => $desc,
                ];

                $pusher->trigger('order.'.(int) $receiver_id, 'order-event', $data);
            }
        }

    }

}
