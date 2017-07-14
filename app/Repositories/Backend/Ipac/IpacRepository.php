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

    protected $ipac;
    protected $ipacAnswer;

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
        $ipac = $this->ipac->withTrashed()->find($id);
        if(!is_null($ipac)){
            return $ipac;
        }
        throw new GeneralException('That question does not exist.');
    }

    public function create($request){
        $data = $request->all();
        $this->ipac->user_id = $data['user_id'];
        $this->ipac->question_group_id = $data['question_group_id'];
        if($this->ipac->save()){
            return true;
        }
        return false;
    }

    public function all(){
        return $this->ipac->all();
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
        return $this->ipac->orderBy($order_by, $sort)->get();
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
    public function createIpacAnswer($id, $request){
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

}