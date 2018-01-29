<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Diary\DiaryRepository;
use App\Http\Requests\Backend\Diary\CreateDiaryRequest;
use App\Http\Requests\Backend\Diary\UpdateDiaryRequest;


class DiaryController extends Controller
{

    /**
     * DiaryController constructor.
     */
    public function __construct(){
        $this->diaryRepository = new DiaryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('backend.diaries.index');
        $diaries = $this->diaryRepository->getPaginated();
        //dd($diaries);
        return view('backend.diaries.index', compact('diaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('backend.diaries.create');
        $suppliers = $this->diaryRepository->getSuppliers();
        return view('backend.diaries.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiaryRequest $request)
    {
        if($this->diaryRepository->create($request)){
            return redirect()->route('backend.diaries.index')
                ->withFlashSuccess(trans('alerts.diaries.create.success'));
        }

        return redirect()->route('backend.diaries.create')
                ->withInput()
                ->withFlashDanger(trans('alerts.diaries.create.error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $this->authorize('backend.diaries.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('backend.diaries.edit');
        $diary = $this->diaryRepository->find($id);
        $suppliers = $this->diaryRepository->getSuppliers();

        return view('backend.diaries.edit', compact('diary', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateDiaryRequest $request)
    {
        if($this->diaryRepository->update($id, $request)){
            return redirect()->route('backend.diaries.index')
                ->withFlashSuccess(trans('alerts.diaries.edit.success'));
        }

        return redirect()->route('backend.diaries.index')
                ->withInput()
                ->withFlashDanger(trans('alerts.diaries.edit.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('backend.diaries.destroy');
        if($this->diaryRepository->destroy($id)){
            return redirect()->route('backend.diaries.index')
                ->withFlashSuccess(trans('alerts.diaries.delete.success'));
        }
        return redirect()->route('backend.diaries.index')
                ->withFlashSuccess(trans('alerts.diaries.delete.error'));
    }
}
