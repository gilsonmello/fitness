<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Role\RoleRepository;
use App\Http\Requests\Backend\Role\CreateRoleRequest;
use App\Http\Requests\Backend\Role\UpdateRoleRequest;

/**
 * Class RoleController
 * @package App\Http\Controllers\Backend
 */
class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * RoleController constructor.
     */
    public function __construct(){
        $this->roleRepository = new RoleRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize('backend.roles.index');
        $f_submit = $request->input('f_submit', '');
        $name = getValueSession($request, 'RoleController@index:name', '', $f_submit, '');
        $label = getValueSession($request, 'RoleController@index:label', '', $f_submit, '');
        $roles = $this->roleRepository->getPaginated(config('app.per_page'), $name, $label);

        if($request->ajax()){
            return view('backend.roles.paginate', compact(
                'roles',
                'name',
                'label'
            ));
        }

        return view('backend.roles.index', compact(
            'roles',
            'name',
            'label'
        ));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('backend.roles.create');
        //$permissions = $this->roleRepository->getPermissions();
        $permissionModules = $this->roleRepository->getPermissionModules();

        return view('backend.roles.create', compact('permissionModules'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateRoleRequest $request
     * @return mixed
     */
    public function store(CreateRoleRequest $request)
    {
        if($this->roleRepository->create($request)) {
            return redirect()->route('backend.roles.index')
                ->withFlashSuccess(trans('alerts.roles.create.success'));
        }
        return redirect()->route('backend.roles.create')
            ->withInput()
            ->withFlashError(trans('alerts.roles.create.error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.roles.show');
    }

    /**
     * how the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\GeneralException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('backend.roles.edit');
        $role = $this->roleRepository->find($id);
        $permissions = $this->roleRepository->getPermissions();
        return view('backend.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRoleRequest $request
     * @param $id
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        if($this->roleRepository->update($request, $id)){
            return redirect()->route('backend.roles.index')
                ->withFlashSuccess(trans('alerts.roles.edit.success'));
        }
        return redirect()->route('backend.roles.index')
            ->withFlashSuccess(trans('alerts.roles.edit.error'));
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize('backend.roles.destroy');
        if($this->roleRepository->destroy($id)){
            return redirect()->route('backend.roles.index')
                ->withFlashSuccess(trans('alerts.roles.delete.success'));
        }
        return redirect()->route('backend.roles.index')
            ->withFlashSuccess(trans('alerts.roles.delete.error'));
    }
}
