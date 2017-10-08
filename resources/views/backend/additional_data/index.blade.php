@section ('title', trans('menus.additional_data.index'))

@section('content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ trans('strings.manager') }}
        <small>{{ trans('strings.additional_data') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('backend.dashboard')}}"><i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}</a></li>
        <li class="active">{{ trans('menus.additional_data.index') }}</li>
    </ol>
</section>
@endsection

@extends('layouts.backend.app')

@section('content')
<div class="pull-right" style="margin-bottom:10px">
    <a href="{{ route('backend.additional_data.create') }}" class="btn btn-primary btn-xs">
        {{ trans('menus.additional_data.create') }}
    </a>
    {{--<a href="{{route('admin.coupons.import')}}" class="btn btn-primary btn-xs">--}}
    {{--{{ trans('menus.import_coupon') }}--}}
    {{--</a>--}}
</div>
<div class="clearfix"></div>

{{--<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('strings.filter') }}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    {!! Form::open(array('route' => array('backend.additional_data.index'), 'class' => '', 'method' => 'get'))  !!}
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('Backend/AuthController@index:name',  trans('strings.name'), ['class' => '']) !!}
                        {!! Form::text('Backend/AuthController@index:name', null, ['class' => 'form-control']  ) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('Backend/AuthController@index:email',  trans('strings.email'), ['class' => '']) !!}
                        {!! Form::text('Backend/AuthController@index:email', null, ['class' => 'form-control']  ) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('Backend/AuthController@index:cpf',  trans('strings.cpf'), ['class' => '']) !!}
                        {!! Form::text('Backend/AuthController@index:cpf', null, ['class' => 'cpf form-control']  ) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('Backend/AuthController@index:rg',  trans('strings.rg'), ['class' => '']) !!}
                        {!! Form::text('Backend/AuthController@index:rg', null, ['class' => 'rg form-control']  ) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('Backend/AuthController@index:birth_date',  trans('strings.birth_date'), ['class' => '']) !!}
                        {!! Form::text('Backend/AuthController@index:birth_date', null, ['class' => 'datepicker form-control']  ) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            {!! Form::submit( trans('strings.search'), ['class' => 'btn btn-primary btn-xs']) !!}
        </div>
    {!! Form::close() !!}
</div>--}}

<div class="row">
    <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" cellspacing="0" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>{!! trans('strings.evaluation') !!}</th>
                            <th>{!! trans('strings.user_name') !!}</th>
                            <th>{!! trans('strings.name_of_additional_data') !!}</th>
                            <th>{!! trans('strings.initials') !!}</th>
                            <th>{!! trans('strings.description') !!}</th>
                            <th>{!! trans('strings.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($additionalData as $value)
                            <tr>
                                <td>{!! format_datetimebr($value->evaluation->created_at) !!}</td>
                                <td>{!! $value->evaluation->user->name !!}</td>
                                <td>{!! $value->name !!}</td>
                                <td>{!! $value->initials !!}</td>
                                <td>{!! substr($value->description, 0, 100) !!}</td>
                                <th>{!! $value->action_buttons !!}</th>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Não foram encontrados registros</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>{!! trans('strings.evaluation') !!}</th>
                            <th>{!! trans('strings.user_name') !!}</th>
                            <th>{!! trans('strings.name') !!}</th>
                            <th>{!! trans('strings.initials') !!}</th>
                            <th>{!! trans('strings.description') !!}</th>
                            <th>{!! trans('strings.actions') !!}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection