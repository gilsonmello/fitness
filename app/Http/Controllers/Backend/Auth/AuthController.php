<?php namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Auth\UpdateAuthRequest;
use App\Http\Requests\Backend\Auth\CreateAuthRequest;
use App\Repositories\Backend\Auth\AuthRepository;
use App\Repositories\Backend\Supplier\SupplierRepository;
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
        $this->supplierRepository = new SupplierRepository;
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
        ], ['roles' => 'client']);
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
        $suppliers = $this->supplierRepository->all()->pluck('name', 'id')->all();
        return view('backend.auth.edit', compact('auth', 'roles', 'suppliers'));
    }

    public function update($id, UpdateAuthRequest $request){
        if($this->authRepository->update($id, $request)){
            return redirect()->route('backend.auth.index')
                ->withFlashSuccess(trans('alerts.auth.edit.success'));
        }
        return redirect()->route('backend.auth.edit', $id)
            ->withInput()
            ->withFlashDanger(trans('alerts.auth.edit.error'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $roles = $this->authRepository->roles();
        $suppliers = $this->supplierRepository->all()->pluck('name', 'id')->all();
        return view('backend.auth.create', compact('roles', 'suppliers'));
    }

    /**
     * @param CreateAuthRequest $request
     * @return mixed
     */
    public function store(CreateAuthRequest $request){
        if($this->authRepository->create($request)){
            return redirect()->route('backend.auth.index')
                ->withFlashSuccess(trans('alerts.auth.save.success'));
        }
        return redirect()->route('backend.auth.index')
            ->withInput()
            ->withFlashDanger(trans('alerts.auth.save.error'));
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
