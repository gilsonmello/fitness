@extends('layouts.backend.app')

@section ('title', trans('menus.permissions.index') . ' | ' . trans('menus.permissions.create'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.permissions') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    {{ trans('strings.dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('backend.permissions.index') }}">
                    {{ trans('menus.permissions.index') }}
                </a>
            </li>
            <li class="active">{{ trans('menus.permissions.create') }}</li>
        </ol>
    </section>
@endsection

@section('content')
{!! Form::open(['route' => 'backend.permissions.store', 'class' => '', 'role' => 'form', 'method' => 'post']) !!}
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('name', trans('strings.name').'*', ['class' => '']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('strings.name')]) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('formula', trans('strings.formula').'*', ['class' => '']) !!}
                        {!! Form::text('formula', null, ['class' => 'form-control', 'placeholder' => trans('strings.formula')]) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('measure_id', 'Medida *', ['class' => '']) !!}
                        {!! Form::select('measure_id', $measures->pluck('initials', 'id')->all(), NULL, ['witdh' => '100%', 'class' => 'select2 form-control', 'data-placeholder' => 'Medidas']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        {!! Form::label('description', trans('strings.description').'*', ['class' => '']) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-12">
                    <div class="form-group">
                        {!! Form::label('is_active', trans('strings.is_active').'*', ['class' => '']) !!}
                        {!! Form::checkbox('is_active', 1, true,['class' => 'form-control flat-red', 'placeholder' => trans('strings.title')]) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="pull-left">
                        <a href="{{route('backend.permissions.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
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