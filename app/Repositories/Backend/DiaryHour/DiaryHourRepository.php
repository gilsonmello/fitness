<?php
namespace App\Repositories\Backend\DiaryHour;

use App\Model\Backend\Protocol;
use App\Exceptions\GeneralException;
use App\Model\Backend\TypeTest;
use App\Model\Backend\Measure;
use App\Model\Backend\Diary;
use App\Model\Backend\DiaryHour;

/**
 * Class DiaryHourRepository
 * @package App\Repositories\Backend\DiaryHour
 */
class DiaryHourRepository
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
        $diaryHour = DiaryHour::find($id);
        if (!is_null($diaryHour)) {
            return $diaryHour;
        }
        return null;
    }

    public function getDiaries(){
        return Diary::where('is_active', '=', 1)->get();
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
        $diary_hour = new DiaryHour;
        $data = $request->all();
        $diary_hour->diary_id = $data['diary_id'];
        $diary_hour->available_hour = $data['available_hour'];
        $diary_hour->is_active = isset($data['is_active']) ? $data['is_active'] : 0;
        if ($diary_hour->save()) {
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
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page = NULL, $order_by = 'id', $sort = 'asc')
    {
        if (!is_null($per_page)) {
            return DiaryHour::orderBy($order_by, $sort)->paginate($per_page);
        }
        return DiaryHour::where('is_active', '=', 1)
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
        $diary_hour = $this->find($id);
        $diary_hour->diary_id = $data['diary_id'];
        $diary_hour->available_hour = $data['available_hour'];
        $diary_hour->is_active = isset($data['is_active']) ? $data['is_active'] : 0;
        if ($diary_hour->save()) {
            return true;
        }
        return false;
    }

    /**
     * Função para deletar parq
     * @param int $id
     * @return boolean
     */
    public function destroy($id)
    {
        $diary_hour = $this->find($id);
        if ($diary_hour->delete()) {
            return true;
        }
        return false;
    }
}