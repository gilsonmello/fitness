<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\API\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();

        $schedules = Schedule::where('is_active', '=', 1)
        ->where('user_id', '=', $data['user_id'])
        ->get();

        if(!$schedules->isEmpty()){
            return response()->json($schedules, 200);
        }

        return response()->json('false', 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSchedulesUser(Request $request, $id)
    {
        $schedules = Schedule::with('user')
        ->with('package')
        ->with('order')
        ->with('diary')
        ->with('diaryHour')
        ->where('is_active', '=', 1)
        ->where('user_id', '=', $id)
        ->get();

        if(!$schedules->isEmpty()){
            return response()->json($schedules, 200);
        }

        return response()->json('false', 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request, $id)
    {
        $schedules = Schedule::where('is_active', '=', 1)
        ->where('user_id', '=', $id)
        ->get();

        if(!$schedules->isEmpty()){
            return response()->json($schedules, 200);
        }

        return response()->json('false', 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
