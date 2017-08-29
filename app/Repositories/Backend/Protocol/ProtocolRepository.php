<?php
namespace App\Repositories\Backend\Protocol;

use App\Protocol;
use App\Exceptions\GeneralException;
use App\TypeTest;
use App\Measure;

/**
 * Class QuestionRepository
 * @package App\Repositories\Backend\Protocol
 */
class ProtocolRepository
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
     * @throws GeneralException
     */
    public function findOrThrowException($id)
    {
        $protocol = $this->protocol->find($id);
        if (!is_null($protocol)) {
            return $protocol;
        }
        throw new GeneralException("That Protocol does not exist.");
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
        $data = $request->all();
        $this->protocol->measure_id = $data['measure_id'];
        $this->protocol->name = $data['name'];
        $this->protocol->formula = $data['formula'];
        $this->protocol->description = !is_null($data['description']) ? $data['description'] : NULL;
        $this->protocol->is_active = isset($data['is_active']) ? $data['is_active'] : 0;
        if ($this->protocol->save()) {
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
    public function getPaginated($per_page = NULL, $title = '', $formula, $order_by = 'id', $sort = 'asc')
    {

        if (!is_null($per_page)) {
            return $this->protocol->orderBy($order_by, $sort)->paginate($per_page);
        }
        return $this->protocol
            ->where('is_active', '=', 1)
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
        $protocol = $this->findOrThrowException($id);
        $protocol->measure_id = $data['measure_id'];
        $protocol->name = $data['name'];
        $protocol->formula = $data['formula'];
        $protocol->description = !is_null($data['description']) ? $data['description'] : NULL;
        $protocol->is_active = isset($data['is_active']) ? $data['is_active'] : 0;
        if ($protocol->save()) {
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
        $protocol = $this->findOrThrowException($id);
        if ($protocol->delete()) {
            $this->protocol->typeTest()->detach();
            return true;
        }
        throw new GeneralException("There was a problem deleting this parq. Please try again.");
    }
}