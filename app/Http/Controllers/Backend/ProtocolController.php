<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Protocol\ProtocolRepository;
use App\Http\Requests\Backend\Protocol\CreateProtocolRequest;
use App\Http\Requests\Backend\Protocol\UpdateProtocolRequest;

/**
 * Class ProtocolController
 * @package App\Http\Controllers\Backend
 */
class ProtocolController extends Controller
{
    /**
     * ProtocolController constructor.
     */
    public function __construct(){
        $this->protocolRepository = new ProtocolRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        //$request->session()->put('lastpage', $request->only('page')['page']);

        $f_submit = $request->input('f_submit', '');

        $name = getValueSession($request, 'ProtocolController@index:name', '', $f_submit, '');
        $formula = getValueSession($request, 'ProtocolController@index:formula', '', $f_submit, '');

        $protocols = $this->protocolRepository->getPaginated(NULL, $name, $formula);
        return view('backend.protocols.index', compact('protocols', 'name', 'formula'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $measures = $this->protocolRepository->getMeasures('name');
        return view('backend.protocols.create', compact('typeTests', 'measures'));
    }

    /**
     * @param CreateProtocolRequest $request
     * @return mixed
     */
    public function store(CreateProtocolRequest $request){
        if($this->protocolRepository->create($request)){
            return redirect()->route('backend.protocols.index')
                ->withInput()
                ->withFlashSuccess(trans('alerts.protocols.created'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\GeneralException
     */
    public function edit($id){
        $protocol = $this->protocolRepository->findOrThrowException($id);
        $measures = $this->protocolRepository->getMeasures('name');
        return view('backend.protocols.edit', compact('protocol', 'measures'));
    }

    /**
     * @param $id
     * @param UpdateProtocolRequest $request
     * @return mixed
     */
    public function update($id, UpdateProtocolRequest $request){
        if($this->protocolRepository->update($id, $request)){
            return redirect()->route('backend.protocols.index')
                ->withFlashSuccess(trans('alerts.protocols.updated'));
        }
        return redirect()
            ->route('backend.protocols.edit')
            ->withInput()
            ->withFlashSuccess(trans('alerts.protocols.edit_error'));
    }

    public function destroy($id){
        if($this->protocolRepository->destroy($id)){
            return redirect()->route('backend.protocols.index')
                ->withFlashSuccess(trans('alerts.protocols.deleted'));
        }
        return redirect()
            ->route('backend.protocols.index')
            ->withFlashSuccess(trans('alerts.protocols.delete_error'));
    }
}
