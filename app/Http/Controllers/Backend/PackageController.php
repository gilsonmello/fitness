<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Package\PackageRepository;
use App\Http\Requests\Backend\Package\CreatePackageRequest;
use App\Http\Requests\Backend\Package\UpdatePackageRequest;

class PackageController extends Controller
{
    public function __construct(){
        $this->packageRepository = new PackageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = $this->packageRepository->all();
        return view('backend.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePackageRequest $request)
    {
        if($this->packageRepository->create($request)){
            return redirect()->route('backend.packages.index')
                ->withInput()
                ->withFlashSuccess(trans('alerts.packages.create.success'));
        }
        return redirect()->route('backend.packages.create')
                ->withInput()
                ->withFlashSuccess(trans('alerts.packages.create.error'));
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
        $package = $this->packageRepository->find($id);
        return view('backend.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, $id)
    {
        if($this->packageRepository->update($request, $id)){
            return redirect()->route('backend.packages.index')
                ->withInput()
                ->withFlashSuccess(trans('alerts.packages.update.success'));
        }
        return redirect()->route('backend.packages.edit')
                ->withInput()
                ->withFlashSuccess(trans('alerts.packages.update.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->packageRepository->destroy($id)){
            return redirect()->route('backend.packages.index')
                ->withInput()
                ->withFlashSuccess(trans('alerts.packages.delete.success'));
        }
        return redirect()->route('backend.packages.index')
                ->withInput()
                ->withFlashSuccess(trans('alerts.packages.delete.error'));   
    }
}
