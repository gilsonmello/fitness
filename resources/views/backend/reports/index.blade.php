@section ('title', trans('menus.reports.index'))

@section('content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ trans('strings.manager') }}
        <small>{{ trans('menus.reports.index') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('backend.dashboard')}}">
                <i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}
            </a>
        </li>
        <li class="active">{{ trans('menus.reports.index') }}</li>
    </ol>
</section>
@endsection

@extends('layouts.backend.app')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('strings.filter') }}</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        {!! Form::open(array('route' => array('backend.reports.index'), 'class' => '', 'method' => 'get'))  !!}
        {!! Form::hidden('f_submit', '1') !!}
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('Backend/ReportController@index:name',  trans('strings.name'), ['class' => '']) !!}
                        {!! Form::text('Backend/ReportController@index:name', $name, ['class' => 'form-control']  ) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('Backend/ReportController@index:email',  trans('strings.email'), ['class' => '']) !!}
                        {!! Form::text('Backend/ReportController@index:email', $email, ['class' => 'form-control']  ) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('Backend/ReportController@index:cpf',  trans('strings.cpf'), ['class' => '']) !!}
                        {!! Form::text('Backend/ReportController@index:cpf', $cpf, ['class' => 'cpf form-control']  ) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('Backend/ReportController@index:rg',  trans('strings.rg'), ['class' => '']) !!}
                        {!! Form::text('Backend/ReportController@index:rg', $rg, ['class' => 'rg form-control']  ) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('Backend/ReportController@index:profile[]', trans('strings.profile').' *', ['class' => '']) !!}
                        <select name="Backend/ReportController@index:profile[]" class="select2" multiple="multiple" data-placeholder="{!! trans('strings.profile') !!}">
                            @foreach($roles->pluck('label', 'id')->all() as $key => $role)
                                @if(in_array($key, $profile))
                                    <option value="{!! $key !!}" selected="selected">{!! $role !!}</option>
                                @else
                                    <option value="{!! $key !!}" >{!! $role !!}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            {!! Form::submit( trans('strings.search'), ['class' => 'btn btn-primary btn-xs']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" cellspacing="0" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>{!! trans('strings.name') !!}</th>
                                <th>{!! trans('strings.email') !!}</th>
                                <th>{!! trans('strings.validity') !!}</th>
                                <th>{!! trans('strings.tests') !!}</th>
                                <th>{!! trans('strings.evaluations') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $value)
                                <tr>
                                    <td>{!! $value->name !!}</td>
                                    <td>{!! $value->email !!}</td>
                                    <td>{!! !is_null($value->validity) ? format_datebr($value->validity) : 'Sem limite' !!}</td>
                                    <td>
                                        <a href="{{route('backend.reports.tests', $value->id)}}" class="btn btn-xs btn-primary">
                                            <i class="fa fa-list" data-toggle="tooltip" data-placement="top" title="Relatório de Testes"></i>
                                        </a>
                                        <button data-toggle="modal" data-target="#send-test-user-{{$value->id}}" class="btn btn-xs btn-primary">
                                            <i class="fa fa-envelope-o" data-toggle="tooltip" data-placement="top" title="Enviar por e-mail"></i>
                                        </button>
                                        @include('backend.reports.includes.tests.modal.email')
                                    </td>
                                    <td>
                                        <a href="{{route('backend.reports.evaluations', $value->id)}}" class="btn btn-xs btn-primary">
                                            <i class="fa fa-list" data-toggle="tooltip" data-placement="top" title="Relatório de Avaliações"></i>
                                        </a>
                                        <button data-toggle="modal" data-target="#send-evaluation-user-{{$value->id}}" class="btn btn-xs btn-primary">
                                            <i class="fa fa-envelope-o" data-toggle="tooltip" data-placement="top" title="Enviar por e-mail"></i>
                                        </button>
                                        @include('backend.reports.includes.evaluations.modal.email')
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Não há registros</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{!! trans('strings.name') !!}</th>
                                <th>{!! trans('strings.email') !!}</th>
                                <th>{!! trans('strings.validity') !!}</th>
                                <th>{!! trans('strings.tests') !!}</th>
                                <th>{!! trans('strings.evaluations') !!}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection