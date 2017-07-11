<?php
namespace App\Repositories\Backend\QuestionGroup;

use App\QuestionGroup;
use App\Exceptions\GeneralException;

/**
 * Class QuestionGroupRepository
 * @package App\Repositories\Backend\Question
 */
class QuestionGroupRepository{

    protected $question_group;

    public function __construct(QuestionGroup $question_group){
        $this->question_group = $question_group;
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id) {
        $questionGroup = $this->question_group->withTrashed()->find($id);

        if (! is_null($questionGroup))
            return $questionGroup;

        throw new GeneralException(trans('alerts.question_group.not_find'));
    }

    /**
     * @param $per_page
     * @param string $title
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getQuestionGroupPaginated($per_page, $title = '', $order_by = 'id', $sort = 'asc') {
        if(!is_null($per_page)){
            return $this->question_group->where('title', 'like', '%'.$title.'%')->orderBy($order_by, $sort)->paginate($per_page);
        }
        return $this->question_group->where('title', 'like', '%'.$title.'%')->orderBy($order_by, $sort)->get();
    }

    /**
     * @param $request
     * @return boolean
     */
    public function create($request){
        $questionGroup = $this->question_group;
        $questionGroup->title = $request['title'];
        $questionGroup->description = isset($request['description']) && !empty($request['description']) ? $request['description'] : NULL;
        $questionGroup->is_active = isset($request['is_active']) ? 1 : 0;
        if($questionGroup->save()){
            return true;
        }
        return false;
    }
}