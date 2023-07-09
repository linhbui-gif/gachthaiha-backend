<?php

namespace App\Http\Requests\Admin\Banner;

use App\Models\Banner;
use App\Rules\Utf8StringRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBannerRequest extends FormRequest
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
            'name'              => ['required'],
            'position'          => ['required'],
            'status'            => ['required', Rule::in([Banner::STATUS_ACTIVE, Banner::STATUS_INACTIVE])],
            'list_image'        => ['required', 'array'],
            'list_image.*'      => ['required', 'array'],
            'list_image.*.title' => ['nullable'],
            'list_image.*.link' => ['nullable'],
            'list_image.*.image' => ['required', 'url'],
            'list_image.*.description' => ['nullable']
        ];
    }
}
