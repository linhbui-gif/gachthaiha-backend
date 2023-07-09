<?php

namespace App\Http\Requests\Admin\ProductAttribute;

use App\Models\BaseModel;
use App\Rules\Utf8StringRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductAttributeRequest extends FormRequest
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
            'name' => ['required', 'max:255', new Utf8StringRule()],
            'unit' => ['required', 'max:255'],
            'status' => ['required', Rule::in([BaseModel::STATUS_INACTIVE, BaseModel::STATUS_ACTIVE])],
            'value' => ['required', 'array'],
            'value.*' => ['required', 'max:255']
        ];
    }


    public function attributes()
    {
        return [
            'name' => 'Tên thuộc tính',
            'unit' => 'Đơn vị thuộc tính',
            'status' => 'Trạng thái',
            'value' => 'Giá trị thuộc tính',
            'value.*' => 'Giá trị thuộc tính'
        ];
    }
}
