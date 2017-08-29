<?php namespace App\Services\Backend\User\Traits;
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 11/07/2017
 * Time: 19:36
 */
trait UserAttributes{

    /**
     * @return string
     */
    public function getEditButtonAttribute() {
        return '<a href="'.route('backend.auth.edit', $this->id).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('crud.edit_button') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute() {
        return '<a href="'.route('backend.auth.destroy', $this->id).'" data-method="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('crud.delete_button') . '"></i></a>';
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