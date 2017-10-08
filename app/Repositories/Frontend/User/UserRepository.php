<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 30/08/2017
 * Time: 15:47
 */

namespace App\Repositories\Frontend\User;
use App\Model\Backend\User;

/**
 * Class UserRepository
 * @package App\Repositories\Frontend\User
 */
class UserRepository
{
    /**
     * @return mixed
     */
    public function all(){
        return User::where('is_active', '=', 1)->orderBy('name', 'asc')->get();
    }

    public function find($id){
        $user = User::findOrFail($id);
        return $user;
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        return $user->delete();
    }

}