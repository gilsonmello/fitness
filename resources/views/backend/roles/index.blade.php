@section ('title', trans('menus.roles.index'))

@section('content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ trans('strings.manager') }}
        <small>{{ trans('strings.roles') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('backend.dashboard')}}"><i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}</a></li>
        <li class="active">{{ trans('menus.roles.index') }}</li>
    </ol>
</section>
@endsection

@extends('layouts.backend.app')

@section('content')
<div class="pull-right" style="margin-bottom:10px">
    <a href="{{ route('backend.roles.create') }}" class="btn btn-primary btn-xs">
        {{ trans('menus.roles.create') }}
    </a>
    {{--<a href="{{route('admin.coupons.import')}}" class="btn btn-primary btn-xs">--}}
    {{--{{ trans('menus.import_coupon') }}--}}
    {{--</a>--}}
</div>
<div class="clearfix"></div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('strings.filter') }}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    {!! Form::open(array('route' => array('backend.roles.index'), 'class' => '', 'method' => 'get'))  !!}
        <div class="box-body">
            <div class="row">
                {!! Form::hidden('f_submit', '1') !!}
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <div class="form-group">
                        {!! Form::label('RoleController@index:name',  trans('strings.name'), ['class' => '']) !!}
                        {!! Form::text('RoleController@index:name', $name, ['class' => 'form-control']  ) !!}
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <div class="form-group">
                        {!! Form::label('RoleController@index:label',  trans('strings.label'), ['class' => '']) !!}
                        {!! Form::text('RoleController@index:label', $label, ['class' => 'form-control']  ) !!}
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
    <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table cellspacing="0" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th class="text-center">{!! trans('strings.name') !!}</th>
                            <th class="text-center">{!! trans('strings.label') !!}</th>
                            <th class="text-center">{!! trans('strings.is_active') !!}</th>
                            <th class="text-center">{!! trans('strings.created_at') !!}</th>
                            <th class="text-center">{!! trans('strings.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $value)
                            <tr>
                                <td class="text-center">{!! $value->name !!}</td>
                                <td class="text-center">{!! $value->label !!}</td>
                                <td class="text-center">
                                    @if($value->is_active == 1)
                                        <label class="control-label">
                                            <i class="fa fa-check"></i>
                                        </label>
                                    @else
                                        <label class="control-label">
                                            <i class="fa fa-times-circle-o"></i>
                                        </label>
                                    @endif
                                </td>
                                <td class="text-center">{!! format_datetimebr($value->created_at) !!}</td>
                                <th class="text-center">{!! $value->action_buttons !!}</th>
                            </tr>
                        @empty
                            <tr>
                                <td>Não foram encontrados resultados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection