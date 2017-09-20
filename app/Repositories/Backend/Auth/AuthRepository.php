<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 01/08/2017
 * Time: 19:19
 */

namespace App\Repositories\Backend\Auth;
use App\User;
use App\Role;


class AuthRepository{


    public function __construct(){
        $this->user = new User;
    }


    /**
     * @param $per_page
     * @param array $params
     * @param array $whereHas
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page = NULL, $params = [], $whereHas = [], $order_by = 'users.id', $sort = 'asc')
    {
        $user = User::where('users.is_active', '=', 1);
        if (!is_null($per_page)) {
            return $user->orderBy($order_by, $sort)->paginate($per_page);
        }
        //
        if(!is_null($params) && count($params) > 0){
            $user->where(function($query) use ($params){
                foreach($params as $column => $param){
                    if(!empty($param['value']) && isset($param['value']) && is_string($param['value'])){
                        $query->where($column, $param['op'], $param['value']);
                    }else if(is_array($param['value']) && count($param['value']) > 0){
                        $query->whereHas('roles', function($q) use ($column, $param) {
                            $condition_name = 'where'.$param['op'];
                            $q->{$condition_name}($column, $param['value']);
                        });
                    }
                }
            });
        }

        if(!is_null($whereHas) && count($whereHas) > 0){
            foreach($whereHas as $key => $value){
                $user->whereHas($value);
            }
        }

        return $user->orderBy($order_by, $sort)->get();
    }

    public function users(){
        return $this->user->all();
    }

    public function create($request){

        $data = $request->all();
        $this->user->name = $data['name'];
        $this->user->email = $data['email'];
        $this->user->password = bcrypt($data['password']);
        $this->user->birth_date = format_with_mask($data['birth_date']);
        $this->user->cpf = $data['cpf'];
        $this->user->rg = $data['rg'];

        if($this->user->save()){
            if(count($data['role_id']) > 0){
                $this->user->roles()->attach($data['role_id']);
            }
            return true;
        }

        return false;
    }

    public function update($id, $request){

        $data = $request->all();

        $user = $this->find($id);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->birth_date = format_with_mask($data['birth_date']);
        $user->cpf = $data['cpf'];
        $user->rg = $data['rg'];

        if($user->save()){
            if(count($data['role_id']) > 0){
                $user->roles()->sync($data['role_id']);
            }
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

    /**
     * @return mixed
     */
    public function roles(){
        return Role::where('is_active', '=', 1)->get();
    }

    /**
     * @param $param
     * @return mixed
     */
    public function emailExists($param){
        return User::where('email', 'like', '%'.$param.'%')->get()->isEmpty();
    }

    public function destroy($id){
        $user = $this->find($id);
        if($user->delete()){
            return true;
        }
        return false;
    }
}