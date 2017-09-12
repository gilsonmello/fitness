<?php namespace App\Repositories\API\User;

use App\Exceptions\GeneralException;
use App\User;
use App\Antropometria;
use App\Bioempedancia;
use App\Evaluation;

/**
 * Class UserRepository
 * @package App\Repositories\API\User
 */
class UserRepository{

    protected $user;

    protected $bioempedancia;

    protected $evaluation;

    public function __construct()
    {
        $this->user = new User;
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
        $this->user->name = $data['name'];
        $this->user->email = $data['email'];
        $this->user->password = bcrypt($data['password']);
        $this->user->remember_token = str_random(10);

        if($this->user->save()){
            $user = $this->user;
            $token = User::find($user->id)->createToken('token')->accessToken;
            return $token;
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