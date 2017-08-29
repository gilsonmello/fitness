<?php namespace App\Repositories\Backend\User;

use App\Question;
use App\Exceptions\GeneralException;
use App\User;
use App\AnthropometryPerimetersCircumferences;
use App\AnthropometryWeightHeight;
use App\Bioempedancia;
use App\Evaluation;
/**
 * Class QuestionRepository
 * @package App\Repositories\Backend\Question
 */
class UserRepository{

    protected $user;

    protected $anthropometryPerimetersCircumferences;

    protected $antropometria;

    protected $bioempedancia;

    protected $evaluation;

    public function __construct()
    {
        $this->user = new User;
        $this->anthropometryPerimetersCircumferences = new AnthropometryPerimetersCircumferences;
        $this->antropometria = new AnthropometryWeightHeight;
        $this->bioempedancia = new Bioempedancia;
        $this->evaluation = new Evaluation;
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

    /**
     * @param $id
     * @param $request
     * @return bool
     */
    public function updateWeightAndHeight($id, $request){
        $data = $request->all();
        $evaluation = $this->evaluation->find($id);
        $save = $this->anthropometryPerimetersCircumferences->where('evaluation_id', '=', $evaluation->id)
            ->update([
                'weight' => isset($data['weight']) && !empty($data['weight']) ? $data['weight'] : NULL,
                'height' => isset($data['height']) && !empty($data['height']) ? $data['height'] : NULL,
            ]);
        if($save){
            return true;
        }
        return false;
    }

    /**
     * @param $id
     * @param $request
     * @return bool
     */
    public function updateAntropometria($id, $request){
        $data = $request->all();
        $evaluation = $this->evaluation->find($id);
        $save = $this->antropometria->where('evaluation_id', '=', $evaluation->id)
            ->update([
                'right_arm' => isset($data['right_arm']) && !empty($data['right_arm']) ? $data['right_arm'] : NULL,
                'left_arm' => isset($data['left_arm']) && !empty($data['left_arm']) ? $data['left_arm'] : NULL,
                'tummy' => isset($data['tummy']) && !empty($data['tummy']) ? $data['tummy'] : NULL,
                'hip' => isset($data['hip']) && !empty($data['hip']) ? $data['hip'] : NULL,
                'coxa_proximal' => isset($data['coxa_proximal']) && !empty($data['coxa_proximal']) ? $data['coxa_proximal'] : NULL,
                'coxa_medial' => isset($data['coxa_medial']) && !empty($data['coxa_medial']) ? $data['coxa_medial'] : NULL,
                'coxa_distal' => isset($data['coxa_distal']) && !empty($data['coxa_distal']) ? $data['coxa_distal'] : NULL,
                'right_leg' => isset($data['right_leg']) && !empty($data['right_leg']) ? $data['right_leg'] : NULL,
                'left_leg' => isset($data['left_leg']) && !empty($data['left_leg']) ? $data['left_leg'] : NULL,
                'forearm' => isset($data['forearm']) && !empty($data['forearm']) ? $data['forearm'] : NULL,
                'chest' => isset($data['chest']) && !empty($data['chest']) ? $data['forearm'] : NULL,
                'waist' => isset($data['waist']) && !empty($data['waist']) ? $data['waist'] : NULL,
            ]);
        if($save){
            return true;
        }
        return false;
    }
    public function updateBioempedancia($id, $request){
        $data = $request->all();
        $evaluation = $this->evaluation->find($id);
        $save = $this->bioempedancia->where('evaluation_id', '=', $evaluation->id)
            ->update([
                'fat' => isset($data['fat']) && !empty($data['fat']) ? $data['fat'] : NULL,
                'muscle_mass' => isset($data['muscle_mass']) && !empty($data['muscle_mass']) ? $data['muscle_mass'] : NULL,
                'body_water' => isset($data['body_water']) && !empty($data['body_water']) ? $data['body_water'] : NULL,
                'osseous_weight' => isset($data['osseous_weight']) && !empty($data['osseous_weight']) ? $data['osseous_weight'] : NULL,
                'imc' => isset($data['imc']) && !empty($data['imc']) ? $data['imc'] : NULL,
            ]);
        if($save){
            return true;
        }
        return false;
    }
}