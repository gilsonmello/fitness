<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\DiaryHour\DiaryHourRepository;
use App\Http\Requests\Backend\DiaryHour\CreateDiaryHourRequest;
use App\Http\Requests\Backend\DiaryHour\UpdateDiaryHourRequest;


class DiaryHourController extends Controller
{

    /**
     * DiaryHourController constructor.
     */
    public function __construct(){
        $this->diaryHourRepository = new DiaryHourRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $diary_hours = $this->diaryHourRepository->getPaginated();
        return view('backend.diary_hours.index', compact('diary_hours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diaries = $this->diaryHourRepository->getDiaries();
        return view('backend.diary_hours.create', compact('diaries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiaryHourRequest $request)
    {
        
        if($this->diaryHourRepository->create($request)){
            return redirect()->route('backend.diary_hours.index')
                ->withFlashSuccess(trans('alerts.diaries.create.success'));
        }

        return redirect()->route('backend.diary_hours.create')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diaries = $this->diaryHourRepository->getDiaries();
        $diary_hour = $this->diaryHourRepository->find($id);

        return view('backend.diary_hours.edit', compact('diary_hour', 'diaries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateDiaryHourRequest $request)
    {
        if($this->diaryHourRepository->update($id, $request)){
            return redirect()->route('backend.diary_hours.index')
                ->withFlashSuccess(trans('alerts.diary_hours.edit.success'));
        }

        return redirect()->route('backend.diary_hours.index')
                ->withInput()
                ->withFlashDanger(trans('alerts.diary_hours.edit.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->diaryHourRepository->destroy($id)){
            return redirect()->route('backend.diary_hours.index')
                ->withFlashSuccess(trans('alerts.diary_hours.delete.success'));
        }
        return redirect()->route('backend.diary_hours.index')
                ->withFlashSuccess(trans('alerts.diary_hours.delete.error'));
    }
}
