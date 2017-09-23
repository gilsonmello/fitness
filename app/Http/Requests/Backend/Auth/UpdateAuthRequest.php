<?php

namespace App\Http\Requests\Backend\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthRequest extends FormRequest
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
            'name' => 'required|min:10|regex:/^([\pL\s\ ]+)$/u',
            'role_id'  => 'required|array|min:1',
            'password' => !is_null($this->all()['password']) && !empty($this->all()['password']) ? 'min:6' : ''
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
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'Informe o nome com no mínimo 11 letras',
            'name.regex' => 'Informe o nome somente com letras',
            'role_id.required' => 'O campo perfil é obrigatório',
            'password.min' => 'Informe a senha com no mínimo 6 carácteres'
        ];
    }
}
