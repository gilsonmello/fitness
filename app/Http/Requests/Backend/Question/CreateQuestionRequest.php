<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 01/07/2017
 * Time: 12:36
 */
namespace App\Http\Requests\Backend\Question;

use App\Http\Requests\Request;

class CreateQuestionRequest extends Request{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            //'supplier_id' => 'required',
            //'title' => 'required',
            /*'img' => 'required',
            'type' => 'required'*/
        ];
    }
}
