<?php
namespace App\Repositories\Backend\Parq;

use App\Model\Backend\Parq;
use App\Exceptions\GeneralException;
use App\ParqAnswer;

/**
 * Class QuestionRepository
 * @package App\Repositories\Backend\Question
 */
class ParqRepository{

    /**
     * @var parq
     */
    protected $parq;

    /**
     * @var parqAnswer
     */
    protected $parqAnswer;

    /**
     * parqRepository constructor.
     * @param parq $parq
     * @param parqAnswer $parqAnswer
     */
    public function __construct(Parq $parq)
    {
        $this->parq = $parq;
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id) {
        $parq = $this->parq->find($id);
        if(!is_null($parq)){
            return $parq;
        }
        throw new GeneralException("That PAR'q does not exist.");
    }

    /**
     * @param $request
     * @return bool
     */
    public function create($request){
        $data = $request->all();
        $this->parq->user_id = $data['user_id'];
        $this->parq->question_group_id = $data['question_group_id'];
        if($this->parq->save()){
            return true;
        }
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all(){
        return Parq::all()->where('is_active', '=', 1);
    }

    /**
     * @param $per_page
     * @param string $title
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getParqPaginated($per_page = NULL, $title = '', $order_by = 'id', $sort = 'asc') {

        if(!is_null($per_page)){
            return $this->parq->orderBy($order_by, $sort)->paginate($per_page);
        }
        return $this->parq
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
        $parq = $this->findOrThrowException($id);
        $parq->user_id = $data['user_id'];
        $parq->question_group_id = $data['question_group_id'];
        if($parq->save()){
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
        $parq = $this->findOrThrowException($id);
        if ($parq->delete()) {
            return true;
        }
        throw new GeneralException("There was a problem deleting this parq. Please try again.");
    }

    /**
     * Função para cadastrar respostas do parq
     * @param int $id
     * @param int $request
     * @return boolean
     */
    public function createParqAnswers($id, $request){
        $data = $request->all();
        $parq = $this->findOrThrowException($id);
        $saved = false;
        foreach($data as $key => $value){
            if(strpos($key, "question") !== FALSE){
                $question_id = explode('_', $key)[count(explode('_', $key)) - 1];
                $this->parqAnswer->parq_id = $parq->id;
                $this->parqAnswer->user_id = $parq->user->id;
                $this->parqAnswer->question_group_id = $parq->questionGroup->id;
                $this->parqAnswer->question_id = $question_id;
                $this->parqAnswer->answer = $value['answer_'.$question_id];
                $this->parqAnswer->option_answer = $value['option_answer_'.$question_id] ;
                if($this->parqAnswer->save()){
                    $saved = true;
                    $this->parqAnswer = new ParqAnswer();
                }
            }
        }
        if($saved){
            return true;
        }
        return false;
    }

    /**
     * Função para cadastrar respostas do parq
     * @param int $id
     * @param int $request
     * @return boolean
     */
    public function updateIpacAnswers($id, $request){
        //Pegando todos os dados da requisição
        $data = $request->all();
        //Fazendo busca do parq
        $parq = $this->findOrThrowException($id);
        //Variável para controlar se foi feito a atualização corretamente
        $saved = true;
        foreach($data as $key => $value){
            if($saved) {
                if (strpos($key, "question") !== FALSE) {
                    //Pegando o id da questão
                    $question_id = explode('_', $key)[count(explode('_', $key)) - 1];
                    //Fazendo busca da resposta
                    $answer = parqAnswer::where('question_id', '=', $question_id)
                        ->where('parq_id', '=', $parq->id)
                        ->first();
                    $answer->parq_id = $parq->id;
                    $answer->user_id = $parq->user->id;
                    $answer->question_group_id = $parq->questionGroup->id;
                    $answer->question_id = $question_id;
                    $answer->answer = $value['answer_' . $question_id];
                    $answer->option_answer = $value['option_answer_' . $question_id];
                    //Verifica se salvou os dados corretamente, se sim, continua no loop, se não para o loop
                    if ($answer->save()) {
                        $saved = true;
                    }else{
                        $saved = false;
                        break;
                    }
                }
            }
        }
        //Se todos os dados foram salvos corretamente, retorno true, se não, retorno false
        if($saved){
            return $saved;
        }
        return $saved;
    }

}