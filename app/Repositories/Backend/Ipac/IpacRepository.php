<?php
namespace App\Repositories\Backend\Ipac;

use App\Ipac;
use App\Exceptions\GeneralException;

/**
 * Class QuestionRepository
 * @package App\Repositories\Backend\Question
 */
class IpacRepository{

    protected $ipac;

    public function __construct(Ipac $ipac)
    {
        $this->ipac = $ipac;
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

}