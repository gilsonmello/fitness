<?php

namespace App\Http\Requests\Backend\Package;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdatePackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::check('backend.packages.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:packages,name,'.$this->id.',id',
            'slug' => 'required|unique:packages,slug,'.$this->id.',id',
            'img' => isset($this->img) ? 'required|image|mimes:jpg,jpeg,png,gif' : '',
            'img_discount' => 'image|mimes:jpg,jpeg,png,gif',
            'validity' => 'required|regex:/^[0-9]/',
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
        ];
    }
}
