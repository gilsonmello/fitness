<?php
namespace App\Repositories\Backend\Test;

use App\MinimumHeartRate;
use App\Test;
use App\Exceptions\GeneralException;
use App\Protocol;
use App\MaximumHeartRate;
use App\ReserveHeartRate;
use App\MaximumVo2;
use App\TrainingVo2;
use App\User;

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
        $this->reserveHeartRate = new ReserveHeartRate;
        $this->maximumVo2 = new MaximumVo2;
        $this->trainingVo2 = new TrainingVo2;
        $this->user = new User;
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
    public function getReserveHeartRate($id){
        return $this->reserveHeartRate->where('test_id', '=', $id)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getMaximumVo2($id){
        return $this->maximumVo2->where('test_id', '=', $id)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTrainingVo2($id){
        return $this->trainingVo2->where('test_id', '=', $id)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProtocolsOfTest($id){
        return $this->maximumHeartRate->where('test_id', '=', $id)->get();
    }

    private function findAttribute($arr, $val){
        $notFind = [];
        foreach($arr as $value){
            if($value == $val){
                return $val;
            }else{
                $notFind[] = $value;
            }
        }
        return $notFind;
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findProtocolVo2Maximum($test_id, $id){
        $protocol = $this->protocol->find($id);
        $test = $this->findOrThrowException($test_id);
        $notFind = [];
        if(!is_null($protocol)){
            //Procurando na tabela de usuários
            $attributes = preg_split('/<|>|[0-9|\-|\/|\*|\+]/i',$protocol->formula, -1);
            $collums = $this->user->getTableColumns();
            $formula = $protocol->formula;
            $notFind = [];
            $attributes = array_filter($attributes);
            foreach($attributes as $attribute){
                if(in_array($attribute, $collums)){
                    $birth_date = $this->user->select(''.$attribute.'')->where('id', '=', $test->user->id)->get()->first();
                    $formula = str_replace($attribute, $birth_date->{$attribute}, $formula);
                }else{
                    $notFind[] = $attribute;
                }
            }
            $formula = string_replace(['<', '>'], '', $formula);
            try{
                $protocol->result = !empty(eval('return '.$formula.';')) ? eval('return '.$formula.';') : NULL;
                $protocol->result = number_format($protocol->result, 2, '.', '');
                return $protocol;
            }catch(\Exception $e){
                $protocol->notFind = $notFind;
                return $protocol;
            }

            /*foreach($collums as $collum){
                if(strpos($protocol->formula, $collum) !== FALSE){
                    $birth_date = $this->user->select(''.$collum.'')->where('id', '=', $test->user->id)->get()->first();
                    $formula = str_replace($collum, $birth_date->{$collum}, $formula);
                }else{
                    $notFind = $protocol->formula;
                }
            }
            dd($formula, $collums);*/
            /*$protocol->formula = str_replace($collum, $birth_date->{$collum}, $protocol->formula);
            $protocol->result = !empty(eval('return '.$protocol->formula.';')) ? eval('return '.$protocol->formula.';') : NULL;
            $protocol->result = number_format($protocol->result, 2, '.', '');
            if($protocol->result != NULL){
                return $protocol;
            }*/

            /*foreach($this->user->getTableColumns() as $tableUser){
                echo '<pre>';
                if(in_array($tableUser, $teste)){
                    $attribute = $this->user->select(''.$tableUser.'')->where('id', '=', $test->user->id)->get()->first();
                    dd($attribute->{$tableUser}, $tableUser, $protocol->formula);
                    $protocol->formula = str_replace($tableUser, $attribute->{$tableUser}, $protocol->formula);
                    $protocol->result = !empty(eval('return '.$protocol->formula.';')) ? eval('return '.$protocol->formula.';') : NULL;
                    $protocol->result = number_format($protocol->result, 2, '.', '');
                    if($protocol->result != NULL){
                        return $protocol;
                    }
                }
                if($this->findAttribute($teste, $tableUser)){
                //if(strpos($protocol->formula, $tableUser) !== FALSE){
                    $birth_date = $this->user->select(''.$tableUser.'')->where('id', '=', $test->user->id)->get()->first();
                    $protocol->formula = str_replace($tableUser, $birth_date->{$tableUser}, $protocol->formula);
                    $protocol->result = !empty(eval('return '.$protocol->formula.';')) ? eval('return '.$protocol->formula.';') : NULL;
                    $protocol->result = number_format($protocol->result, 2, '.', '');
                    if($protocol->result != NULL){
                        return $protocol;
                    }
                }
            }*/

           /* //Procurando na tabela de usuários
            foreach($this->trainingVo2->getTableColumns() as $tableTrainingVo2){
                dd($this->trainingVo2->getTableColumns());
                if(strpos($protocol->formula, $tableTrainingVo2) !== FALSE){
                    $birth_date = $this->user->select(''.$tableTrainingVo2.'')->where('id', '=', $test->user->id)->get()->first();
                    $protocol->formula = str_replace($tableTrainingVo2, $birth_date->{$tableTrainingVo2}, $protocol->formula);
                    $protocol->result = !empty(eval('return '.$protocol->formula.';')) ? eval('return '.$protocol->formula.';') : NULL;
                    $protocol->result = number_format($protocol->result, 2, '.', '');
                    if($protocol->result != NULL){
                        return $protocol;
                    }
                }
            }*/

        }
        throw new GeneralException("That test does not exist.");
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findProtocol($test_id, $id){
        $protocol = $this->protocol->find($id);
        $test = $this->findOrThrowException($test_id);
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

    public function saveMaximumHeartRate($id, $request){
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

    public function destroyMaximumHeartRate($teste_id, $protocol_id){
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

        //Todos os dados da requisição
        $data = $request->all();

        //Removendo o token do array
        unset($data['_token']);

        //Buscando o teste
        $test = $this->findOrThrowException($id);

        //Se já existir um teste de frequencia cardiaca mínima, tentará atualizar os já existentes
        //Se não, irá criar todos os testes feito
        if(count($test->minimumHeartRate) > 0){

            //Loop em todos os dados informados no formulário
            foreach($data as $key => $value){

                //Busco o teste de frequencia cardíaca mínima
                $minimumHeartRates = $this->minimumHeartRate->where('protocol_id', '=', $value['id'])
                    ->where('test_id', '=', $test->id)
                    ->get()
                    ->first();

                //Se já existir um teste de frequencia cardiaca mínima cadastrada para o teste e o protocolo
                //Se não existir, crio um novo teste de frequencia cardiaca mínima
                if(!is_null($minimumHeartRates)){
                    //Tento atualizar o registro já existente
                    $save = $minimumHeartRates->update([
                            'result' => $value['result'],
                        ]);
                    //Se não atualizar retorno falso
                    if(!$save){
                        return false;
                    }
                }else{
                    $this->minimumHeartRate->test_id = $test->id;
                    $this->minimumHeartRate->result = $value['result'];
                    $this->minimumHeartRate->protocol_id = $value['id'];
                    //Se não salvar, retorno falso
                    if (!$this->minimumHeartRate->save()) {
                        return false;
                    }
                    $this->minimumHeartRate = new MinimumHeartRate;
                }
            }
            //Se todos os dados foram salvos e atualizados, retorno true
            return true;
        }else{

            //Loop em todos os dados informados no formulário
            foreach($data as $key => $value) {

                $this->minimumHeartRate->test_id = $test->id;
                $this->minimumHeartRate->result = $value['result'];
                $this->minimumHeartRate->protocol_id = $value['id'];

                //Se não salvar, retorno falso
                if (!$this->minimumHeartRate->save()) {
                    return false;
                }

                $this->minimumHeartRate = new MinimumHeartRate;

            }
            //Se todos os dados foram salvos e atualizados, retorno true
            return true;
        }
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
        $minimumHeartRate= $this->minimumHeartRate
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


    /**
     * @param $id
     * @param $request
     * @return bool
     * @throws GeneralException
     */
    public function saveReserveHeartRate($id, $request){
        $data = $request->all();
        if(count($data) > 1){
            unset($data['_token']);
            $test = $this->findOrThrowException($id);
            if(count($test->reserveHeartRate) > 0){
                foreach($data as $key => $value){
                    $reserveHeartRates = $this->reserveHeartRate->where('protocol_id', '=', $value['id'])
                        ->where('test_id', '=', $test->id)
                        ->get()
                        ->first();
                    //Se já existir uma frequencia cardiaca cadastrada para o teste e o protocolo
                    if(!is_null($reserveHeartRates)){
                        $save = $this->reserveHeartRate->where('test_id', '=', $test->id)
                            ->where('protocol_id', '=', $value['id'])
                            ->update([
                                'result' => $value['result'],
                            ]);
                        if(!$save){
                            return false;
                        }
                    }else{
                        //Se não existir, crio um novo teste de frequencia cardiaca maxima
                        $this->reserveHeartRate->test_id = $test->id;
                        $this->reserveHeartRate->result = $value['result'];
                        $this->reserveHeartRate->protocol_id = $value['id'];
                        if (!$this->reserveHeartRate->save()) {
                            return false;
                        }
                        $this->reserveHeartRate = new ReserveHeartRate;
                    }
                }
                return true;
            }else{
                foreach($data as $key => $value) {
                    $this->reserveHeartRate->test_id = $test->id;
                    $this->reserveHeartRate->result = $value['result'];
                    $this->reserveHeartRate->protocol_id = $value['id'];
                    if (!$this->reserveHeartRate->save()) {
                        return false;
                    }
                    $this->reserveHeartRate = new ReserveHeartRate;
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
    public function destroyReserveHeartRate($test_id, $protocol_id){
        $test = $this->findOrThrowException($test_id);
        $protocol = $this->protocol->find($protocol_id);
        $reserveHeartRate = $this->reserveHeartRate
            ->where('test_id', '=', $test->id)
            ->where('protocol_id', '=', $protocol->id)
            ->get()
            ->first();
        if (!is_null($reserveHeartRate)) {
            if($reserveHeartRate->delete()){
                return true;
            }
        }
        return false;
    }

    /**
     * @param $id
     * @param $request
     * @return bool
     * @throws GeneralException
     */
    public function saveMaximumVo2($id, $request){
        $data = $request->all();
        if(count($data) > 1){
            unset($data['_token']);
            $test = $this->findOrThrowException($id);
            if(count($test->maximumVo2) > 0){
                foreach($data as $key => $value){
                    $maximumVo2 = $this->maximumVo2->where('protocol_id', '=', $value['id'])
                        ->where('test_id', '=', $test->id)
                        ->get()
                        ->first();
                    //Se já existir uma frequencia cardiaca cadastrada para o teste e o protocolo
                    if(!is_null($maximumVo2)){
                        $save = $this->maximumVo2->where('test_id', '=', $test->id)
                            ->where('protocol_id', '=', $value['id'])
                            ->update([
                                'result' => $value['result'],
                            ]);
                        if(!$save){
                            return false;
                        }
                    }else{
                        //Se não existir, crio um novo teste de frequencia cardiaca maxima
                        $this->maximumVo2->test_id = $test->id;
                        $this->maximumVo2->result = $value['result'];
                        $this->maximumVo2->protocol_id = $value['id'];
                        if (!$this->maximumVo2->save()) {
                            return false;
                        }
                        $this->maximumVo2 = new MaximumVo2;
                    }
                }
                return true;
            }else{
                foreach($data as $key => $value) {
                    $this->maximumVo2->test_id = $test->id;
                    $this->maximumVo2->result = $value['result'];
                    $this->maximumVo2->protocol_id = $value['id'];
                    if (!$this->maximumVo2->save()) {
                        return false;
                    }
                    $this->maximumVo2 = new MaximumVo2;
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
    public function destroyMaximumVo2($test_id, $protocol_id){
        $test = $this->findOrThrowException($test_id);
        $protocol = $this->protocol->find($protocol_id);
        $maximumVo2 = $this->maximumVo2
            ->where('test_id', '=', $test->id)
            ->where('protocol_id', '=', $protocol->id)
            ->get()
            ->first();
        if (!is_null($maximumVo2)) {
            if($maximumVo2->delete()){
                return true;
            }
        }
        return false;
    }


    public function saveTrainingVo2($id, $request){

        //Todos os dados da requisição
        $data = $request->all();

        //Removendo o token do array
        unset($data['_token']);

        //Buscando o teste
        $test = $this->findOrThrowException($id);

        //Se já existir um teste de frequencia cardiaca mínima, tentará atualizar os já existentes
        //Se não, irá criar todos os testes feito
        if(count($test->trainingVo2) > 0){

            //Loop em todos os dados informados no formulário
            foreach($data as $key => $value){

                //Busco o teste de frequencia cardíaca mínima
                $trainingVo2 = $this->trainingVo2->where('protocol_id', '=', $value['id'])
                    ->where('test_id', '=', $test->id)
                    ->get()
                    ->first();

                //Se já existir um teste de frequencia cardiaca mínima cadastrada para o teste e o protocolo
                //Se não existir, crio um novo teste de frequencia cardiaca mínima
                if(!is_null($trainingVo2)){
                    //Tento atualizar o registro já existente
                    $save = $trainingVo2->update([
                        'result' => $value['result'],
                    ]);
                    //Se não atualizar retorno falso
                    if(!$save){
                        return false;
                    }
                }else{
                    $this->trainingVo2->test_id = $test->id;
                    $this->trainingVo2->result = $value['result'];
                    $this->trainingVo2->protocol_id = $value['id'];
                    //Se não salvar, retorno falso
                    if (!$this->trainingVo2->save()) {
                        return false;
                    }
                    $this->trainingVo2 = new TrainingVo2;
                }
            }
            //Se todos os dados foram salvos e atualizados, retorno true
            return true;
        }else{

            //Loop em todos os dados informados no formulário
            foreach($data as $key => $value) {

                $this->trainingVo2->test_id = $test->id;
                $this->trainingVo2->result = $value['result'];
                $this->trainingVo2->protocol_id = $value['id'];

                //Se não salvar, retorno falso
                if (!$this->trainingVo2->save()) {
                    return false;
                }

                $this->trainingVo2 = new TrainingVo2;

            }
            //Se todos os dados foram salvos e atualizados, retorno true
            return true;
        }
    }

    /**
     * @param $test_id
     * @param $protocol_id
     * @return bool
     * @throws GeneralException
     */
    public function destroyTrainingVo2($test_id, $protocol_id){
        $test = $this->findOrThrowException($test_id);
        $protocol = $this->protocol->find($protocol_id);
        $trainingVo2= $this->trainingVo2
            ->where('test_id', '=', $test->id)
            ->where('protocol_id', '=', $protocol->id)
            ->get()
            ->first();
        if (!is_null($trainingVo2)) {
            if($trainingVo2->delete()){
                return true;
            }
        }
        return false;
    }



}