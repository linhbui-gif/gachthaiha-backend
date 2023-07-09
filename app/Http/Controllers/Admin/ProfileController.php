<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\ChangePasswordRequest;
use App\Http\Requests\Admin\Profile\UpdateAvatarRequest;
use App\Http\Requests\Admin\Profile\UpdateProfileRequest;
use App\Models\Administrator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    /**
     * Index profile
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.profile.index', [
            'user' => $user
        ]);
    }


    /**
     * Function update profile
     *
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProfileRequest $request)
    {
        $admin = Auth::guard('admin')->user();

        $update = [
            'name' => $request->name
        ];

        DB::beginTransaction();

        try{

            Administrator::where('id', $admin->id)->update($update);

            DB::commit();

            return response()->json([
                'success' => true, 'message' => trans('admin.update_success'), 'url' => route('admin.profile.index')
            ]);

        }catch (\Exception $ex){

            DB::rollBack();

            return response()->json([
                'success' => false, 'message' => trans('admin.update_error').'. Exception: '.$ex->getMessage()
            ]);
        }
    }


    /**
     * Change password
     *
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->validated();

        $admin = Auth::guard('admin')->user();

        if (!Hash::check($data['old_password'], $admin->password)) {
            return response()->json(['success' => false, 'message' => 'Mật khẩu cũ không đúng']);
        }

        $update = [
            'password' => Hash::make($data['password'])
        ];

        DB::beginTransaction();
        try {
            Administrator::where('id', $admin->id)->update($update);

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Cập nhật thành công', 'url' => route('admin.profile.index')]);

        } catch (\Exception $ex) {

            DB::rollBack();

            return response()->json(['success' => false, 'message' => 'Cập nhật không thành công. Lỗi: ' . $ex->getMessage()]);
        }
    }


    /**
     * Update avatar of admin
     *
     * @param UpdateAvatarRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAvatar(UpdateAvatarRequest $request)
    {
        $admin = Auth::guard('admin')->user();

        DB::beginTransaction();

        try{

            $imageName = time().'.'.$request->file('file')->getClientOriginalName();

            $uploadPath = 'uploads/images/avatar/';

            $request->file('file')->move(public_path($uploadPath), $imageName);

            $avatarLink = asset($uploadPath.$imageName);

            $update = [
                'avatar' => $avatarLink
            ];

            Administrator::where('id', $admin->id)->update($update);

            DB::commit();

            return response()->json([
                'success' => true, 'message' => trans('admin.update_success'), 'images' => $avatarLink
            ]);

        }catch (\Exception $ex){
            DB::rollBack();

            return response()->json([
                'success' => false, 'message' => trans('admin.update_error')
            ]);
        }
    }
}

?>