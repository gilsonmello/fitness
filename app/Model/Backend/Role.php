<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Backend\Role\Traits\RoleAttributes;

class Role extends Model
{
    use SoftDeletes, RoleAttributes;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function permissions(){
        return $this->belongsToMany(\App\Model\Backend\Permission::class);
    }

    public function users(){
        return $this->belongsToMany(\App\User::class);
    }
}
