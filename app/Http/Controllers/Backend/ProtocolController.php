<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Protocol\ProtocolRepository;
use App\Http\Requests\Backend\Protocol\CreateProtocolRequest;


class ProtocolController extends Controller
{
    protected $protocolRepository;

    public function __construct(ProtocolRepository $protocolRepository){
        $this->protocolRepository = $protocolRepository;
    }

    public function index(Request $request){
        $request->session()->put('lastpage', $request->only('page')['page']);

        $f_submit = $request->input('f_submit', '');

        $name = getValueSession($request, 'ProtocolController@index:name', '', $f_submit, '');

        $protocols = $this->protocolRepository->getPaginated(NULL, $name);
        return view('backend.protocols.index', compact('protocols'));
    }

    public function create(){
        return view('backend.protocols.create');
    }

    public function store(CreateProtocolRequest $request){
        if($this->protocolRepository->create($request)){
            return redirect()->route('backend.protocols.index')
                ->withInput()
                ->withFlashSuccess(trans('alerts.protocols.create'));
        }
    }

}
