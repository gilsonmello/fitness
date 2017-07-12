<?php

namespace App\Http\Requests\Backend\Ipac;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIpacRequest extends FormRequest
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
            'user_id' => 'required|numeric|min:1',
            'question_group_id' => 'required|numeric|min:1'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.min' => trans('validation.attributes.required_user_id'),
            'question_group_id.min' => trans('validation.attributes.required_question_group_id'),
        ];
    }
}
