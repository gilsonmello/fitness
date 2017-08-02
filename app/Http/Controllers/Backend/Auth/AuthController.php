<?php namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Auth\UpdateAuthRequest;
use App\Repositories\Backend\Auth\AuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
Use App\User;

class AuthController extends Controller
{
    /**
     * AuthController constructor.
     */
    public function __construct(){
        $this->authRepository = new AuthRepository;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        /*$id = (int) $id;
        $this->authorize('edit-auth', (int) $id);*/
        $auth = User::find($id);
        return view('backend.auth.edit', compact('auth'));
    }

    public function update($id, UpdateAuthRequest $request){
        if($this->authRepository->update($id, $request)){
            return redirect()->route('backend.dashboard')
                ->withFlashSuccess(trans('alerts.auth.edit'));
        }
        return redirect()->route('backend.auth.edit')
            ->withInput()
            ->withFlashDanger(trans('alerts.auth.edit'));
    }

}
