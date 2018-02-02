@extends('layouts.backend.app')

@section ('title', trans('menus.categories.index'))

@section('content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ trans('strings.manager') }}
        <small>{{ trans('strings.categories') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('backend.dashboard')}}"><i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}</a></li>
        <li class="active">{{ trans('menus.categories.index') }}</li>
    </ol>
</section>
@endsection

@section('content')
<div class="pull-right" style="margin-bottom:10px">
    <a href="{{ route('backend.categories.create') }}" class="btn btn-primary btn-xs">
        {{ trans('menus.categories.create') }}
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
    {!! Form::open(array('route' => array('backend.categories.index'), 'class' => '', 'method' => 'get'))  !!}
        <div class="box-body">
            <div class="row">
                {!! Form::hidden('f_submit', '1') !!}
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <div class="form-group">
                        {!! Form::label('Backend/CategoryController@index:name',  trans('strings.name'), ['class' => '']) !!}
                        {!! Form::text('Backend/CategoryController@index:name', $name, ['class' => 'form-control']  ) !!}
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                    <div class="form-group">
                        {!! Form::label('Backend/CategoryController@index:slug',  trans('strings.slug'), ['class' => '']) !!}
                        {!! Form::text('Backend/CategoryController@index:slug', $slug, ['class' => 'form-control']  ) !!}
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
            <div class="box-body content-to-be-update">
                <table cellspacing="0" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>{!! trans('strings.title') !!}</th>
                            <th>{!! trans('strings.slug') !!}</th>
                            <th>{!! trans('strings.created_at') !!}</th>
                            <th>{!! trans('strings.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $key => $value)
                            <tr>
                                <td>{!! $value->name !!}</td>      
                                <td>{!! $value->slug !!}</td>                                
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
                            <th>{!! trans('strings.slug') !!}</th>
                            <th>{!! trans('strings.created_at') !!}</th>
                            <th>{!! trans('strings.actions') !!}</th>
                        </tr>
                    </tfoot>
                </table>           
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="pull-left">
                            <br>
                            <label>{{ trans('menus.categories.total') }}.: {!! $categories->total() !!}</label>
                        </div>
                        <div class="pull-right">
                            {!! $categories->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection