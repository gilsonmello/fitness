<?php

namespace App\Http\Requests\Backend\Diary;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiaryRequest extends FormRequest
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
            'supplier_id' => 'required',
            'available_date' => 'required'
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
            /*'cpf.min' => 'Informe o CPF com 11 números',*/
            'available_date.required' => 'O campo Data é obrigatório',
            /*'role_id.required' => 'O campo Perfil é obrigatório',*/
            'supplier_id.required' => 'O campo Fornecedor é obrigatório',
        ];
    }
}
