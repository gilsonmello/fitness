<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Backend\Permission;
use App\Services\Backend\User\Traits\UserAttributes;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, UserAttributes, SoftDeletes;

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(){
        return $this->belongsToMany(\App\Model\Backend\Role::class);
    }

    public function scopeOfClients($query){
        return $query->whereHas('roles', function($subquery){
            $subquery->where('name', 'client');
        })->get();
    }

    /**
     * @param $permissions
     * @return bool
     */
    public function hasPermission($permissions){
        if(is_array($permissions)){
            foreach($this->roles as $role){
                foreach($permissions as $permission){
                    if($role->permissions->contains('name', $permission)){
                        return true;
                    }
                }
            }
        }else if(is_string($permissions)){
            foreach($this->roles as $role){
                if($role->permissions->contains('name', $permissions)){
                    return true;
                }
            }
        }else if(is_object($permissions)){
            return $this->hasAnyRoles($permissions->roles);
        }
        return false;
    }

    /**
     * @param $roles
     * @return bool
     */
    public function hasAnyRoles($roles){
        if(is_object($roles)){
            return !! $roles->intersect($this->roles)->count();
        }
        return $this->roles->contains('name', $roles);
    }

    /**
     *
     */
    public function rolesOfUser(){
        $rolesUser = auth()->user()->roles;
        foreach($rolesUser as $roleUser){
            echo $roleUser->name.'<br>';
            $permissions = $roleUser->permissions;
            foreach ($permissions as $permission) {
                echo $permission->name.'<br>';
            }
            echo '<br><br>';
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluations(){
        return $this->hasMany(\App\Model\Backend\Evaluation::class);
    }

    public function suppliers(){
        return $this->belongsToMany(\App\Model\Backend\Supplier::class, 'suppliers_has_users', 'user_id', 'supplier_id')
        ->withPivot(['actual'])
        ->withTimestamps();
    }

    public function schedules(){
        return $this->hasMany(\App\Model\Frontend\Schedule::class);
    }

}
