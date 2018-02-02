<?php
namespace App\Repositories\Backend\Package;

use App\Model\Backend\Protocol;
use App\Exceptions\GeneralException;
use App\Model\Backend\Package;
use App\Model\Backend\Category;

/**
 * Class PackageRepository
 * @package App\Repositories\Backend\Package
 */
class PackageRepository
{

    /**
     * ProtocolRepository constructor.
     */
    public function __construct()
    {
        if(!is_dir(public_path() . '/uploads/images/packages')){
            mkdir(public_path() . '/uploads/images/packages');
        }   
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function find($id)
    {
        $package = Package::findOrFail($id);
        if (!is_null($package)) {
            return $package;
        }
        throw new GeneralException("That Protocol does not exist.");
    }

    /**
     * @param $request
     * @return bool
     */
    public function create($request)
    {
        //dd($request->get('value'));
        $package = new Package;
        $package->name = $request->get('name');
        $package->slug = $request->get('slug');
        $package->description = $request->get('description');
        $package->validity = $request->get('validity');
        $package->value = str_replace(',', '.', $request->get('value'));

        $package->begin_discount = $request->get('begin_discount');
        $package->end_discount = $request->get('end_discount');
        $package->value_discount = $request->get('value_discount');
        $package->is_active = !is_null($request->get('is_active')) ? $request->get('is_active') : 0;
        $package->meta_title = $request->get('meta_title');
        $package->meta_description = $request->get('meta_description');

        $package->save();
        $id = $package->id;
        
        if($request->hasFile('img')) {
            $image = $request->file('img');
            $name = 'img_'.$id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/images/packages');
            $image->move($destinationPath, $name);
            $package->img = '/uploads/images/packages/'.$name;
        }
        
        if($request->hasFile('img_discount')) {
            $image = $request->file('img_discount');
            $name = 'img_discount_'.$id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/images/packages');
            $image->move($destinationPath, $name);
            $package->img_discount = '/uploads/images/packages/'.$name;
        }
        
        if ($package->save()) {
            if($request->has('category_id')){
                $package->categories()->attch($request->get('category_id'));
            }
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
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function allCategories()
    {
        return Category::where('is_active', '=', 1)
            ->get();
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
            return Package::where('is_active', '=', 1)
                ->where('name', 'LIKE', '%'.$name.'%')
                ->where('slug', 'LIKE', '%'.$slug.'%')
                ->orderBy($order_by, $sort)
                ->paginate($per_page);
        }
        return Package::where('is_active', '=', 1)
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
    public function update($request, $id)
    {
        $data = $request->all();
        $package = $this->find($id);
        $package->name = $request->get('name');
        $package->slug = $request->get('slug');
        $package->description = $request->get('description');
        $package->validity = $request->get('validity');
        $package->value = $request->get('value');
        
        if($request->hasFile('img')) {
            $image = $request->file('img');
            $name = 'img_'.$id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/images/packages');
            $image->move($destinationPath, $name);
            $package->img = '/uploads/images/packages/'.$name;
        }
        
        if($request->hasFile('img_discount')) {
            $image = $request->file('img_discount');
            $name = 'img_discount_'.$id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/images/packages');
            $image->move($destinationPath, $name);
            $package->img_discount = '/uploads/images/packages/'.$name;
        }

        $package->begin_discount = $request->get('begin_discount');
        $package->end_discount = $request->get('end_discount');
        $package->value_discount = $request->get('value_discount');
        $package->is_active = $request->get('is_active');
        $package->meta_title = $request->get('meta_title');
        $package->meta_description = $request->get('meta_description');
        
        if ($package->save()) {
            if($request->has('category_id')){
                $package->categories()->sync($request->get('category_id'));
            }
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
        $package = $this->find($id);
        if ($package->delete()) {
            if($request->has('category_id')){
                $package->categories()->detach($request->get('category_id'));
            }
            return true;
        }
        throw new GeneralException("There was a problem deleting this parq. Please try again.");
    }
}