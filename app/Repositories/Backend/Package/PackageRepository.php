<?php
namespace App\Repositories\Backend\Package;

use App\Model\Backend\Protocol;
use App\Exceptions\GeneralException;
use App\Model\Backend\Package;

/**
 * Class PackageRepository
 * @package App\Repositories\Backend\Package
 */
class PackageRepository
{

    /**
     * ProtocolRepository constructor.
     */
    public function __construct()
    {
        
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function find($id)
    {
        $package = Package::findOrFail($id);
        if (!is_null($package)) {
            return $package;
        }
        throw new GeneralException("That Protocol does not exist.");
    }

    /**
     * @param $request
     * @return bool
     */
    public function create($request)
    {
        $data = $request->all();
        $package = new Package;
        
        if ($package->save()) {
            return true;
        }
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Package::all()->where('is_active', '=', 1);
    }

    /**
     * @param $per_page
     * @param string $title
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page = NULL, $title = '', $formula, $order_by = 'id', $sort = 'asc')
    {
        if (!is_null($per_page)) {
            return Package::orderBy($order_by, $sort)->paginate($per_page);
        }
        return Package::where('is_active', '=', 1)
            ->orderBy($order_by, $sort)
            ->get();
    }

    /**
     * Função para atualizar parq
     * @param $request
     * @return boolean
     */
    public function update($id, $request)
    {
        $data = $request->all();
        $package = $this->findOrThrowException($id);
        if ($package->save()) {
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
        $package = $this->findOrThrowException($id);
        if ($package->delete()) {
            return true;
        }
        throw new GeneralException("There was a problem deleting this parq. Please try again.");
    }
}