<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\CommonLib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifyController extends Controller
{

    /**
     * List all notify of admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        CommonLib::setLocale();

        $user = Auth::guard('admin')->user();

        $listNotify = $user->notifications()->orderBy('created_at', 'DESC')->paginate(30);

        return view('admin.notify.index', [
            'listData' => $listNotify,
        ]);
    }


    /**
     * make a notify is reads
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function makeRead(Request $request)
    {
        CommonLib::setLocale();

        // check ajax request
        if(!$request->ajax()){
            return response()->json(['success' => false, 'message' => 'Bad method']);
        }

        // validate data
        $post = $request->all();
        if(empty($post['id'])){
            return response()->json(['success' => false, 'message' => trans('messages.error_validation')]);
        }

        // check notify
        $user = Auth::guard('admin')->user();

        $notification = $user->notifications()->where('id', $post['id'])->first();

        if(!$notification){
            return response()->json(['success' => false, 'message' => trans('messages.notify_not_exist')]);
        }

        // make notify as read
        $notification->markAsRead();

        $data = $notification['data'];

        return response()->json(['success' => true, 'message' => trans('messages.success'), 'link' => $data['url']]);

    }


    /**
     * make all notify are read
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function makeAllRead(Request $request)
    {
        CommonLib::setLocale();

        // check ajax request
        if(!$request->ajax()){
            return response()->json(['success' => false, 'message' => 'Bad method']);
        }

        // check validate data
        $post = $request->all();
        if(empty($post)) {
            return response()->json(['success' => false, 'message' => trans('messages.error_validation')]);
        }

        // check user notify
        $user = Auth::guard('admin')->user();

        $notification = $user->unreadNotifications;

        // read all notify
        if(!empty($notification)){
            foreach($notification as $key => $value){
                $value->markAsRead();
            }
        }
        return response()->json(['success' => true, 'message' => trans('messages.success')]);

    }
}
?>