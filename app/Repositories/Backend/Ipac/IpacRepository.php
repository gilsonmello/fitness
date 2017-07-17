<?php
namespace App\Repositories\Backend\Ipac;

use App\Ipac;
use App\Exceptions\GeneralException;
use App\IpacAnswer;

/**
 * Class QuestionRepository
 * @package App\Repositories\Backend\Question
 */
class IpacRepository{

    /**
     * @var Ipac
     */
    protected $ipac;

    /**
     * @var IpacAnswer
     */
    protected $ipacAnswer;

    /**
     * IpacRepository constructor.
     * @param Ipac $ipac
     * @param IpacAnswer $ipacAnswer
     */
    public function __construct(Ipac $ipac, IpacAnswer $ipacAnswer)
    {
        $this->ipac = $ipac;
        $this->ipacAnswer = $ipacAnswer;
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id) {
        $ipac = $this->ipac->find($id);
        if(!is_null($ipac)){
            return $ipac;
        }
        throw new GeneralException('That question does not exist.');
    }

    /**
     * @param $request
     * @return bool
     */
    public function create($request){
        $data = $request->all();
        $this->ipac->user_id = $data['user_id'];
        $this->ipac->question_group_id = $data['question_group_id'];
        if($this->ipac->save()){
            return true;
        }
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all(){
        return Ipac::all()->where('is_active', '=', 1);
    }

    /**
     * @param $per_page
     * @param string $title
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getIpacPaginated($per_page = NULL, $title = '', $order_by = 'id', $sort = 'asc') {

        if(!is_null($per_page)){
            return $this->ipac->orderBy($order_by, $sort)->paginate($per_page);
        }
        return $this->ipac
            ->where('is_active', '=', 1)
            ->orderBy($order_by, $sort)
            ->get();
    }

    /**
     * Função para atualizar IPAC
     * @param $request
     * @return boolean
     */
    public function update($id, $request){
        $data = $request->all();
        $ipac = $this->findOrThrowException($id);
        $ipac->user_id = $data['user_id'];
        $ipac->question_group_id = $data['question_group_id'];
        if($ipac->save()){
            return true;
        }
        return false;
    }
    /**
     * Função para deletar IPAC
     * @param int $id
     * @return boolean
     * @throws GeneralException
     */
    public function destroy($id){
        $question = $this->findOrThrowException($id);
        if ($question->delete()) {
            return true;
        }
        throw new GeneralException("There was a problem deleting this question. Please try again.");
    }

    /**
     * Função para cadastrar respostas do IPAC
     * @param int $id
     * @param int $request
     * @return boolean
     */
    public function createIpacAnswers($id, $request){
        $data = $request->all();
        $ipac = $this->findOrThrowException($id);
        $saved = false;
        foreach($data as $key => $value){
            if(strpos($key, "question") !== FALSE){
                $question_id = explode('_', $key)[count(explode('_', $key)) - 1];
                $this->ipacAnswer->ipac_id = $ipac->id;
                $this->ipacAnswer->user_id = $ipac->user->id;
                $this->ipacAnswer->question_group_id = $ipac->questionGroup->id;
                $this->ipacAnswer->question_id = $question_id;
                $this->ipacAnswer->answer = $value['answer_'.$question_id];
                $this->ipacAnswer->option_answer = $value['option_answer_'.$question_id] ;
                if($this->ipacAnswer->save()){
                    $saved = true;
                    $this->ipacAnswer = new IpacAnswer();
                }
            }
        }
        if($saved){
            return true;
        }
        return false;
    }

    /**
     * Função para cadastrar respostas do IPAC
     * @param int $id
     * @param int $request
     * @return boolean
     */
    public function updateIpacAnswers($id, $request){
        //Pegando todos os dados da requisição
        $data = $request->all();
        //Fazendo busca do IPAC
        $ipac = $this->findOrThrowException($id);
        //Variável para controlar se foi feito a atualização corretamente
        $saved = true;
        foreach($data as $key => $value){
            if($saved) {
                if (strpos($key, "question") !== FALSE) {
                    //Pegando o id da questão
                    $question_id = explode('_', $key)[count(explode('_', $key)) - 1];
                    //Fazendo busca da resposta
                    $answer = IpacAnswer::where('question_id', '=', $question_id)
                        ->where('ipac_id', '=', $ipac->id)
                        ->first();
                    $answer->ipac_id = $ipac->id;
                    $answer->user_id = $ipac->user->id;
                    $answer->question_group_id = $ipac->questionGroup->id;
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