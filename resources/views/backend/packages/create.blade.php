@extends('layouts.backend.app')

@section ('title', trans('menus.packages.index') . ' | ' . trans('menus.packages.create'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.packages') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    {{ trans('strings.dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('backend.packages.index') }}">
                    {{ trans('menus.packages.index') }}
                </a>
            </li>
            <li class="active">{{ trans('menus.packages.create') }}</li>
        </ol>
    </section>
@endsection

@section('content')
{!! Form::open(['route' => 'backend.packages.store', 'class' => '', 'role' => 'form', 'method' => 'post']) !!}
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('name', trans('strings.name').'*', ['class' => '']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control title-has-slug', 'placeholder' => trans('strings.name')]) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('slug', trans('strings.slug').'*', ['class' => '']) !!}
                        {!! Form::text('slug', null, ['class' => 'form-control slug-from-title', 'placeholder' => trans('strings.slug')]) !!}
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
                        <a href="{{route('backend.packages.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
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