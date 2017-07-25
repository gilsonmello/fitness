<?php namespace App\Repositories\Backend\Evaluation;

use App\Question;
use App\Exceptions\GeneralException;
use App\Evaluation;
use App\Parq;
use App\PregasCutanea;
use App\AnalisePosturalAnterior;

/**
 * Class QuestionRepository
 * @package App\Repositories\Backend\Evaluation
 */
class EvaluationRepository{

    protected $question;

    protected $evaluation;

    protected $par;

    protected $pregasCutanea;

    protected $analisePosturalAnterior;

    public function __construct(PregasCutanea $pregasCutanea, Parq $par, Question $question, Evaluation $evaluation, AnalisePosturalAnterior $analisePosturalAnterior)
    {
        $this->question = $question;
        $this->evaluation = $evaluation;
        $this->parq = $par;
        $this->pregasCutanea = $pregasCutanea;
        $this->analisePosturalAnterior = $analisePosturalAnterior;
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id) {
        $evaluation = $this->evaluation->find($id);
        if(!is_null($evaluation)){
            return $evaluation;
        }
        throw new GeneralException('That evaluation does not exist.');
    }

    public function create($request){
        $data = $request->all();
        $this->evaluation->user_id = trim($data['user_id']);
        $this->evaluation->is_active = isset($data['is_active']) ? 1 : 0;
        if($this->evaluation->save()){
            return true;
        }
        return false;
    }

    public function all(){
        return $this->evaluation->all()->where('is_active', '=', 1);
    }

    /**
     * @param $per_page
     * @param string $title
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page = NULL, $title = '', $order_by = 'id', $sort = 'asc') {
        if(!is_null($per_page)){
            return $this->evaluation->where('title', 'like', '%'.$title.'%')->orderBy($order_by, $sort)->paginate($per_page);
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
        $evaluation = $this->findOrThrowException($id);
        if ($evaluation->delete()) {
            return true;
        }
        throw new GeneralException("There was a problem deleting this evaluation. Please try again.");
    }

    public function updateParq($id, $request){

        $data = $request->all();

        $evaluation = $this->evaluation->find($id);

        if(!is_null($evaluation->parq)) {
            $this->parq->where('evaluation_id', '=', $evaluation->id)
                ->update([
                    'question_1' => $data['question_1'],
                    'option_answer_1' => $data['option_answer_1'],
                    'question_2' => $data['question_2'],
                    'option_answer_2' => $data['option_answer_2'],
                    'question_3' => $data['question_3'],
                    'option_answer_3' => $data['option_answer_3'],
                    'question_4' => $data['question_4'],
                    'option_answer_4' => $data['option_answer_4'],
                    'question_5' => $data['question_5'],
                    'option_answer_5' => $data['option_answer_5'],
                    'question_6' => $data['question_6'],
                    'option_answer_6' => $data['option_answer_6'],
                    'question_7' => $data['question_7'],
                    'option_answer_7' => $data['option_answer_7'],
                    'terms', $data['terms'],
                    'user_id' => $evaluation->user->id,
                    'question_group_id' => 1
                ]);
            return true;
        }

        $this->parq->evaluation_id = $evaluation->id;

        $this->parq->question_1 = $data['question_1'];
        $this->parq->option_answer_1 = $data['option_answer_1'];

        $this->parq->question_2 = $data['question_2'];
        $this->parq->option_answer_2 = $data['option_answer_2'];

        $this->parq->question_3 = $data['question_3'];
        $this->parq->option_answer_3 = $data['option_answer_3'];

        $this->parq->question_4 = $data['question_4'];
        $this->parq->option_answer_4 = $data['option_answer_4'];

        $this->parq->question_5 = $data['question_5'];
        $this->parq->option_answer_5 = $data['option_answer_5'];

        $this->parq->question_6 = $data['question_6'];
        $this->parq->option_answer_6 = $data['option_answer_6'];

        $this->parq->question_7 = $data['question_7'];
        $this->parq->option_answer_7 = $data['option_answer_7'];

        $this->parq->terms = $data['terms'];

        $this->parq->user_id = $evaluation->user->id;
        $this->parq->question_group_id = 1;

        if($this->parq->save()){
            return true;
        }

        return false;
    }

    public function updatePregrasCutaneas($id, $request)
    {
        $data = $request->all();
        $evaluation = $this->evaluation->find($id);
        if(!is_null($evaluation->pregrasCutanea)) {
            $this->pregasCutanea->where('evaluation_id', '=', $evaluation->id)
                ->update([
                    'biceps' => $data['biceps'],
                    'triceps' => $data['triceps'],
                    'subescapular' => $data['subescapular'],
                    'peitoral' => $data['peitoral'],
                    'supra_ilíaca' => $data['supra_ilíaca'],
                    'coxa' => $data['coxa'],
                    'abdominal' => $data['abdominal'],
                    'panturrilha' => $data['panturrilha'],
                    'axilar_media' => $data['axilar_media'],
                ]);
            return true;
        }
        $this->pregasCutanea->evaluation_id = $evaluation->id;
        $this->pregasCutanea->biceps = $data['biceps'];
        $this->pregasCutanea->triceps = $data['triceps'];
        $this->pregasCutanea->subescapular = $data['subescapular'];
        $this->pregasCutanea->peitoral = $data['peitoral'];
        $this->pregasCutanea->supra_ilíaca = $data['supra_ilíaca'];
        $this->pregasCutanea->coxa = $data['coxa'];
        $this->pregasCutanea->abdominal = $data['abdominal'];
        $this->pregasCutanea->panturrilha = $data['panturrilha'];
        $this->pregasCutanea->axilar_media = $data['axilar_media'];
        if($this->pregasCutanea->save()){
            return true;
        }
        return false;
    }

    public function updateImgAnalisePosturalAnterior($id, $request, $result){
        $data = $request->all();
        $evaluation = $this->evaluation->find($id);
        if(!is_null($evaluation->analisePosturalAnterior)){
            $this->analisePosturalAnterior->where('evaluation_id', $evaluation->id)
                ->update([
                    'img' => $result
                ]);
        }
        $imgs = '';
        foreach($result['dimensions'] as $key => $value){
            $imgs .= $value['filename'].';';
        }
        $this->analisePosturalAnterior->evaluation_id = $evaluation->id;
        $this->analisePosturalAnterior->img = !empty($imgs) ? $imgs : NULL;
        if($this->analisePosturalAnterior->save()){
            return true;
        }
        return false;
    }


}