<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class FrontendController extends Controller
{
    public function index(){
    	$users = User::all();
    	return view('welcome', compact('users'));
    }
}
