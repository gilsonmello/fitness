<?php
namespace App\Repositories\Backend\AdditionalData;

use App\Model\Backend\AdditionalData;
use App\Model\Backend\TypeTest;
use App\Model\Backend\Measure;
use App\Model\Backend\Test;
use App\Model\Backend\User;

/**
 * Class QuestionRepository
 * @package App\Repositories\Backend\Protocol
 */
class AdditionalDataRepository{

    /**
     * ProtocolRepository constructor.
     */
    public function __construct()
    {
        $this->additionalData = new AdditionalData;
        $this->typeTest = new TypeTest;
        $this->test = new Test;
    }

    /**
     * @param $id
     * @return null
     */
    public function findOrThrowException($id) {
        $additionalData = $this->additionalData->find($id);
        if(!is_null($additionalData)){
            return $additionalData;
        }
        return NULL;
    }

    /**
     * @param string $order_by
     * @param string $sort
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function getEvaluations($order_by = 'id', $sort = 'asc'){
        return User::has('evaluations')->get();
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
    public function create($request){
        $data = $request->all();
        $this->additionalData->evaluation_id = $data['evaluation_id'];
        $this->additionalData->name = $data['name'];
        $this->additionalData->initials = $data['initials'];
        $this->additionalData->value = !is_null($data['value']) && !empty($data['value']) ? $data['value'] : NULL;
        $this->additionalData->description = !is_null($data['description']) ? $data['description'] : NULL;
        $this->additionalData->is_active =  isset($data['is_active']) ? $data['is_active'] : 0;
        if($this->additionalData->save()){
            return true;
        }
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all(){
        return AdditionalData::all()->where('is_active', '=', 1);
    }

    /**
     * @param string $order_by
     * @param string $sort
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTypeTests($order_by = 'id', $sort = 'asc'){
        return TypeTest::where('is_active', '=', 1)->orderBy($order_by, $sort)->get();
    }

    /**
     * @param $per_page
     * @param string $title
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page = NULL, $title = '', $order_by = 'id', $sort = 'asc') {
        if(!is_null($per_page)){
            return $this->additionalData->orderBy($order_by, $sort)->paginate($per_page);
        }
        return $this->additionalData
            ->where('is_active', '=', 1)
            ->orderBy($order_by, $sort)
            ->get();
    }

    /**
     * Função para atualizar dado adicional
     * @param $request
     * @return boolean
     */
    public function update($id, $request){
        $data = $request->all();
        $additionalData = $this->findOrThrowException($id);
        $additionalData->evaluation_id = $data['evaluation_id'];
        $additionalData->name = $data['name'];
        $additionalData->initials = $data['initials'];
        $additionalData->value = !is_null($data['value']) && !empty($data['value']) ? $data['value'] : NULL;
        $additionalData->description = !is_null($data['description']) ? $data['description'] : NULL;
        $additionalData->is_active =  isset($data['is_active']) ? $data['is_active'] : 0;
        if($additionalData->save()){
            return true;
        }
        return false;
    }
    /**
     * Função para deletar dado adicional
     * @param int $id
     * @return boolean
     */
    public function destroy($id){
        $additionalData = $this->findOrThrowException($id);
        if ($additionalData->delete()) {
            return true;
        }
        return false;
    }


}