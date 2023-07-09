<?php

namespace App\Http\Requests\Admin;

use App\BatchAction;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BatchProcessRequest extends FormRequest
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
            'action' => ['required', Rule::in([BatchAction::ACTIVE, BatchAction::INACTIVE, BatchAction::DELETE])],
            'check' => ['required', 'array'],
            'check.*' => ['required', 'integer']
        ];
    }
}
