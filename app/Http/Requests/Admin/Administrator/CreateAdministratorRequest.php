<?php

namespace App\Http\Requests\Admin\Administrator;

use App\Models\BaseModel;
use App\Rules\Utf8StringRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class CreateAdministratorRequest extends FormRequest
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
        $listRole = Role::pluck('name')->toArray();
        return [
            'name'      => ['required', new Utf8StringRule()],
            'email'     => ['required', 'email', 'unique:administrators,email'],
            'status'    => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])],
            'password'  => ['required', 'confirmed'],
            'role'      => ['required', 'array'],
            'role.*'    => ['required', Rule::in($listRole)],
            'avatar'    => ['nullable', 'url']
        ];
    }

    /**
     * Attributes of form request
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'  => 'Tên tài khoản admin',
            'email' => 'Email đăng nhập',
            'status'    => 'Trạng thái',
            'password'  => 'Mật khẩu',
            'role'      => 'Phân quyền',
            'role.*'    => 'Phân quyền',
            'avatar'    => 'Ảnh đại diện'
        ];
    }
}
