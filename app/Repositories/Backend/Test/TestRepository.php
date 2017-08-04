<?php
namespace App\Repositories\Backend\Test;

use App\MinimumHeartRate;
use App\Test;
use App\Exceptions\GeneralException;
use App\Protocol;
use App\MaximumHeartRate;

/**
 * Class QuestionRepository
 * @package App\Repositories\Backend\Protocol
 */
class TestRepository{

    /**
     * ProtocolRepository constructor.
     */
    public function __construct()
    {
        $this->test = new Test;
        $this->protocol = new Protocol;
        $this->maximumHeartRate = new MaximumHeartRate;
        $this->minimumHeartRate = new MinimumHeartRate;
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id) {
        $test = $this->test->find($id);
        if(!is_null($test)){
            return $test;
        }
        throw new GeneralException("That test does not exist.");
    }

    /**
     * @param $request
     * @return bool
     */
    public function create($request){
        $data = $request->all();
        $this->test->user_id = $data['user_id'];
        $this->test->is_active =  isset($data['is_active']) ? $data['is_active'] : 0;
        if($this->test->save()){
            return true;
        }
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all(){
        return Test::where('is_active', '=', 1)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProtocols(){
        return $this->protocol->where('is_active', '=', 1)->orderBy('name', 'asc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getMaximumHeartRate($id){
        return $this->maximumHeartRate->where('test_id', '=', $id)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getMinimumHeartRate($id){
        return $this->minimumHeartRate->where('test_id', '=', $id)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProtocolsOfTest($id){
        return $this->maximumHeartRate->where('test_id', '=', $id)->get();
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findProtocol($id){
        $protocol = $this->protocol->find($id);
        if(!is_null($protocol)){
            return $this->protocol->find($id);
        }
        throw new GeneralException("That test does not exist.");
    }

    /**
     * @param $per_page
     * @param string $title
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page = NULL, $title = '', $formula, $order_by = 'id', $sort = 'asc') {

        if(!is_null($per_page)){
            return $this->test->orderBy($order_by, $sort)->paginate($per_page);
        }
        return $this->test
            ->where('is_active', '=', 1)
            ->orderBy($order_by, $sort)
            ->get();
    }

    /**
     * Função para atualizar parq
     * @param $request
     * @return boolean
     */
    public function update($id, $request){
        $data = $request->all();
        $test = $this->findOrThrowException($id);
        $test->name = $data['name'];
        $test->formula = $data['formula'];
        $test->description = !is_null($data['description']) ? $data['description'] : NULL;
        $test->is_active =  isset($data['is_active']) ? $data['is_active'] : 0;
        if($test->save()){
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
    public function destroy($id){
        $test = $this->findOrThrowException($id);
        if ($test->delete()) {
            return true;
        }
        throw new GeneralException("There was a problem deleting this parq. Please try again.");
    }

    public function saveFrequenciaCardiacaMaxima($id, $request){
        $data = $request->all();
        if(count($data) > 1){
            unset($data['_token']);
            $test = $this->findOrThrowException($id);
            if(count($test->maximumHeartRate) > 0){
                foreach($data as $key => $value){
                    $maximumHeartRate = $this->maximumHeartRate->where('protocol_id', '=', $value['id'])
                            ->where('test_id', '=', $test->id)
                            ->get()
                            ->first();
                    //Se já existir uma frequencia cardiaca cadastrada para o teste e o protocolo
                    if(!is_null($maximumHeartRate)){
                        $save = $this->maximumHeartRate->where('test_id', '=', $test->id)
                            ->where('protocol_id', '=', $value['id'])
                            ->update([
                                'result' => $value['result'],
                            ]);
                        if(!$save){
                            return false;
                        }
                    }else{
                        //Se não existir, crio um novo teste de frequencia cardiaca maxima
                        $this->maximumHeartRate->test_id = $test->id;
                        $this->maximumHeartRate->result = $value['result'];
                        $this->maximumHeartRate->protocol_id = $value['id'];
                        if (!$this->maximumHeartRate->save()) {
                            return false;
                        }
                        $this->maximumHeartRate = new MaximumHeartRate;
                    }
                }
                return true;
            }else{
                foreach($data as $key => $value) {
                    $this->maximumHeartRate->test_id = $test->id;
                    $this->maximumHeartRate->result = $value['result'];
                    $this->maximumHeartRate->protocol_id = $value['id'];
                    if (!$this->maximumHeartRate->save()) {
                        return false;
                    }
                    $this->maximumHeartRate = new MaximumHeartRate;
                }
                return true;
            }
        }
        return false;
    }

    public function destroyFrequenciaCardiacaMaxima($teste_id, $protocol_id){
        $test = $this->findOrThrowException($teste_id);
        $protocol = $this->protocol->find($protocol_id);
        $maximumHeartRate = $this->maximumHeartRate
            ->where('test_id', '=', $test->id)
            ->where('protocol_id', '=', $protocol->id)
            ->get()
            ->first();
        if (!is_null($maximumHeartRate)) {
            if($maximumHeartRate->delete()){
                return true;
            }
        }
        return false;
    }


    public function saveMinimumHeartRate($id, $request){
        $data = $request->all();
        if(count($data) > 1){
            unset($data['_token']);
            $test = $this->findOrThrowException($id);
            if(count($test->minimumHeartRate) > 0){
                foreach($data as $key => $value){
                    $minimumHeartRates = $this->minimumHeartRate->where('protocol_id', '=', $value['id'])
                        ->where('test_id', '=', $test->id)
                        ->get()
                        ->first();
                    //Se já existir uma frequencia cardiaca cadastrada para o teste e o protocolo
                    if(!is_null($minimumHeartRates)){
                        $save = $this->minimumHeartRate->where('test_id', '=', $test->id)
                            ->where('protocol_id', '=', $value['id'])
                            ->update([
                                'result' => $value['result'],
                            ]);
                        if(!$save){
                            return false;
                        }
                    }else{
                        //Se não existir, crio um novo teste de frequencia cardiaca maxima
                        $this->minimumHeartRate->test_id = $test->id;
                        $this->minimumHeartRate->result = $value['result'];
                        $this->minimumHeartRate->protocol_id = $value['id'];
                        if (!$this->minimumHeartRate->save()) {
                            return false;
                        }
                        $this->minimumHeartRate = new MinimumHeartRate;
                    }
                }
                return true;
            }else{
                foreach($data as $key => $value) {
                    $this->minimumHeartRate->test_id = $test->id;
                    $this->minimumHeartRate->result = $value['result'];
                    $this->minimumHeartRate->protocol_id = $value['id'];
                    if (!$this->minimumHeartRate->save()) {
                        return false;
                    }
                    $this->minimumHeartRate = new MinimumHeartRate;
                }
                return true;
            }
        }
        return false;
    }

    /**
     * @param $test_id
     * @param $protocol_id
     * @return bool
     * @throws GeneralException
     */
    public function destroyMinimumHeartRate($test_id, $protocol_id){
        $test = $this->findOrThrowException($test_id);
        $protocol = $this->protocol->find($protocol_id);
        $minimumHeartRate = $this->minimumHeartRate
            ->where('test_id', '=', $test->id)
            ->where('protocol_id', '=', $protocol->id)
            ->get()
            ->first();
        if (!is_null($minimumHeartRate)) {
            if($minimumHeartRate->delete()){
                return true;
            }
        }
        return false;
    }


}