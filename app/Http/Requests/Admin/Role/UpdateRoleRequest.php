<?php

namespace App\Http\Requests\Admin\Role;

use App\Rules\Utf8StringRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class UpdateRoleRequest extends FormRequest
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
        $listPermission = Permission::pluck('name')->toArray();
        return [
            'name' => ['required', new Utf8StringRule(), 'max: 255'],
            'permission' => ['required', 'array'],
            'permission.*' => ['required', Rule::in($listPermission)]
        ];
    }


    /**
     * Attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'          => 'Tên nhóm quyền',
            'permission'    => 'Gán quyền',
            'permission.*'  => 'Gán quyền',
        ];
    }
}
