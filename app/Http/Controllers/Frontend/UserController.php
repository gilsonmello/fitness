<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\User\UserRepository;
use App\Http\Requests\Frontend\User\CreateUserRequest;
use App\Model\Backend\User;
use Auth;

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
        $this->userRepository = new UserRepository;
    }
    
    public function logout(Request $request){
        $request->user()->token()->revoke();
        $request->session()->flush();
        $request->session()->regenerate();
        return response()->json(['status' => 'success'], 200);
    }

    public function page(){
        return view('frontend.users.index');
    }

    public function verifyEmail(){
        return response()->json('true', 200);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        return $this->userRepository->all();
    }

    public function logged(Request $request){
        return response()->json(['message' => true], 200) ? $request->user() : response()->json(['message' => false], 400);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('frontend.users.create');
    }

    public function createUser(CreateUserRequest $request){
        if($result = $this->userRepository->create($request)){
            return response()->json($result, 200);
        }
        return response()->json('false', 400);
    }

    /**
     * @param CreateProtocolRequest $request
     * @return mixed
     */
    public function store(CreateUserRequest $request){
        if($result = $this->userRepository->create($request)){
            return response()->json($result, 200);
        }
        return response()->json('false', 400);
    }
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\GeneralException
     */
    public function edit($id){
        return $this->userRepository->find($id);
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
