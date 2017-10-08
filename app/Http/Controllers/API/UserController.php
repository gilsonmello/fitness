<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\API\User\UserRepository;
use App\Http\Requests\API\User\CreateUserRequest;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function __construct(){
        $this->userRepository = new UserRepository;
    }

    public function store(CreateUserRequest $request){
    	if($result = $this->userRepository->create($request)){
    		return response()->json($result, 200);
    	}
    	return response()->json('false', 400);
    }

    public function find($id){

    }

    public function all(){
        return response()->json($this->userRepository->all(), 200);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated($user, Request $request)
    {
        /*$params = [
        	'form_params' => [
		        'grant_type' => 'password',
		        'client_id' => env('API_CLIENT_ID'),
		        'client_secret' => env('API_CLIENT_SECRET'),
		        'username' => $user->email,
            	'password' => $user->password,
		        'scope' => '',
		    ]
	    ];
        $http = new Client();

		$response = $http->post('http://localhost:8000/oauth/token', [
		    'form_params' => [
		    	'_token' => csrf_token(),
		        'grant_type' => 'password',
		        'client_id' => env('API_CLIENT_ID'),
		        'client_secret' => env('API_CLIENT_SECRET'),
		        'username' => $user->email,
            	'password' => $user->password,
		        'scope' => '',
		    ],
		]);


		return json_decode((string) $response->getBody(), true);*/

		$client = new Client([
		    // Base URI is used with relative requests
		    'base_uri' => 'http://httpbin.org',
		    // You can set any number of default request options.
		    'timeout'  => 2.0,
		]);



    }
}
