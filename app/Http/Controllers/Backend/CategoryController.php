<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Category\CreateCategoryRequest;
use App\Http\Requests\Backend\Category\UpdateCategoryRequest;
use App\Repositories\Backend\Category\CategoryRepository;

class CategoryController extends Controller
{
    
    /**
     * @var categoryRepository
    */
    protected $categoryRepository;

    /**
     * CategoryController constructor.
     */
    public function __construct(){
        $this->categoryRepository = new CategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('backend.categories.index');
        $f_submit = $request->input('f_submit', '');

        $name = getValueSession($request, 'Backend/CategoryController@index:name', '', $f_submit, '');
        $slug = getValueSession($request, 'Backend/CategoryController@index:slug', '', $f_submit, '');
        $categories = $this->categoryRepository
            ->getPaginated(config('app.per_page'), $name, $slug);
        if($request->ajax()){
            return view('backend.categories.paginate', compact(
                'categories',
                'name',
                'slug'
            ));
        }
        return view('backend.categories.index', compact(
            'categories',
            'name',
            'slug'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('backend.categories.create');
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        if($this->categoryRepository->create($request)){
            return redirect()->route('backend.categories.index')
                ->withInput()
                ->withFlashSuccess(trans('alerts.categories.create.success'));
        }
        return redirect()->route('backend.categories.create')
                ->withInput()
                ->withFlashSuccess(trans('alerts.categories.create.error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('backend.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('backend.categories.edit');
        $category = $this->categoryRepository->find($id);
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        if($this->categoryRepository->update($request)){
            return redirect()->route('backend.categories.index')
                ->withInput()
                ->withFlashSuccess(trans('alerts.categories.create.success'));
        }
        return redirect()->route('backend.categories.edit')
                ->withInput()
                ->withFlashSuccess(trans('alerts.categories.edit.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('backend.categories.destroy');
        if($this->categoryRepository->destroy($id)){
            return redirect()->route('backend.categories.index')
                ->withInput()
                ->withFlashSuccess(trans('alerts.categories.delete.success'));
        }
        return redirect()->route('backend.categories.index')
                ->withInput()
                ->withFlashSuccess(trans('alerts.categories.delete.error'));
    }
}
