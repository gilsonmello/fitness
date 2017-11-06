@extends('layouts.backend.app')

@section ('title', trans('menus.diary_hours.create'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.diary_hours') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    {{ trans('strings.dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('backend.protocols.index') }}">
                    {{ trans('menus.diary_hours.index') }}
                </a>
            </li>
            <li class="active">{{ trans('menus.diary_hours.create') }}</li>
        </ol>
    </section>
@endsection

@section('content')
{!! Form::open(['route' => 'backend.diary_hours.store', 'class' => '', 'role' => 'form', 'method' => 'post']) !!}
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        {!! Form::label('diary_id', trans('strings.date').' *', ['class' => '']) !!}
                        <div class="input-group">
                            {!! Form::select('diary_id', $diaries->pluck('available_date', 'id')->all(), NULL, ['witdh' => '100%', 'class' => 'select2 form-control', 'data-placeholder' => 'Medidas']) !!}
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        {!! Form::label('hour', trans('strings.hour').' *', [])!!}
                        <div class="input-group bootstrap-timepicker timepicker">
                            {!! Form::text('available_hour', null, ['class' => 'form-control timepicker', 'placeholder' => trans('strings.hour')]) !!}
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-time"></i>
                            </div>
                        </div>
                      <!-- /.input group -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-12">
                    <div class="form-group">
                        {!! Form::label('is_active', trans('strings.is_active').' *', ['class' => '']) !!}
                        {!! Form::checkbox('is_active', 1, true,['class' => 'form-control flat-red', 'placeholder' => trans('strings.title')]) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="pull-left">
                        <a href="{{route('backend.diaries.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
                    </div>
                    <div class="pull-right">
                        <input type="submit" class="btn btn-primary" value="{{ trans('strings.save_button') }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
{!! Form::close() !!}
@endsection