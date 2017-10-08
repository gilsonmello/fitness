<?php namespace App\Services\QuestionGroup\Traits;
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 11/07/2017
 * Time: 19:36
 */
trait QuestionGroupAttributes{

    /**
     * @return string
     */
    public function getEditButtonAttribute() {
        return '<a href="'.route('backend.question_group.edit', $this->id).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('crud.edit_button') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute() {
        return '<a href="'.route('backend.question_group.destroy', $this->id).'" data-method="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('crud.delete_button') . '"></i></a>';
    }

   /* public function getSendEmailButtonAttribute(){
        return '<a href="'.route('backend.question_group.send', $this->id).'"  class="btn btn-xs btn-info"><i class="fa fa-envelope" data-toggle="tooltip" data-placement="top" title="' . trans('crud.send_button') . '"></i></a>';

    }*/

    public function getStartDateAttribute($start_date) {
        return Carbon::parse($start_date)->format('d/m/Y');
    }

    public function getDueDateAttribute($due_date) {
        return Carbon::parse($due_date)->format('d/m/Y');
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute() {
        return $this->getEditButtonAttribute().' '.
        $this->getDeleteButtonAttribute().' '/*.
        $this->getSendEmailButtonAttribute()*/
            ;
    }

}