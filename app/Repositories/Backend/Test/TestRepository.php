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
use App\AdditionalData;
use App\Resistance;
use App\TargetZone;
use App\Flexitest;
use App\WellsBank;

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
        $this->resistance = new Resistance;
        $this->targetZone = new TargetZone;
        $this->user = new User;
        $this->additionalData = new AdditionalData;
        $this->flexitest = new Flexitest;
        $this->wellsBank = new WellsBank;
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
        $this->test->validity =  isset($data['validity']) ? format_without_mask($data['validity'], '/') : NULL;
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
    public function getAdditionalData($id){
        return $this->additionalData
            ->where('user_id', '=', $id)
            ->where('is_active', '=', 1)
            ->orderBy('name', 'asc')
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getMaximumHeartRate($id){
        return $this->findOrThrowException($id)->maximumHeartRate; //$this->maximumHeartRate->where('test_id', '=', $id)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getMinimumHeartRate($id){
        return $this->findOrThrowException($id)->minimumHeartRate;//$this->minimumHeartRate->where('test_id', '=', $id)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getReserveHeartRate($id){
        return $this->findOrThrowException($id)->reserveHeartRate; //$this->reserveHeartRate->where('test_id', '=', $id)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getMaximumVo2($id){
        return $this->findOrThrowException($id)->maximumVo2; //$this->maximumVo2->where('test_id', '=', $id)->get();
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function getTrainingVo2($id){
        return $this->findOrThrowException($id)->trainingVo2; //$this->trainingVo2->where('test_id', '=', $id)->get();
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function getResistances($id){
        return $this->findOrThrowException($id)->resistances; //$this->trainingVo2->where('test_id', '=', $id)->get();
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function getTargetZone($id){
        return $this->findOrThrowException($id)->targetZone; //$this->trainingVo2->where('test_id', '=', $id)->get();
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function getFlexibilities($id){
        return $this->findOrThrowException($id)->flexibilities;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getadditionalDataMinimumHeartRate($id){
        return AdditionalData::whereHas('typeTest', function($query) use($id) {
            $query->where('type_test_id', '=', $id);
        })->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getadditionalDataReserveHeartRate($id){
        return AdditionalData::whereHas('typeTest', function($query) use($id) {
            $query->where('type_test_id', '=', $id);
        })->get();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProtocolsMaximumVo2($id){
        return Protocol::whereHas('typeTest', function($query) use($id) {
            $query->where('type_test_id', '=', $id);
        })->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProtocolsMaximumHeartRate($id){
        return Protocol::whereHas('typeTest', function($query) use($id) {
            $query->where('type_test_id', '=', $id);
        })->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProtocolsMinimumHeartRate($id){
        return Protocol::whereHas('typeTest', function($query) use($id) {
            $query->where('type_test_id', '=', $id);
        })->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProtocolsReserveHeartRate($id){
        return Protocol::whereHas('typeTest', function($query) use($id) {
            $query->where('type_test_id', '=', $id);
        })->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProtocolsTrainingVo2($id){
        return Protocol::whereHas('typeTest', function($query) use($id) {
            $query->where('type_test_id', '=', $id);
        })->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProtocol($id){
        return Protocol::whereHas('typeTest', function($query) use($id) {
            $query->where('type_test_id', '=', $id);
        })->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProtocolsOfTest($id){
        return $this->maximumHeartRate->where('test_id', '=', $id)->get();
    }


    public function resistances($test_id, $type_resistance){
        $resistances = Resistance::where('test_id', '=', $test_id)
            ->where('type_resistance', '=', $type_resistance)
            ->orderBy('sequency', 'asc')
            ->max('id');

        if(count($resistances) > 0){
            return count($resistances) + 1;
        }
    }

    /**
     * @param int $test_id
     * @param int $id
     * @return boolean
     */
    public function findProtocolWithResult($test_id, $id){
        $protocol = $this->protocol->find($id);
        $test = $this->findOrThrowException($test_id);
        if(!is_null($protocol)){
            //Procurando na tabela de usuários
            //$attributes = preg_split('/<|>|[0-9|\-|\/|\*|\(|\)|\,|\+]/i',$protocol->formula, -1);
            //dd($attributes, $protocol->formula);
            $collums = $this->additionalData
                ->where('user_id', '=', $test->user->id)
                ->where('is_active', '=', 1)->get();
            $formula = $protocol->formula;
            $regex = '[0-9]';
            //$attributes = array_filter($attributes);
            //foreach($attributes as $attribute){
            foreach($collums as $collum){
                if(strpos($protocol->formula, $collum->initials) !== FALSE && ($collum->value != NULL)){
                    $formula = str_replace($collum->initials, $collum->value, $formula);
                }
            }
            //}
            try{
                $formula = string_replace(['<', '>'], '', $formula);
                if($result = $this->calculate_string($formula) != NULL){
                    $protocol->result = number_format($result, 2, '.', '');
                }

            }catch(\Exception $e){

                dd($formula);
            }
            return $protocol;
        }
        return false;
    }

    private function calculate_string($mathString){
        $mathString = trim($mathString);     // trim white spaces
        $mathString = preg_replace('[^0-9\+-\*\/\(\) ]', '', $mathString);

        if(preg_match('~[a-zA-Z]~', $mathString)){
            return NULL;
        }
        $compute = create_function("", "return (" . $mathString . ");" );
        return 0 + $compute();
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
        throw new GeneralException("There was a problem deleting this test. Please try again.");
    }

    public function saveMaximumHeartRate($id, $request){
        $data = $request->all();
        //Se existir algum dado para ser tratado
        if(count($data) > 1){
            unset($data['_token']);
            unset($data['protocol']);
            $test = $this->findOrThrowException($id);
            //Se já existe algum teste de frequência cardíaca máxima
            if(count($test->maximumHeartRate) > 0){
                //Percorrendo os dados
                foreach($data as $key => $value){
                    $maximumHeartRate = $this->maximumHeartRate->where('protocol_id', '=', $value['id'])
                            ->where('test_id', '=', $test->id)
                            ->get()
                            ->first();
                    //Se já existir uma frequencia cardiaca cadastrada para o teste e o protocolo, faço atualização
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
        unset($data['protocol']);

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
            unset($data['protocol']);
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
            unset($data['protocol']);
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
        unset($data['protocol']);

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

    /**
     * @param $user_id
     * @param $request
     * @return bool
     * @throws GeneralException
     */
    public function saveAdditionalData($user_id, $request){
        $data = $request->all();

        if(isset($data['_token'])){
            unset($data['_token']);
        }
        if(count($data) > 0){
            foreach($data as $key => $value){
                //id do dado adicional
                $id = explode('_', $key)[3];
                AdditionalData::where('user_id', '=', $user_id)
                    ->where('id', '=', $id)
                    ->update([
                        'value' => !is_null($value) ? str_replace(',', '', $value) : $value
                    ]);
            }
            return true;
        }
        return false;
    }

    /**
     * @param $test_id
     * @param $type_resistance
     * @param $request
     * @return bool
     * @throws GeneralException
     */
    public function saveResistance($test_id, $type_resistance, $request){
        //Todos os dados da requisição
        $data = $request->all();
        $test = $this->findOrThrowException($test_id);
        $supine = $this->resistance->where('test_id', '=', $test->id)
            ->where('type_resistance', '=', $type_resistance)
            ->get()
            ->first();

        if(!is_null($supine)){
            $supine->load_estimed = $data['load_estimed'];
            $supine->option_1 = $data['option_1'];
            $supine->option_2 = $data['option_2'];
            $supine->option_3 = $data['option_3'];
            $supine->option_4 = $data['option_4'];
            $supine->maximum_repeat = $data['maximum_repeat'];
            if($supine->save()){
                return true;
            }
        }

        $this->resistance->test_id = $test->id;
        $this->resistance->type_resistance = $type_resistance;
        $this->resistance->load_estimed = $data['load_estimed'];
        $this->resistance->option_1 = $data['option_1'];
        $this->resistance->option_2 = $data['option_2'];
        $this->resistance->option_3 = $data['option_3'];
        $this->resistance->option_4 = $data['option_4'];
        $this->resistance->maximum_repeat = $data['maximum_repeat'];
        if($this->resistance->save()){
            return true;
        }
        return false;
    }

    /**
     * @param $test_id
     * @param $protocol_id
     * @return bool
     * @throws GeneralException
     */
    public function destroyResistance($test_id, $protocol_id){
        $test = $this->findOrThrowException($test_id);
        $protocol = $this->protocol->find($protocol_id);
        $resistance = $this->resistance
            ->where('test_id', '=', $test->id)
            ->where('protocol_id', '=', $protocol->id)
            ->get()
            ->first();
        if (!is_null($resistance)) {
            if($resistance->delete()){
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
    public function saveTargetZone($id, $request){

        //Todos os dados da requisição
        $data = $request->all();

        //Removendo o token do array
        unset($data['_token']);
        unset($data['protocol']);

        //Buscando o teste
        $test = $this->findOrThrowException($id);

        //Se já existir um teste de frequencia cardiaca mínima, tentará atualizar os já existentes
        //Se não, irá criar todos os testes feito
        if(count($test->targetZone) > 0){

            //Loop em todos os dados informados no formulário
            foreach($data as $key => $value){

                //Busco o teste de frequencia cardíaca mínima
                $targetZone = TargetZone::where('protocol_id', '=', $value['id'])
                    ->where('test_id', '=', $test->id)
                    ->get()
                    ->first();

                //Se já existir um teste de frequencia cardiaca mínima cadastrada para o teste e o protocolo
                //Se não existir, crio um novo teste de frequencia cardiaca mínima
                if(!is_null($targetZone)){
                    //Tento atualizar o registro já existente
                    $save = $targetZone->update([
                        'result' => $value['result'],
                    ]);
                    //Se não atualizar retorno falso
                    if(!$save){
                        return false;
                    }
                }else{
                    $this->targetZone->test_id = $test->id;
                    $this->targetZone->result = $value['result'];
                    $this->targetZone->protocol_id = $value['id'];
                    //Se não salvar, retorno falso
                    if (!$this->targetZone->save()) {
                        return false;
                    }
                    $this->targetZone = new TargetZone;
                }
            }
            //Se todos os dados foram salvos e atualizados, retorno true
            return true;
        }else{

            //Loop em todos os dados informados no formulário
            foreach($data as $key => $value) {

                $this->targetZone->test_id = $test->id;
                $this->targetZone->result = $value['result'];
                $this->targetZone->protocol_id = $value['id'];

                //Se não salvar, retorno falso
                if (!$this->targetZone->save()) {
                    return false;
                }

                $this->targetZone = new TargetZone;
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
    public function destroyTargetZone($test_id, $protocol_id){
        $test = $this->findOrThrowException($test_id);
        $protocol = $this->protocol->find($protocol_id);
        $targetZone = $this->targetZone
            ->where('test_id', '=', $test->id)
            ->where('protocol_id', '=', $protocol->id)
            ->get()
            ->first();
        if (!is_null($targetZone)) {
            if($targetZone->delete()){
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
    public function saveFlexitests($id, $request)
    {
        //Todos os dados da requisição
        $data = $request->all();
        $test = $this->findOrThrowException($id);

        if(is_null($test->flexitest)) {
            $this->flexitest->test_id = $id;
            $this->flexitest->abduction_shoulders = isset($data['abduction_shoulders']) ? $data['abduction_shoulders'] : NULL;
            $this->flexitest->lateral_trunk_flexion = isset($data['lateral_trunk_flexion']) ? $data['lateral_trunk_flexion'] : NULL;
            $this->flexitest->leg_hyperextension = isset($data['leg_hyperextension']) ? $data['leg_hyperextension'] : NULL;
            $this->flexitest->elbow_flexion = isset($data['elbow_flexion']) ? $data['elbow_flexion'] : NULL;
            $this->flexitest->elbow_hyperextension = isset($data['elbow_hyperextension']) ? $data['elbow_hyperextension'] : NULL;
            $this->flexitest->fist_flexion = isset($data['fist_flexion']) ? $data['fist_flexion'] : NULL;
            $this->flexitest->fist_extension = isset($data['fist_extension']) ? $data['fist_extension'] : NULL;
            $this->flexitest->horizontal_shoulder_abduction = isset($data['horizontal_shoulder_abduction']) ? $data['horizontal_shoulder_abduction'] : NULL;
            $this->flexitest->hip_flexion = isset($data['hip_flexion']) ? $data['hip_flexion'] : NULL;
            $this->flexitest->trunk_hyperextension = isset($data['trunk_hyperextension']) ? $data['trunk_hyperextension'] : NULL;
            $this->flexitest->haunch_flexion = isset($data['haunch_flexion']) ? $data['haunch_flexion'] : NULL;
            $this->flexitest->haunch_extension = isset($data['haunch_extension']) ? $data['haunch_extension'] : NULL;
            $this->flexitest->leg_flexion = isset($data['leg_flexion']) ? $data['leg_flexion'] : NULL;
            $this->flexitest->plantar_dorsiflexion = isset($data['plantar_dorsiflexion']) ? $data['plantar_dorsiflexion'] : NULL;
            $this->flexitest->plantar_flexion = isset($data['plantar_flexion']) ? $data['plantar_flexion'] : NULL;
            if($this->flexitest->save()){
                return true;
            }
        }

        $test->flexitest->abduction_shoulders = isset($data['abduction_shoulders']) ? $data['abduction_shoulders'] : NULL;
        $test->flexitest->lateral_trunk_flexion = isset($data['lateral_trunk_flexion']) ? $data['lateral_trunk_flexion'] : NULL;
        $test->flexitest->leg_hyperextension = isset($data['leg_hyperextension']) ? $data['leg_hyperextension'] : NULL;
        $test->flexitest->elbow_flexion = isset($data['elbow_flexion']) ? $data['elbow_flexion'] : NULL;
        $test->flexitest->elbow_hyperextension = isset($data['elbow_hyperextension']) ? $data['elbow_hyperextension'] : NULL;
        $test->flexitest->fist_flexion = isset($data['fist_flexion']) ? $data['fist_flexion'] : NULL;
        $test->flexitest->fist_extension = isset($data['fist_extension']) ? $data['fist_extension'] : NULL;
        $test->flexitest->horizontal_shoulder_abduction = isset($data['horizontal_shoulder_abduction']) ? $data['horizontal_shoulder_abduction'] : NULL;
        $test->flexitest->hip_flexion = isset($data['hip_flexion']) ? $data['hip_flexion'] : NULL;
        $test->flexitest->trunk_hyperextension = isset($data['trunk_hyperextension']) ? $data['trunk_hyperextension'] : NULL;
        $test->flexitest->haunch_flexion = isset($data['haunch_flexion']) ? $data['haunch_flexion'] : NULL;
        $test->flexitest->haunch_extension = isset($data['haunch_extension']) ? $data['haunch_extension'] : NULL;
        $test->flexitest->leg_flexion = isset($data['leg_flexion']) ? $data['leg_flexion'] : NULL;
        $test->flexitest->plantar_dorsiflexion = isset($data['plantar_dorsiflexion']) ? $data['plantar_dorsiflexion'] : NULL;
        $test->flexitest->plantar_flexion = isset($data['plantar_flexion']) ? $data['plantar_flexion'] : NULL;

        if($test->flexitest->save()){
            return true;
        }

        return false;

    }

    /**
     * @param $id
     * @param $request
     * @return bool
     * @throws GeneralException
     */
    public function saveWellsBank($id, $request){
        //Todos os dados da requisição
        $data = $request->all();
        $test = $this->findOrThrowException($id);

        if(is_null($test->wellsBank)) {
            $this->wellsBank->test_id = $id;
            $this->wellsBank->right_leg = isset($data['right_leg']) ? $data['right_leg'] : NULL;
            $this->wellsBank->left_leg = isset($data['left_leg']) ? $data['left_leg'] : NULL;
            $this->wellsBank->trunk = isset($data['trunk']) ? $data['trunk'] : NULL;
            if($this->wellsBank->save()){
                return true;
            }
        }

        $test->wellsBank->right_leg = isset($data['right_leg']) ? $data['right_leg'] : NULL;
        $test->wellsBank->left_leg = isset($data['left_leg']) ? $data['left_leg'] : NULL;
        $test->wellsBank->trunk = isset($data['trunk']) ? $data['trunk'] : NULL;

        if($test->wellsBank->save()){
           return true;
        }

        return false;
    }

}