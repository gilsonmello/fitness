<?php
namespace App\Repositories\Backend\Role;

use App\Model\Backend\Protocol;
use App\Model\Backend\Role;
use App\Model\Backend\Permission;
use App\Exceptions\GeneralException;

/**
 * Class QuestionRepository
 * @package App\Repositories\Backend\Protocol
 */
class RoleRepository
{

    /**
     * ProtocolRepository constructor.
     */
    public function __construct(){
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function find($id)
    {
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            return $role;
        }
        return null;
    }

    /**
     * @param $request
     * @return bool
     */
    public function create($request)
    {
        $role = new Role;
        $role->name = $request->get('name');
        $role->label = $request->get('label');
        $role->is_active = !is_null($request->get('is_active')) ? $request->get('is_active') : 0;
        if ($role->save()) {
            $role->permissions()->attach($request->get('permission_id'));
            return true;
        }
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Role::where('name', '<>', 'admin')
            ->where('is_active', '=', 1)
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getPermissions()
    {
        return Permission::where('is_active', '=', 1)
            ->where('name', '<>', 'admin')
            ->get();
    }

    /**
     * @param null $per_page
     * @param string $name
     * @param string $label
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page = NULL, $name = '', $label = '', $order_by = 'id', $sort = 'asc')
    {
        if (!is_null($per_page)) {
            return Role::orderBy($order_by, $sort)
                ->where('name', '<>', 'admin')
                ->where('is_active', '=', 1)
                ->where('name', 'like', '%'.$name.'%')
                ->where('label', 'like', '%'.$label.'%')
                ->paginate($per_page);
        }
        return Role::where('is_active', '=', 1)
            ->where('name', 'like', '%'.$name.'%')
            ->where('label', 'like', '%'.$label.'%')
            ->orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param $request
     * @param $id
     * @return bool
     * @throws GeneralException
     */
    public function update($request, $id)
    {
        $role = $this->find($id);
        $role->name = $request->get('name');
        $role->label = $request->get('label');
        $role->is_active = !is_null($request->get('is_active')) ? $request->get('is_active') : 0;
        if ($role->save()) {
            $role->permissions()->sync($request->get('permission_id'));
            return true;
        }
        return false;
    }

    /**
     * Função para deletar parq
     * @param int $id
     * @return boolean
     * @throws GeneralException
     */
    public function destroy($id)
    {
        $role = $this->find($id);
        if ($role->delete()) {
            $role->permissions()->detach();
            return true;
        }
        return false;
    }
}