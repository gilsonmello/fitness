<?php

namespace App\Http\Requests\Backend\Package;

use Illuminate\Foundation\Http\FormRequest;

class CreatePackageRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required',
            'img' => 'required|image|mimes:jpg,jpeg,png,gif',
            'img_discount' => 'image|mimes:jpg,jpeg,png,gif',
            'validity' => 'required|regex:/^[0-9]/',
            'value' => 'required',
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
            'name.required' => 'O campo Nome é obrigatório',
            /*'role_id.required' => 'O campo Perfil é obrigatório',*/
            'slug.required' => 'O campo Slug é obrigatório',
            'img.required' => 'O campo Imagem é obrigatório',
            'img.image' => 'O campo Imagem só pode ser selecionado imagem',
            'img.mimes' => 'O campo Imagem só pode ser selecionado imagem',
            'img_discount.image' => 'O campo Imagem só pode ser selecionado imagem',
            'img_discount.mimes' => 'O campo Imagem só pode ser selecionado imagem',
            'validity.required' => 'O campo Validade é obrigatório',
            'validity.regex' => 'O campo Validade só pode ser números',
            'value.required' => 'O campo Valor é obrigatório'

        ];
    }
}
