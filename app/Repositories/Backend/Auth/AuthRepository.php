<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 01/08/2017
 * Time: 19:19
 */

namespace App\Repositories\Backend\Auth;
use App\User;


class AuthRepository{

    public function __construct(){
        $this->user = new User;
    }

    public function update($id, $request){

        $data = $request->all();

        $user = $this->find($id);

        $user->name = $data['name'];
        dd(birth_date(format_with_mask($data['birth_date'])));
        $user->birth_date = format_with_mask($data['birth_date']);
        $user->cpf = $data['cpf'];
        $user->rg = $data['rg'];

        $save = $user->save();

        if($save){
            return true;
        }

        return false;
    }

    public function find($id){
        $user = $this->user->find($id);
        if(!is_null($user)){
            return $user;
        }
        throw new GeneralException("That test does not exist.");
    }

}