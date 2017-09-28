<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\User\UserRepository;
use App\Model\Backend\User;

/**
 * Class UserController
 * @package App\Http\Controllers\Frontend
 */
class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct(){
        $this->user = new UserRepository;
    }

    public function page(){
        return view('frontend.users.index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        return $this->user->all();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('frontend.users.create');
    }

    /**
     * @param CreateProtocolRequest $request
     * @return mixed
     */
    public function store(){
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\GeneralException
     */
    public function edit($id){
        return $this->user->find($id);
    }

    /**
     * @param $id
     * @param UpdateProtocolRequest $request
     * @return mixed
     */
    public function update($id){
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        if(!is_null($user)){
            if($user->delete()){
                return response()->json('true');
            }
        }
        return response()->json('false');
    }
}
