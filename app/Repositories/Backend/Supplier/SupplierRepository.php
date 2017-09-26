<?php 
namespace App\Repositories\Backend\Supplier;

use App\Model\Backend\Supplier;
use App\Exceptions\GeneralException;

/**
 * Class SupplierRepository
 * @package App\Repositories\Backend\Supplier
 */
class SupplierRepository{

    protected $supplier;

    public function __construct()
    {
        $this->supplier = new Supplier;
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id) {
        $supplier = $this->supplier->withTrashed()->find($id);
        if(!is_null($supplier)){
            return $supplier;
        }
        throw new GeneralException('That question does not exist.');
    }

    public function create($request){
        $data = $request->all();

        return false;
    }

    public function all(){
        return $this->supplier->all()->where('is_active', '=', 1);
    }

    /**
     * @param $request
     * @return boolean
     */
    public function update($id, $request){
        $data = $request->all();
        $supplier = $this->findOrThrowException($id);
        
        return false;
    }
    /**
     * @param int $id
     * @return boolean
     * @throws GeneralException
     */
    public function destroy($id){
        $supplier = $this->findOrThrowException($id);
        if ($supplier->delete()) {
            return true;
        }
        throw new GeneralException("There was a problem deleting this question. Please try again.");
    }

}