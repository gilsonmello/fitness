<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\API\User\UserRepository;
class UserController extends Controller
{
    public function __construct(){
        $this->userRepository = new UserRepository;
    }

    public function find($id){

    }

    public function all(){
        return response()->json($this->userRepository->all(), 200);
    }
}
