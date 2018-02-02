<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Tag\UpdateTagRequest;
use App\Http\Requests\Backend\Tag\CreateTagRequest;
use App\Repositories\Backend\Tag\TagRepository;

class TagController extends Controller
{
    /**
     *
     *
     */
    protected $tagRepository;

    public function __construct(){
        $this->tagRepository = new TagRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('backend.tags.index');
        $f_submit = $request->input('f_submit', '');

        $name = getValueSession($request, 'Backend/TagController@index:name', '', $f_submit, '');
        $description = getValueSession($request, 'Backend/TagController@index:description', '', $f_submit, '');
        $tags = $this->tagRepository
            ->getPaginated(config('app.per_page'), $name, $description);
        if($request->ajax()){
            return view('backend.tags.paginate', compact(
                'tags',
                'name',
                'description'
            ));
        }
        return view('backend.tags.index', compact(
            'tags',
            'name',
            'description'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('backend.tags.create');
        return view('backend.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        if($this->tagRepository->create($request)){
            return redirect()->route('backend.tags.index')
                ->withInput()
                ->withFlashSuccess(trans('alerts.tags.create.success'));
        }
        return redirect()->route('backend.tags.create')
                ->withInput()
                ->withFlashSuccess(trans('alerts.tags.create.error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('backend.tags.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('backend.tags.edit');
        $tag = $this->tagRepository->find($id);
        return view('backend.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, $id)
    {
        if($this->tagRepository->update($request, $id)){
            return redirect()->route('backend.tags.index')
                ->withInput()
                ->withFlashSuccess(trans('alerts.tags.update.success'));
        }
        return redirect()->route('backend.tags.edit', $id)
                ->withInput()
                ->withFlashSuccess(trans('alerts.tags.update.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('backend.tags.destroy');
        if($this->tagRepository->destroy($id)){
            return redirect()->route('backend.tags.index')
                ->withInput()
                ->withFlashSuccess(trans('alerts.tags.delete.success'));
        }
        return redirect()->route('backend.tags.destroy')
                ->withInput()
                ->withFlashSuccess(trans('alerts.tags.delete.error'));
    }
}
