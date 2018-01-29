@section ('title', trans('menus.permissions.index'))

@section('content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ trans('strings.manager') }}
        <small>{{ trans('strings.permissions') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('backend.dashboard')}}"><i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}</a></li>
        <li class="active">{{ trans('menus.permissions.index') }}</li>
    </ol>
</section>
@endsection

@extends('layouts.backend.app')

@section('content')
<div class="pull-right" style="margin-bottom:10px">
    <a href="{{ route('backend.permissions.create') }}" class="btn btn-primary btn-xs">
        {{ trans('menus.permissions.create') }}
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
    {!! Form::open(array('route' => array('backend.permissions.index'), 'class' => '', 'method' => 'get'))  !!}
        <div class="box-body">
            <div class="row">
                {!! Form::hidden('f_submit', '1') !!}
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <div class="form-group">
                        {!! Form::label('PermissionController@index:name',  trans('strings.name'), ['class' => '']) !!}
                        {!! Form::text('PermissionController@index:name', $name, ['class' => 'form-control']  ) !!}
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <div class="form-group">
                        {!! Form::label('PermissionController@index:formula',  trans('strings.formula'), ['class' => '']) !!}
                        {!! Form::text('PermissionController@index:formula', $formula, ['class' => 'form-control']  ) !!}
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
                <table id="example2" cellspacing="0" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>{!! trans('strings.title') !!}</th>
                            <th>{!! trans('strings.formula') !!}</th>
                            <th>{!! trans('strings.created_at') !!}</th>
                            <th>{!! trans('strings.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($permissions as $value)
                            <tr>
                                <td>{!! $value->name !!}</td>
                                <td>{!! $value->formula !!}</td>
                                <td>{!! format_datetimebr($value->created_at) !!}</td>
                                <th>{!! $value->action_buttons !!}</th>
                            </tr>
                        @empty
                            Vazio
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>{!! trans('strings.title') !!}</th>
                            <th>{!! trans('strings.formula') !!}</th>
                            <th>{!! trans('strings.created_at') !!}</th>
                            <th>{!! trans('strings.actions') !!}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection