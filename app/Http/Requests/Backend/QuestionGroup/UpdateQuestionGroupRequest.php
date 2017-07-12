<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 01/07/2017
 * Time: 12:36
 */
namespace App\Http\Requests\Backend\QuestionGroup;

use App\Http\Requests\Request;

class UpdateQuestionGroupRequest extends Request{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title' => 'required|min:3|max:255',
            'description' => 'required',
        ];
    }
}
