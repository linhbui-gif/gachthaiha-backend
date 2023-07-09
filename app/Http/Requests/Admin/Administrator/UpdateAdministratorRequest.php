<?php

namespace App\Http\Requests\Admin\Administrator;

use App\Models\BaseModel;
use App\Rules\Utf8StringRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdministratorRequest extends FormRequest
{
    private $email;

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
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', new Utf8StringRule()],
            'email'         => [
                'required',
                'email',
                Rule::unique('administrators', 'email')->ignore($this->email, 'email'),
                'max:255'
            ],
            'status' => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])],
            'password' => ['nullable', 'confirmed']
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
