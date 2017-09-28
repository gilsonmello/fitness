<?php namespace App\Repositories\Backend\User;

use App\Exceptions\GeneralException;
use App\Model\Backend\User;

/**
 * Class UserRepository
 * @package App\Repositories\Backend\User
 */
class UserRepository{

    /**
     * @var $user
     */
    protected $user;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->user = new User;
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id) {
        $user = $this->user->find($id);
        if(!is_null($user)){
            return $user;
        }
        throw new GeneralException('That user does not exist.');
    }

    /**
     * @param $request
     * @return bool
     */
    public function create($request){
        $data = $request->all();

        $this->user->title = trim($data['title']);
        $this->user->note = trim($data['note']);
        $this->user->is_active = isset($data['is_active']) ? 1 : 0;

        if($this->user->save()){
            if(isset($data['group_question']) && count($data['group_question']) > 0 ){
                $this->user->questionGroup()->attach($data['group_question']);
            }
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function all(){
        return $this->user
            ->all();
    }

    /**
     * @param $per_page
     * @param string $name
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page = NULL, $name = '', $order_by = 'id', $sort = 'asc') {
        if(!is_null($per_page)){
            return $this->user
                ->where('name', 'like', '%'.$name.'%')
                ->orderBy($order_by, $sort)
                ->paginate($per_page);
        }
        return $this->user
            ->where('name', 'like', '%'.$name.'%')
            ->where('is_active', '=', 1)
            ->orderBy($order_by, $sort)->get();
    }

    /**
     * @param $id
     * @param $request
     * @return boolean
     */
    public function update($id, $request){
        $data = $request->all();
        $question = $this->findOrThrowException($id);
        $question->title = $data['title'];
        $question->note = isset($data['note']) && !empty($data['note']) ? $data['note'] : NULL;
        $question->is_active = isset($data['is_active']) ? 1 : 0;
        if($question->save()){
            if(isset($data['group_question']) && count($data['group_question']) > 0 ){
                $question->questionGroup()->sync($data['group_question']);
            }
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
            $question->questionGroup()->detach();
            return true;
        }
        throw new GeneralException("There was a problem deleting this question. Please try again.");
    }
}