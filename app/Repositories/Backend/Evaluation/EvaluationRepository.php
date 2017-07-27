<?php namespace App\Repositories\Backend\Evaluation;

use App\Question;
use App\Exceptions\GeneralException;
use App\Evaluation;
use App\Parq;
use App\PregasCutanea;
use App\AnalisePosturalAnterior;
use App\AnalisePosturalLateralEsquerda;
use File;

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

    protected $analisePosturalLateralEsquerda;

    public function __construct(PregasCutanea $pregasCutanea, Parq $par, Question $question, Evaluation $evaluation, AnalisePosturalAnterior $analisePosturalAnterior, AnalisePosturalLateralEsquerda $analisePosturalLateralEsquerda)
    {
        $this->question = $question;
        $this->evaluation = $evaluation;
        $this->parq = $par;
        $this->pregasCutanea = $pregasCutanea;
        $this->analisePosturalAnterior = $analisePosturalAnterior;
        $this->analisePosturalLateralEsquerda = $analisePosturalLateralEsquerda;
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

    public function updateAnalisePosturalAnterior($id, $request){
        $data = $request->all();
        $evaluation = $this->evaluation->find($id);
        if(!is_null($evaluation->analisePosturalAnterior)){

            $tmp_imgs = explode(';', $evaluation->analisePosturalAnterior->tmp_img);

            //Movendo a tmp criada para a pasta correta
            foreach($tmp_imgs as $img){
                if(File::exists(public_path().'/uploads/images/tmp/'.$img)){
                    File::move(public_path().'/uploads/images/tmp/'.$img, public_path().'/uploads/images/analise_postural_anterior/'.$img);
                }
            }

            //Deletando as imagens originais
            $to_delete = explode(';', $evaluation->analisePosturalAnterior->img);
            foreach($to_delete as $img){
                if(File::exists(public_path().'/uploads/images/analise_postural_anterior/'.$img)){
                    File::delete(public_path().'/uploads/images/analise_postural_anterior/'.$img);
                }
            }

            //Salvando nova imagem com o tmp atual
            $this->analisePosturalAnterior->where('evaluation_id', $evaluation->id)
                ->update([
                    'arlcd' => isset($data['arlcd']) && !empty($data['arlcd']) ? $data['arlcd'] : NULL,
                    'arlce' => isset($data['arlce']) && !empty($data['arlce']) ? $data['arlce'] : NULL,
                    'ailcd' => isset($data['ailcd']) && !empty($data['ailcd']) ? $data['ailcd'] : NULL,
                    'ailce' => isset($data['ailce']) && !empty($data['ailce']) ? $data['ailce'] : NULL,
                    'aeod' => isset($data['aeod']) && !empty($data['aeod']) ? $data['aeod'] : NULL,
                    'aeoe' => isset($data['aeoe']) && !empty($data['aeoe']) ? $data['aeoe'] : NULL,
                    'armpd' => isset($data['armpd']) && !empty($data['armpd']) ? $data['armpd'] : NULL,
                    'armpe' => isset($data['armpe']) && !empty($data['armpe']) ? $data['armpe'] : NULL,
                    'admp' => isset($data['admp']) && !empty($data['admp']) ? $data['admp'] : NULL,
                    'adq' => isset($data['adq']) && !empty($data['adq']) ? $data['adq'] : NULL,
                    'aami' => isset($data['aami']) && !empty($data['aami']) ? $data['aami'] : NULL,
                    'ajvaro' => isset($data['ajvaro']) && !empty($data['ajvaro']) ? $data['ajvaro'] : NULL,
                    'ajvalgo' => isset($data['ajvalgo']) && !empty($data['ajvalgo']) ? $data['ajvalgo'] : NULL,
                    'arijde' => isset($data['arijde']) && !empty($data['arijde']) ? $data['arijde'] : NULL,
                    'apede' => isset($data['apede']) && !empty($data['apede']) ? $data['apede'] : NULL,
                    'apide' => isset($data['apide']) && !empty($data['apide']) ? $data['apide'] : NULL,
                    'apabdutode' => isset($data['apabdutode']) && !empty($data['apabdutode']) ? $data['apabdutode'] : NULL,
                    'admi' => isset($data['admi']) && !empty($data['admi']) ? $data['admi'] : NULL,
                    'ape' => isset($data['ape']) && !empty($data['ape']) ? $data['ape'] : NULL,
                    'aas' => isset($data['aas']) && !empty($data['aas']) ? $data['aas'] : NULL,
                    'obs' => isset($data['obs']) && !empty($data['obs']) ? $data['obs'] : NULL,
                    'img' => $evaluation->analisePosturalAnterior->tmp_img
                ]);
            return true;
        }

        $this->analisePosturalAnterior->evaluation_id = $evaluation->id;
        $this->analisePosturalAnterior->arlcd = isset($data['arlcd']) && !empty($data['arlcd']) ? $data['arlcd'] : NULL;
        $this->analisePosturalAnterior->arlce = isset($data['arlce']) && !empty($data['arlce']) ? $data['arlce'] : NULL;
        $this->analisePosturalAnterior->ailcd = isset($data['ailcd']) && !empty($data['ailcd']) ? $data['ailcd'] : NULL;
        $this->analisePosturalAnterior->ailce = isset($data['ailce']) && !empty($data['ailce']) ? $data['ailce'] : NULL;
        $this->analisePosturalAnterior->aeod = isset($data['aeod']) && !empty($data['aeod']) ? $data['aeod'] : NULL;
        $this->analisePosturalAnterior->aeoe = isset($data['aeoe']) && !empty($data['aeoe']) ? $data['aeoe'] : NULL;
        $this->analisePosturalAnterior->armpd = isset($data['armpd']) && !empty($data['armpd']) ? $data['armpd'] : NULL;
        $this->analisePosturalAnterior->armpe = isset($data['armpe']) && !empty($data['armpe']) ? $data['armpe'] : NULL;
        $this->analisePosturalAnterior->admp = isset($data['admp']) && !empty($data['admp']) ? $data['admp'] : NULL;
        $this->analisePosturalAnterior->adq = isset($data['adq']) && !empty($data['adq']) ? $data['adq'] : NULL;
        $this->analisePosturalAnterior->aami = isset($data['aami']) && !empty($data['aami']) ? $data['aami'] : NULL;
        $this->analisePosturalAnterior->ajvaro = isset($data['ajvaro']) && !empty($data['ajvaro']) ? $data['ajvaro'] : NULL;
        $this->analisePosturalAnterior->ajvalgo = isset($data['ajvalgo']) && !empty($data['ajvalgo']) ? $data['ajvalgo'] : NULL;
        $this->analisePosturalAnterior->arijde = isset($data['arijde']) && !empty($data['arijde']) ? $data['arijde'] : NULL;
        $this->analisePosturalAnterior->apede = isset($data['apede']) && !empty($data['apede']) ? $data['apede'] : NULL;
        $this->analisePosturalAnterior->apide = isset($data['apide']) && !empty($data['apide']) ? $data['apide'] : NULL;
        $this->analisePosturalAnterior->apabdutode = isset($data['apabdutode']) && !empty($data['apabdutode']) ? $data['apabdutode'] : NULL;
        $this->analisePosturalAnterior->admi = isset($data['admi']) && !empty($data['admi']) ? $data['admi'] : NULL;
        $this->analisePosturalAnterior->ape = isset($data['ape']) && !empty($data['ape']) ? $data['ape'] : NULL;
        $this->analisePosturalAnterior->aas = isset($data['aas']) && !empty($data['aas']) ? $data['aas'] : NULL;
        $this->analisePosturalAnterior->obs = isset($data['obs']) && !empty($data['obs']) ? $data['obs'] : NULL;
        //Se salvar, movo as imagens para a pasta analise_postural_anterior
        if($this->analisePosturalAnterior->save()){

            return true;
        }
        return false;

    }

    public function updateImgAnalisePosturalAnterior($id, $request, $result){
        $data = $request->all();
        $evaluation = $this->evaluation->find($id);
        if(!is_null($evaluation->analisePosturalAnterior)){

            //Variável que irá ter todas as imagens que foram feitas upload
            $imgs = $result['filename'].';';
            foreach($result['dimensions'] as $key => $value){
                $imgs .= $value['filename'].';';
            }
            //Remove o último ;
            $imgs = substr($imgs, 0, -1);

            //Variável que deletará todas as imagens da pasta temporária
            $tmp_imgs = explode(';', $evaluation->analisePosturalAnterior->tmp_img);

            //Deletando os tmps atuais
            foreach($tmp_imgs as $img){
                if(File::exists(public_path().'/uploads/images/tmp/'.$img)){
                    File::Delete(public_path().'/uploads/images/tmp/'.$img);
                }
            }

            //Salvando nova imagem
            $this->analisePosturalAnterior->where('evaluation_id', $evaluation->id)
                ->update([
                    'tmp_img' => $imgs
                ]);
            return true;
        }

        //Pegando todas as imagens que foram feitas upload
        $imgs = $result['filename'].';';
        foreach($result['dimensions'] as $key => $value){
            $imgs .= $value['filename'].';';
        }
        //Remove o último ;
        $imgs = substr($imgs, 0, -1);

        //Variável que contém as imagens a serem deletadas da pasta temporária
        $imgs_to_delete = explode(';', $imgs);

        $this->analisePosturalAnterior->evaluation_id = $evaluation->id;
        $this->analisePosturalAnterior->tmp_img = !empty($imgs) ? $imgs : NULL;

        //Se salvar, movo as imagens para a pasta analise_postural_anterior
        if($this->analisePosturalAnterior->save()){
            return true;
        }
        return false;
    }

    public function sendImgAnalisePosturalLateralEsquerda($id, $request, $result){
        $data = $request->all();
        $evaluation = $this->evaluation->find($id);
        if(!is_null($evaluation->analisePosturalLateralEsquerda)){

            //Variável que irá ter todas as imagens que foram feitas upload
            $imgs = $result['filename'].';';
            foreach($result['dimensions'] as $key => $value){
                $imgs .= $value['filename'].';';
            }
            //Remove o último ;
            $imgs = substr($imgs, 0, -1);

            //Variável que deletará todas as imagens da pasta temporária
            $tmp_imgs = explode(';', $evaluation->analisePosturalLateralEsquerda->tmp_img);

            //Deletando os tmps atuais
            foreach($tmp_imgs as $img){
                if(File::exists(public_path().'/uploads/images/tmp/'.$img)){
                    File::Delete(public_path().'/uploads/images/tmp/'.$img);
                }
            }

            //Salvando nova imagem
            $this->analisePosturalLateralEsquerda->where('evaluation_id', $evaluation->id)
                ->update([
                    'tmp_img' => $imgs
                ]);
            return true;
        }

        //Pegando todas as imagens que foram feitas upload
        $imgs = $result['filename'].';';
        foreach($result['dimensions'] as $key => $value){
            $imgs .= $value['filename'].';';
        }
        //Remove o último ;
        $imgs = substr($imgs, 0, -1);

        //Variável que contém as imagens a serem deletadas da pasta temporária
        $imgs_to_delete = explode(';', $imgs);

        $this->analisePosturalLateralEsquerda->evaluation_id = $evaluation->id;
        $this->analisePosturalLateralEsquerda->tmp_img = !empty($imgs) ? $imgs : NULL;

        //Se salvar, movo as imagens para a pasta analise_postural_anterior
        if($this->analisePosturalLateralEsquerda->save()){
            return true;
        }
        return false;
    }


}