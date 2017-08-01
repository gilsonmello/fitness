<?php
namespace App\Repositories\Backend\Test;

use App\Test;
use App\Exceptions\GeneralException;
use App\Protocol;

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
        return Test::where('is_active', '=', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProtocols(){
        return $this->protocol->where('is_active', '=', 1)->orderBy('name', 'asc');
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function getProtocol($id){
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


}