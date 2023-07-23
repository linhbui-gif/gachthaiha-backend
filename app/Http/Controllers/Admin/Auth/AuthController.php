<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Libs\CommonLib;
use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    /**
     * Function login to system
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        CommonLib::setLocale();
        if($request->ajax()){
            $post = $request->post();
            $validator = Validator::make($post, [
                'email' => 'required|email|exists:administrators,email',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return response()->json(['success' => false,
                    'message' => 'Có lỗi trong quá trình đăng nhập. Mời bạn thử lại sau',
                    'validate_error' => CommonLib::getValidationError($validator)]);
            }

            $remember = !empty($post['remember']) ? true : false;
            if (Auth::guard('admin')->attempt(['email' => $post['email'], 'password' => $post['password'], 'status' => Administrator::STATUS_ACTIVE], $remember)) {
                return response()->json(['success' => true, 'message' => 'Đăng nhập thành công', 'url' => route('admin.dashboard.index')]);
            }else{
                return response()->json(['success' => false, 'message' => 'Tên đăng nhập hoặc mật khẩu không đúng']);
            }
        }
        return view('admin.auth.login');
    }


    /**
     * Function logout system
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }


    public function forgotPassword()
    {

    }


    public function resetPassword()
    {

    }
}
?>