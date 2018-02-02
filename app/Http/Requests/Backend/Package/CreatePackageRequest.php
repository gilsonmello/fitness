<?php

namespace App\Http\Requests\Backend\Package;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class CreatePackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::check('backend.packages.store');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:packages,name',
            'slug' => 'required|unique:packages,slug',
            'img' => 'required|image|mimes:jpg,jpeg,png,gif',
            'img_discount' => 'image|mimes:jpg,jpeg,png,gif',
            'validity' => 'required|regex:/^[0-9]/',
            'value' => 'required',
            'category_id'  => 'required|array|min:1',
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
            'name.unique' => 'O Nome informado ja existe',
            'slug.required' => 'O campo Slug é obrigatório',
            'slug.unique' => 'O Slug informado ja existe',
            'img.required' => 'O campo Imagem é obrigatório',
            'img.image' => 'O campo Imagem só pode ser selecionado imagem',
            'img.mimes' => 'O campo Imagem só pode ser selecionado imagem',
            'img_discount.image' => 'O campo Imagem só pode ser selecionado imagem',
            'img_discount.mimes' => 'O campo Imagem só pode ser selecionado imagem',
            'validity.required' => 'O campo Validade é obrigatório',
            'validity.regex' => 'O campo Validade só pode ser números',
            'value.required' => 'O campo Valor é obrigatório',
            'category_id.required' => 'O campo Categoria é obrigatório',

        ];
    }
}
