<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permission;
use App\Services\Backend\User\Traits\UserAttributes;

class User extends Authenticatable
{
    use Notifiable, UserAttributes;

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

    public function roles(){
        return $this->belongsToMany(\App\Role::class);
    }

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
    
    public function hasAnyRoles($roles){
        if(is_object($roles)){
            return !! $roles->intersect($this->roles)->count();
        }
        return $this->roles->contains('name', $roles);
    }

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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function antropometria(){
        return $this->hasOne(\App\Antropometria::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bioempedancia(){
        return $this->hasOne(\App\Bioempedancia::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tests(){
        return $this->hasMany(\App\Test::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function additionalData(){
        return $this->hasMany(\App\AdditionalData::class);
    }


}
