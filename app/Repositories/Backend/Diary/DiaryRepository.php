<?php
namespace App\Repositories\Backend\Diary;

use App\Model\Backend\Protocol;
use App\Exceptions\GeneralException;
use App\Model\Backend\TypeTest;
use App\Model\Backend\Measure;
use App\Model\Backend\Diary;
use App\Model\Backend\Supplier;

/**
 * Class DiaryRepository
 * @package App\Repositories\Backend\Diary
 */
class DiaryRepository
{

    /**
     * ProtocolRepository constructor.
     */
    public function __construct()
    {
        $this->protocol = new Protocol;
        $this->typeTest = new TypeTest;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $diary = Diary::find($id);
        if (!is_null($diary)) {
            return $diary;
        }
        return null;
    }

    public function getSuppliers(){
        return Supplier::where('is_active', '=', 1)->get();
    }

    /**
     * @param string $order_by
     * @param string $sort
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTypeTests($order_by = 'id', $sort = 'asc')
    {
        return TypeTest::where('is_active', '=', 1)->orderBy($order_by, $sort)->get();
    }

    /**
     * @param string $order_by
     * @param string $sort
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getMeasures($order_by = 'id', $sort = 'asc')
    {
        return Measure::where('is_active', '=', 1)->orderBy($order_by, $sort)->get();
    }

    /**
     * @param $request
     * @return bool
     */
    public function create($request)
    {
        $diary = new Diary;
        $data = $request->all();
        $diary->supplier_id = $data['supplier_id'];
        $diary->available_date = format_with_mask($data['available_date']);
        $diary->description = !is_null($data['description']) ? $data['description'] : NULL;
        $diary->is_active = isset($data['is_active']) ? $data['is_active'] : 0;
        if ($diary->save()) {
            return true;
        }
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Protocol::all()->where('is_active', '=', 1);
    }

    /**
     * @param $per_page
     * @param string $title
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page = NULL, $order_by = 'id', $sort = 'asc')
    {

        if (!is_null($per_page)) {
            return Diary::orderBy($order_by, $sort)->paginate($per_page);
        }
        return Diary::where('is_active', '=', 1)
            ->orderBy($order_by, $sort)
            ->get();
    }

    /**
     * Função para atualizar agenda
     * @param $request
     * @return boolean
     */
    public function update($id, $request)
    {
        $data = $request->all();
        $diary = $this->find($id);
        $diary->supplier_id = $data['supplier_id'];
        $diary->available_date = format_with_mask($data['available_date']);
        $diary->description = !is_null($data['description']) ? $data['description'] : NULL;
        $diary->is_active = isset($data['is_active']) ? $data['is_active'] : 0;
        if ($diary->save()) {
            return true;
        }
        return false;
    }

    /**
     * Função para deletar agenda
     * @param int $id
     * @return boolean
     */
    public function destroy($id)
    {
        $diary = $this->find($id);
        if ($diary->delete()) {
            return true;
        }
        return false;
    }
}