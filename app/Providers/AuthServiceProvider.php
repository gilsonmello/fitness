<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Model\Backend\User;
use App\Model\Backend\Permission;
use Auth;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();
        Passport::routes();


        /*Gate::define('edit-auth', function($user, $id) {
            return $user->id == $id;
        });*/

        /*$permissions = Permission::with('roles')->get();
        foreach($permissions as $permission){
            $gate->define($permission->name, function(User $user) use ($permission){
                return $user->hasPermission($permission);
            });
        }
        $gate->before(function(User $user, $permission){
            if($user->hasAnyRoles('adm')){
                return true;
            }
        });*/

    }
}
