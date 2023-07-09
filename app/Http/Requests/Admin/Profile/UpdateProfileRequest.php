<?php

namespace App\Http\Requests\Admin\Profile;

use App\Rules\Utf8StringRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => ['required', new Utf8StringRule(), 'max:255']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ và tên'
        ];
    }

}
