<?php

namespace App\Http\Requests\Frontend\Newsletter;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsletterRequest extends FormRequest
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
            'name' => 'required|min:6|regex:/^([a-zA-z\ ]+)$/u',
            'email' => 'required|email'
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
            'name.required' => 'O campo Nome é obrigatório',
            'name.min' => 'Informe o nome com no mínimo 6 letras',
            'name.regex' => 'Informe o nome somente com letras',
            'email.email' => 'E-mail inválido',
            'email.required' => 'O campo E-mail é obrigatório',
        ];
    }
}
