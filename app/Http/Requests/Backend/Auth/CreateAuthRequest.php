<?php

namespace App\Http\Requests\Backend\Auth;

use Illuminate\Foundation\Http\FormRequest;

class CreateAuthRequest extends FormRequest
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
            'cpf' => 'required|min:14',
            'role_id'  => 'required|array|min:1',
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
            'name.required' => 'O campo Nome é obrigatório',
            'name.min' => 'Informe o Nome com no mínimo 11 letras',
            'name.regex' => 'Informe o Nome somente com letras',
            'role_id.required' => 'O campo Perfil é obrigatório',
        ];
    }
}
