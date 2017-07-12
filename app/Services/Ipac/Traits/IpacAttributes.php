<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 11/07/2017
 * Time: 22:01
 */
namespace App\Services\Ipac\Traits;

trait IpacAttributes{

    /**
     * @return string
     */
    public function getEditButtonAttribute() {
        return '<a href="'.route('backend.ipacs.edit', $this->id).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('crud.edit_button') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute() {
        return '<a href="'.route('backend.ipacs.destroy', $this->id).'" data-method="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('crud.delete_button') . '"></i></a>';
    }

     public function getSolveButtonAttribute(){
         return '<a href="'.route('backend.ipacs.answer', $this->id).'"  class="btn btn-xs btn-info"><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="' . trans('strings.answer') . '"></i></a>';
    }

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
        $this->getDeleteButtonAttribute().' '.
        $this->getSolveButtonAttribute();
    }
}