<?php
namespace App\Repositories\Backend\Category;

use App\Model\Backend\Category;
use App\Exceptions\GeneralException;
use App\Http\Requests\Backend\Category\CreateCategoryRequest;
use App\Http\Requests\Backend\Category\UpdateCategoryRequest;

/**
 * Class CategoryRepository
 * @package App\Repositories\Backend\Category
 */
class CategoryRepository
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
        $category = Category::findOrFail($id);
        if (!is_null($category)) {
            return $category;
        }
        throw new GeneralException("That Protocol does not exist.");
    }

    /**
     * @param $request
     * @return bool
     */
    public function create(CreateCategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->get('name');
        $category->slug = $request->get('slug');
        $category->description = $request->get('description');
        $category->is_active = !is_null($request->get('is_active')) ? $request->get('is_active') : 0;
        
        if ($category->save()) {
            return true;
        }

        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Category::all();
    }

    /**
     * @param $per_page
     * @param string $title
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page = NULL, $name = '', $slug = '', $order_by = 'id', $sort = 'asc')
    {
        if (!is_null($per_page)) {
            return Category::where('is_active', '=', 1)
                ->where('name', 'LIKE', '%'.$name.'%')
                ->where('slug', 'LIKE', '%'.$slug.'%')
                ->orderBy($order_by, $sort)
                ->paginate($per_page);
        }
        return Category::where('is_active', '=', 1)
            ->where('name', 'LIKE', '%'.$name.'%')
            ->where('slug', 'LIKE', '%'.$slug.'%')
            ->orderBy($order_by, $sort)
            ->get();
    }

    /**
     * Função para atualizar parq
     * @param $request
     * @return boolean
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = $this->find($id);
        $category->name = $request->get('name');
        $category->slug = $request->get('slug');
        $category->description = $request->get('description');
        $category->is_active = !is_null($request->get('is_active')) ? $request->get('is_active') : 0;
        
        if ($category->save()) {
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
        $category = $this->find($id);
        if ($category->delete()) {
            return true;
        }
        throw new GeneralException("There was a problem deleting this parq. Please try again.");
    }
}