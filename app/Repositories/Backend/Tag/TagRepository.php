<?php
namespace App\Repositories\Backend\Tag;

use App\Model\Backend\Tag;
use App\Exceptions\GeneralException;
use App\Model\Backend\Package;
use App\Http\Requests\Backend\Tag\UpdateTagRequest;
use App\Http\Requests\Backend\Tag\CreateTagRequest;

/**
 * Class TagRepository
 * @package App\Repositories\Backend\Tag
 */
class TagRepository
{

    /**
     * ProtocolRepository constructor.
     */
    public function __construct()
    {
          
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function find($id)
    {
        $tag = Tag::findOrFail($id);
        if (!is_null($tag)) {
            return $tag;
        }
        throw new GeneralException("That Protocol does not exist.");
    }

    /**
     * @param $request
     * @return bool
     */
    public function create(CreateTagRequest $request)
    {
        $tag = new Tag;
        $tag->name = $request->get('name');
        $tag->description = $request->get('description');
        $tag->is_active = !is_null($request->get('is_active')) ? $request->get('is_active') : 0;
           
        if ($tag->save()) {
            return true;
        }

        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Package::all();
    }

    /**
     * @param $per_page
     * @param string $title
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page = NULL, $name = '', $description = '', $order_by = 'id', $sort = 'asc')
    {
        if (!is_null($per_page)) {
            return Tag::where('is_active', '=', 1)
                ->where('name', 'LIKE', '%'.$name.'%')
                ->where('description', 'LIKE', '%'.$description.'%')
                ->orderBy($order_by, $sort)
                ->paginate($per_page);
        }
        return Tag::where('is_active', '=', 1)
            ->where('name', 'LIKE', '%'.$name.'%')
            ->where('description', 'LIKE', '%'.$description.'%')
            ->orderBy($order_by, $sort)
            ->get();
    }

    /**
     * Função para atualizar parq
     * @param $request
     * @return boolean
     */
    public function update(UpdateTagRequest $request, $id)
    {
        $tag = $this->find($id);
        $tag->name = $request->get('name');
        $tag->description = $request->get('description');
        $tag->is_active = !is_null($request->get('is_active')) ? $request->get('is_active') : 0;
           
        if ($tag->save()) {
            return true;
        }

        return false;
    }

    /**
     * Função para deletar parq
     * @param int $id
     * @return boolean
     * @throws GeneralException
     */
    public function destroy($id)
    {
        $tag = $this->find($id);
        if ($tag->delete()) {
            return true;
        }
        throw new GeneralException("There was a problem deleting this parq. Please try again.");
    }
}