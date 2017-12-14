<?php

namespace App\Http\Requests\API\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
            'birth_date' => 'required',
            'supplier_id'  => 'required',
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
            'cpf.min' => 'Informe o CPF com 11 números',
            'email.email' => 'E-mail inválido',
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'Informe o nome com no mínimo 11 letras',
            'name.regex' => 'Informe o nome somente com letras',
            'role_id.required' => 'O campo perfil é obrigatório',
            'confirm_password.required' => 'O campo Confirme a senha é obrigatório',
            'confirm_password.same' => 'O campo Confirme a senha deverá ser igual a senha',
            'confirm_password.min' => 'O campo Confirme a senha deverá conter no mínimo 6 caracteres.',
            'birth_date.required' => 'O campo Data de Nascimento é obrigatório',
            'supplier_id.required' => 'O campo Academia é Obrigatório',
        ];
    }
}
