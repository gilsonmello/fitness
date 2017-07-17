<?php namespace App\Repositories\Backend\User;

use App\Question;
use App\Exceptions\GeneralException;
use App\User;

/**
 * Class QuestionRepository
 * @package App\Repositories\Backend\Question
 */
class UserRepository{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id) {
        $question = $this->question->withTrashed()->find($id);
        if(!is_null($question)){
            return $question;
        }
        throw new GeneralException('That question does not exist.');
    }

    public function create($request){
        $data = $request->all();

        $this->question->title = trim($data['title']);
        $this->question->note = trim($data['note']);
        $this->question->is_active = isset($data['is_active']) ? 1 : 0;

        if($this->question->save()){
            if(isset($data['group_question']) && count($data['group_question']) > 0 ){
                $this->question->questionGroup()->attach($data['group_question']);
            }
            return true;
        }
        return false;
    }

    public function all(){
        return $this->user
            ->all()
            ->where('is_active', '=', 1);
    }

    /**
     * @param $per_page
     * @param string $title
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getQuestionPaginated($per_page = NULL, $title = '', $order_by = 'id', $sort = 'asc') {
        if(!is_null($per_page)){
            return $this->question
                ->where('title', 'like', '%'.$title.'%')
                ->orderBy($order_by, $sort)
                ->paginate($per_page);
        }
        return $this->question
            ->where('title', 'like', '%'.$title.'%')
            ->where('is_active', '=', 1)
            ->orderBy($order_by, $sort)->get();
    }

    /**
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