<?php

namespace App\Http\Requests\Admin\NewsCategory;

use App\Models\BaseModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateNewsCategoryRequest extends FormRequest
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
            'name'      => ['required'],
            'link'      => ['required'],
            'parent_id' => ['nullable', 'exists:news_categories,id'],
            'image'     => ['nullable', 'url'],
            'is_hot'    => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])],
            'description' => ['nullable']
        ];
    }

    /**
     * Defined attribute of request
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'      => 'Tên danh mục tin',
            'link'      => 'Đường dẫn',
            'parent_id' => 'Danh mục cha',
            'image'     => 'Ảnh đại diện',
            'is_hot'    => 'Danh mục hot',
            'description' => 'Mô tả'
        ];
    }
}
