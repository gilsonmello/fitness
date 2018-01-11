<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 30/08/2017
 * Time: 15:47
 */

namespace App\Repositories\Frontend\User;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateUser;

/**
 * Class UserRepository
 * @package App\Repositories\Frontend\User
 */
class UserRepository
{
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
        $this->user->name = $data['name'];
        $this->user->email = $data['email'];
        $this->user->gender = isset($data['gender']) ? $data['gender'] : 0;
        $this->user->password = bcrypt($data['password']);
        $this->user->birth_date = format_without_mask($data['birth_date'], '/');
        $this->user->remember_token = str_random(10);

        $suppliers_id[] = $data['supplier_id'];

        if($this->user->save()){
            $this->user->suppliers()->attach($suppliers_id, [
                'actual' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $this->user->roles()->attach(2, [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            Mail::to($this->user->email)->send(new CreateUser($this->user));
            $user = $this->user;
            $token = User::find($user->id)->createToken('Miranda Fitness')->accessToken;
            return ['token' => $token];
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
        $user = $this->findOrThrowException($id);
        if ($user->delete()) {
            $user->questionGroup()->detach();
            return true;
        }
        throw new GeneralException("There was a problem deleting this question. Please try again.");
    }

}