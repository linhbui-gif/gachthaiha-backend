<?php

namespace App\Http\Requests\Admin\Collection;

use App\Models\BaseModel;
use App\Rules\Utf8StringRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCollectionRequest extends FormRequest
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
            'name' => ['required', new Utf8StringRule(), 'max:255'],
            'avatar' => ['nullable', 'url'],
            'description' => ['nullable', 'max:10000'],
            'status' => ['required', Rule::in(BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE)]
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên bộ sưu tập',
            'avatar' => 'Ảnh đại diện',
            'description' => 'Mô tả bộ sưu tập',
            'status' => 'Trạng thái'
        ];
    }
}
