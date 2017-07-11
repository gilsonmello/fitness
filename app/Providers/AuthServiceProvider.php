<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Permission;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate, User $user)
    {
        $this->registerPolicies();
        
        $permissions = Permission::with('roles')->get();


        foreach($permissions as $permission){
            $gate->define($permission->name, function(User $user) use ($permission){
                return $user->hasPermission($permission);
            });
        }
        $gate->before(function(User $user, $permission){
            if($user->hasAnyRoles('adm')){
                return true;
            }
        });
    }
}
