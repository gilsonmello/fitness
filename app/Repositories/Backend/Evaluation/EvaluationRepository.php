<?php namespace App\Repositories\Backend\Evaluation;

use App\Question;
use App\Exceptions\GeneralException;
use App\Evaluation;
use App\Parq;
use App\PregasCutanea;
use App\AnalisePosturalAnterior;
use App\AnalisePosturalLateralEsquerda;
use App\AnalisePosturalLateralDireita;
use App\AnalisePosturalPosterior;
use App\EvaluationAttribute;
use App\Antropometria;
use App\Bioempedancia;
use File;

/**
 * Class QuestionRepository
 * @package App\Repositories\Backend\Evaluation
 */
class EvaluationRepository{


    public function __construct(){
        $this->evaluation = new Evaluation;
        $this->parq = new Parq;
        $this->pregasCutanea = new PregasCutanea;
        $this->analisePosturalAnterior = new AnalisePosturalAnterior;
        $this->analisePosturalLateralEsquerda = new AnalisePosturalLateralEsquerda;
        $this->analisePosturalLateralDireita = new AnalisePosturalLateralDireita;
        $this->analisePosturalPosterior = new AnalisePosturalPosterior;
        $this->evaluationAttribute = new EvaluationAttribute;
        $this->bioempedancia = new Bioempedancia;
        $this->antropometria = new Antropometria;
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
        return $this->evaluation
            ->where('title', 'like', '%'.$title.'%')
            ->where('is_active', '=', 1)
            ->orderBy($order_by, $sort)->get();
    }

    /**
     * @param $request
     * @return boolean
     */
    public function update($id, $request){
        
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



    /**
     * @param $id
     * @param $request
     * @return bool
     */
    public function updateWeightAndHeight($id, $request){
        $data = $request->all();
        $evaluation = $this->evaluation->find($id);
        $save = $this->evaluationAttribute->where('evaluation_id', '=', $evaluation->id)
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
    public function updatePerimetrosCircunferencias($id, $request){
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

        if($data['uploaded_image'] == '1') {

            //Verifico se há alguma imagem temporária salva na base
            if (!is_null($evaluation->analisePosturalAnterior->tmp_img)) {
                $tmp_imgs = explode(';', $evaluation->analisePosturalAnterior->tmp_img);
            } else {
                $tmp_imgs = [];
            }

            //Se houver alguma imagem temporária salva na base
            if (count($tmp_imgs) > 0) {
                //Movendo a tmp criada para a pasta correta
                foreach ($tmp_imgs as $img) {
                    if (File::exists(public_path() . '/uploads/images/tmp/' . $img)) {
                        File::move(public_path() . '/uploads/images/tmp/' . $img, public_path() . '/uploads/images/analise_postural/' . $img);
                    }
                }
            }


            //Deletando as imagens originais
            if ($evaluation->analisePosturalAnterior->tmp_img != $evaluation->analisePosturalAnterior->img) {
                $to_delete = explode(';', $evaluation->analisePosturalAnterior->img);
                foreach ($to_delete as $img) {
                    if (File::exists(public_path() . '/uploads/images/analise_postural/' . $img)) {
                        File::delete(public_path() . '/uploads/images/analise_postural/' . $img);
                    }
                }
            }
            //Salvando nova imagem com o tmp atual
            $this->analisePosturalAnterior->where('evaluation_id', $evaluation->id)
                ->update([
                    'img' => $evaluation->analisePosturalAnterior->tmp_img
                ]);
        }

        //Salvando nova imagem com o tmp atual
        $save = $this->analisePosturalAnterior->where('evaluation_id', $evaluation->id)
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
            ]);

        if($save) {
            return true;
        }

        return false;
    }

    public function sendImgAnalisePosturalAnterior($id, $request, $result){
        $evaluation = $this->evaluation->find($id);

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
        $save = $this->analisePosturalAnterior->where('evaluation_id', $evaluation->id)
            ->update([
                'tmp_img' => $imgs
            ]);

        if($save) {
            return true;
        }

        return false;
    }

    /**
     * Função que envia a imagem para a pasta tmp
     * @param $id
     * @param $request
     * @param array $result
     * @return bool
     */
    public function sendImgAnalisePosturalLateralEsquerda($id, $request, $result){
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
        return false;
    }

    /**
     * @param $id
     * @param $request
     * @return bool
     */
    public function updateAnalisePosturalLateralEsquerda($id, $request){
        $data = $request->all();
        $evaluation = $this->evaluation->find($id);

        if($data['uploaded_image'] == '1') {
            //Verifico se há alguma imagem temporária salva na base
            if (!is_null($evaluation->analisePosturalLateralEsquerda->tmp_img)) {
                $tmp_imgs = explode(';', $evaluation->analisePosturalLateralEsquerda->tmp_img);
            } else {
                $tmp_imgs = [];
            }

            //Se houver alguma imagem temporária salva na base
            if (count($tmp_imgs) > 0) {
                //Movendo a tmp criada para a pasta correta
                foreach ($tmp_imgs as $img) {
                    if (File::exists(public_path() . '/uploads/images/tmp/' . $img)) {
                        File::move(public_path() . '/uploads/images/tmp/' . $img, public_path() . '/uploads/images/analise_postural/' . $img);
                    }
                }
            }

            //Deletando as imagens originais
            if ($evaluation->analisePosturalLateralEsquerda->tmp_img != $evaluation->analisePosturalLateralEsquerda->img) {
                $to_delete = explode(';', $evaluation->analisePosturalLateralEsquerda->img);
                foreach ($to_delete as $img) {
                    if (File::exists(public_path() . '/uploads/images/analise_postural/' . $img)) {
                        File::delete(public_path() . '/uploads/images/analise_postural/' . $img);
                    }
                }
            }
            $this->analisePosturalLateralEsquerda->where('evaluation_id', $evaluation->id)
                ->update(['img' => $evaluation->analisePosturalLateralEsquerda->tmp_img]);
        }

        //Salvando nova imagem com o tmp atual
        $save = $this->analisePosturalLateralEsquerda->where('evaluation_id', $evaluation->id)
            ->update([
                'lehc' => isset($data['lehc']) && !empty($data['lehc']) ? $data['lehc'] : NULL,
                'leht' => isset($data['leht']) && !empty($data['leht']) ? $data['leht'] : NULL,
                'lehl' => isset($data['lehl']) && !empty($data['lehl']) ? $data['lehl'] : NULL,
                'lecp' => isset($data['lecp']) && !empty($data['lecp']) ? $data['lecp'] : NULL,
                'legr' => isset($data['legr']) && !empty($data['legr']) ? $data['legr'] : NULL,
                'legf' => isset($data['legf']) && !empty($data['legf']) ? $data['legf'] : NULL,
                'leact' => isset($data['leact']) && !empty($data['leact']) ? $data['leact'] : NULL,
                'lell' => isset($data['lell']) && !empty($data['lell']) ? $data['lell'] : NULL,
                'leas' => isset($data['leas']) && !empty($data['leas']) ? $data['leas'] : NULL,
                'obs' => isset($data['obs']) && !empty($data['obs']) ? $data['obs'] : NULL,
            ]);

        if($save) {
            return true;
        }

        return false;
    }

    /**
     * Função que envia a imagem para a pasta tmp
     * @param $id
     * @param $request
     * @param array $result
     * @return bool
     */
    public function sendImgAnalisePosturalLateralDireita($id, $request, $result){
        $evaluation = $this->evaluation->find($id);

        //Variável que irá ter todas as imagens que foram feitas upload
        $imgs = $result['filename'].';';
        foreach($result['dimensions'] as $key => $value){
            $imgs .= $value['filename'].';';
        }
        //Remove o último ;
        $imgs = substr($imgs, 0, -1);

        //Variável que deletará todas as imagens da pasta temporária
        $tmp_imgs = explode(';', $evaluation->analisePosturalLateralDireita->tmp_img);

        //Deletando os tmps atuais
        foreach($tmp_imgs as $img){
            if(File::exists(public_path().'/uploads/images/tmp/'.$img)){
                File::Delete(public_path().'/uploads/images/tmp/'.$img);
            }
        }

        //Salvando nova imagem
        $this->analisePosturalLateralDireita->where('evaluation_id', $evaluation->id)
            ->update([
                'tmp_img' => $imgs
            ]);
        return true;

    }

    public function updateAnalisePosturalLateralDireita($id, $request){
        $data = $request->all();
        $evaluation = $this->evaluation->find($id);

        if($data['uploaded_image'] == '1') {
            //Verifico se há alguma imagem temporária salva na base
            if (!is_null($evaluation->analisePosturalLateralDireita->tmp_img)) {
                $tmp_imgs = explode(';', $evaluation->analisePosturalLateralDireita->tmp_img);
            } else {
                $tmp_imgs = [];
            }

            //Se houver alguma imagem temporária salva na base
            if (count($tmp_imgs) > 0) {
                //Movendo a tmp criada para a pasta correta
                foreach ($tmp_imgs as $img) {
                    if (File::exists(public_path() . '/uploads/images/tmp/' . $img)) {
                        File::move(public_path() . '/uploads/images/tmp/' . $img, public_path() . '/uploads/images/analise_postural/' . $img);
                    }
                }
            }

            //Deletando as imagens originais
            if ($evaluation->analisePosturalLateralDireita->tmp_img != $evaluation->analisePosturalLateralDireita->img) {
                $to_delete = explode(';', $evaluation->analisePosturalLateralDireita->img);
                foreach ($to_delete as $img) {
                    if (File::exists(public_path() . '/uploads/images/analise_postural/' . $img)) {
                        File::delete(public_path() . '/uploads/images/analise_postural/' . $img);
                    }
                }
            }
            $this->analisePosturalLateralDireita->where('evaluation_id', $evaluation->id)
                ->update([
                    'img' => $evaluation->analisePosturalLateralDireita->tmp_img
                ]);
        }

        //Salvando nova imagem com o tmp atual
        $this->analisePosturalLateralDireita->where('evaluation_id', $evaluation->id)
            ->update([
                'ldhc' => isset($data['ldhc']) && !empty($data['ldhc']) ? $data['ldhc'] : NULL,
                'ldht' => isset($data['ldht']) && !empty($data['ldht']) ? $data['ldht'] : NULL,
                'ldhl' => isset($data['ldhl']) && !empty($data['ldhl']) ? $data['ldhl'] : NULL,
                'ldcp' => isset($data['ldcp']) && !empty($data['ldcp']) ? $data['ldcp'] : NULL,
                'ldgr' => isset($data['ldgr']) && !empty($data['ldgr']) ? $data['ldgr'] : NULL,
                'ldgf' => isset($data['ldgf']) && !empty($data['ldgf']) ? $data['ldgf'] : NULL,
                'ldact' => isset($data['ldact']) && !empty($data['ldact']) ? $data['ldact'] : NULL,
                'ldll' => isset($data['ldll']) && !empty($data['ldll']) ? $data['ldll'] : NULL,
                'ldas' => isset($data['ldas']) && !empty($data['ldas']) ? $data['ldas'] : NULL,
                'obs' => isset($data['obs']) && !empty($data['obs']) ? $data['obs'] : NULL,
            ]);
        return true;

    }

    public function updateAnalisePosturalPosterior($id, $request){
        $data = $request->all();
        $evaluation = $this->evaluation->find($id);

        if($data['uploaded_image'] == '1') {
            //Verifico se há alguma imagem temporária salva na base
            if (!is_null($evaluation->analisePosturalPosterior->tmp_img)) {
                $tmp_imgs = explode(';', $evaluation->analisePosturalPosterior->tmp_img);
            } else {
                $tmp_imgs = [];
            }

            //Se houver alguma imagem temporária salva na base
            if (count($tmp_imgs) > 0) {
                //Movendo a tmp criada para a pasta correta
                foreach ($tmp_imgs as $img) {
                    if (File::exists(public_path() . '/uploads/images/tmp/' . $img)) {
                        File::move(public_path() . '/uploads/images/tmp/' . $img, public_path() . '/uploads/images/analise_postural/' . $img);
                    }
                }
            }

            //Deletando as imagens originais somente se houve alguma mudança de imagem
            if ($evaluation->analisePosturalPosterior->tmp_img != $evaluation->analisePosturalPosterior->img) {
                $to_delete = explode(';', $evaluation->analisePosturalPosterior->img);
                foreach ($to_delete as $img) {
                    if (File::exists(public_path() . '/uploads/images/analise_postural/' . $img)) {
                        File::delete(public_path() . '/uploads/images/analise_postural/' . $img);
                    }
                }
            }
            $this->analisePosturalPosterior->where('evaluation_id', $evaluation->id)
                ->update([
                    'img' => $evaluation->analisePosturalPosterior->tmp_img
                ]);
        }

        //Salvando nova imagem com o tmp atual
        $save = $this->analisePosturalPosterior->where('evaluation_id', $evaluation->id)
            ->update([
                'pec' => isset($data['pec']) && !empty($data['pec']) ? $data['pec'] : NULL,
                'pet' => isset($data['pet']) && !empty($data['pet']) ? $data['pet'] : NULL,
                'pel' => isset($data['pel']) && !empty($data['pel']) ? $data['pel'] : NULL,
                'pde' => isset($data['pde']) && !empty($data['pde']) ? $data['pde'] : NULL,
                'peabduzidas' => isset($data['peabduzidas']) && !empty($data['peabduzidas']) ? $data['peabduzidas'] : NULL,
                'peaduzidas' => isset($data['peaduzidas']) && !empty($data['peaduzidas']) ? $data['peaduzidas'] : NULL,
                'pdda' => isset($data['pdda']) && !empty($data['pdda']) ? $data['pdda'] : NULL,
                'pdq' => isset($data['pdq']) && !empty($data['pdq']) ? $data['pdq'] : NULL,
                'pdpd' => isset($data['pdpd']) && !empty($data['pdpd']) ? $data['pdpd'] : NULL,
                'prmp' => isset($data['prmp']) && !empty($data['prmp']) ? $data['prmp'] : NULL,
                'pas' => isset($data['pas']) && !empty($data['pas']) ? $data['pas'] : NULL,
                'obs' => isset($data['obs']) && !empty($data['obs']) ? $data['obs'] : NULL,
            ]);
        if($save){
            return true;
        }
        return true;

    }

    /**
     * Função que envia a imagem para a pasta tmp
     * @param $id
     * @param $request
     * @param array $result
     * @return bool
     */
    public function sendImgAnalisePosturalPosterior($id, $request, $result){
        $evaluation = $this->evaluation->find($id);

        //Variável que irá ter todas as imagens que foram feitas upload
        $imgs = $result['filename'].';';
        foreach($result['dimensions'] as $key => $value){
            $imgs .= $value['filename'].';';
        }
        //Remove o último ;
        $imgs = substr($imgs, 0, -1);

        //Variável que deletará todas as imagens da pasta temporária
        $tmp_imgs = explode(';', $evaluation->analisePosturalPosterior->tmp_img);

        //Deletando os tmps atuais
        foreach($tmp_imgs as $img){
            if(File::exists(public_path().'/uploads/images/tmp/'.$img)){
                File::Delete(public_path().'/uploads/images/tmp/'.$img);
            }
        }

        //Salvando nova imagem
        $this->analisePosturalPosterior->where('evaluation_id', $evaluation->id)
            ->update([
                'tmp_img' => $imgs
            ]);
        return true;

    }

    /**
     * @param $id
     * @param $request
     * @return bool
     */
    public function updateRiscoCoronario($id, $request){
        $data = $request->all();
        $evaluation = $this->evaluation->find($id);
        return false;
    }



}