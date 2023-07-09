<?php

namespace App\Http\Requests\Admin\Banner;

use App\Models\Banner;
use App\Rules\OrderRule;
use App\Rules\Utf8StringRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BannerSearchRequest extends FormRequest
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
            'name'      => ['nullable', new Utf8StringRule()],
            'status'    => ['nullable', Rule::in([Banner::STATUS_ACTIVE, Banner::STATUS_INACTIVE])],
            'page'      => ['nullable', 'integer', 'min:1'],
            'order_by'  => ['nullable', Rule::in(['banners.id', 'banners.name', 'banners.status', 'banners.created_at'])],
            'order'     => ['nullable', new OrderRule()],
            'limit'     => ['nullable', 'integer', 'min:10', 'max:100']
        ];
    }
}
