<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => ['required'],
            'password' => ['required'],
            'password_confirmation' => ['required', 'same:password']
        ];
    }

    public function attributes()
    {
        return [
            'old_password' => 'Mật khẩu hiện tại',
            'password'      => 'Mật khẩu mới',
            'password_confirmation' => 'Xác nhận mật khẩu mới'
        ];
    }
}
