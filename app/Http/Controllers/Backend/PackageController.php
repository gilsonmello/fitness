<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Package\PackageRepository;
use App\Http\Requests\Backend\Package\CreatePackageRequest;
use App\Http\Requests\Backend\Package\UpdatePackageRequest;
use Illuminate\Support\Facades\Gate;

/**
 * Class PackageController
 * @package App\Http\Controllers\Backend
 */
class PackageController extends Controller
{
    /**
     * @var PackageRepository
     */
    protected $packageRepository;

    /**
     * PackageController constructor.
     */
    public function __construct(){
        $this->packageRepository = new PackageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('backend.packages.index');
        $f_submit = $request->input('f_submit', '');

        $name = getValueSession($request, 'Backend/PackageController@index:name', '', $f_submit, '');
        $slug = getValueSession($request, 'Backend/PackageController@index:slug', '', $f_submit, '');
        $packages = $this->packageRepository
            ->getPaginated(config('app.per_page'), $name, $slug);
        if($request->ajax()){
            return view('backend.packages.paginate', compact(
                'packages',
                'name',
                'slug'
            ));
        }
        return view('backend.packages.index', compact(
            'packages',
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
        $this->authorize('backend.packages.create');
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
        return view('backend.packages.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\GeneralException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('backend.packages.edit');
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
        $this->authorize('backend.packages.destroy');
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
