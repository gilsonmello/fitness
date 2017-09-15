<?php namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Auth\UpdateAuthRequest;
use App\Http\Requests\Backend\Auth\CreateAuthRequest;
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

    public function index(Request $request){
        //$users = $this->authRepository->users();

        $request->session()->put('lastpage', $request->only('page')['page']);
        $f_submit = $request->input('f_submit', '');
        $name = getValueSession($request, 'Backend/AuthController@index:name', '', $f_submit, '');
        $email = getValueSession($request, 'Backend/AuthController@index:email', '', $f_submit, '');
        $cpf = getValueSession($request, 'Backend/AuthController@index:cpf', '', $f_submit, '');
        $rg = getValueSession($request, 'Backend/AuthController@index:rg', '', $f_submit, '');
        $profile = getValueSession($request, 'Backend/AuthController@index:profile', '', $f_submit, '');
        if(empty($profile)){
            $profile = [];
        }
        $profile = array_map('intval', $profile);
        $roles = $this->authRepository->roles();
        $users = $this->authRepository->getPaginated(NULL, [
            'name' => ['op' => 'like', 'value' => '%'.$name.'%'],
            'email' => ['op' => 'like', 'value' => '%'.$email.'%'],
            'cpf' => ['op' => '=', 'value' => $cpf],
            'rg' => ['op' => '=', 'value' => $rg],
            'role_id' => ['op' => 'In', 'value' => $profile]
        ]);
        return view('backend.auth.index', compact(
            'roles', 'users', 'name', 'email', 'cpf', 'rg', 'profile'
        ));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        /*$id = (int) $id;
        $this->authorize('edit-auth', (int) $id);*/
        $auth = User::find($id);
        $roles = $this->authRepository->roles();
        return view('backend.auth.edit', compact('auth', 'roles'));
    }

    public function update($id, UpdateAuthRequest $request){
        if($this->authRepository->update($id, $request)){
            return redirect()->route('backend.auth.index')
                ->withFlashSuccess(trans('alerts.auth.edited'));
        }
        return redirect()->route('backend.auth.edit')
            ->withInput()
            ->withFlashDanger(trans('alerts.auth.not_edit'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $roles = $this->authRepository->roles();
        return view('backend.auth.create', compact('roles'));
    }

    /**
     * @param CreateAuthRequest $request
     * @return mixed
     */
    public function store(CreateAuthRequest $request){
        if($this->authRepository->create($request)){
            return redirect()->route('backend.auth.index')
                ->withFlashSuccess(trans('alerts.auth.created'));
        }
        return redirect()->route('backend.auth.index')
            ->withInput()
            ->withFlashDanger(trans('alerts.auth.not_create'));
    }

    /**
     * @return json
     */
    public function emailExists(){
        $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
        return die(json_encode(emailExists($_GET['email'], $user_id)));
    }


    public function destroy($id){
        return $this->authRepository->destroy($id) ? 
            redirect()->route('backend.auth.index')->withFlashSuccess(trans('alerts.users.delete.success')) : 
            redirect()->route('backend.auth.index')->withFlashDanger(trans('alerts.users.delete.error'));

    }

}
