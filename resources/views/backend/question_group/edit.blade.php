@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.questions') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}</a>
            </li>
            <li>
                <a href="{{ route('backend.question_group.index') }}">{{ trans('menus.questions.index') }}</a>
            </li>
            <li class="active">{{ trans('menus.questions.edit') }}</li>
        </ol>
    </section>
@endsection

@extends('layouts.backend.app')

@section('content')

{!! Form::model($groupQuestion, ['route' => ['backend.question_group.update', $groupQuestion->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'put']) !!}
    <hr>
    <div class="row">
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-1">
            {!! Form::label('title', trans('strings.title').'*', ['class' => '']) !!}
        </div>
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-11 pull-right">
            {!! Form::text('title', $groupQuestion->title, ['class' => 'form-control', 'placeholder' => trans('strings.title')]) !!}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-1">
            {!! Form::label('description', trans('strings.description').'*', ['class' => '']) !!}
        </div>
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-11 pull-right">
            {!! Form::textarea('description', $groupQuestion->description, ['style' => 'width: 100%','class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1">
            {!! Form::label('is_active', trans('strings.is_active').'*', ['class' => '']) !!}
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-11 pull-right">
            <label>
                {!! Form::checkbox('is_active', $groupQuestion->is_active == 1 ? 1 : 0, $groupQuestion->is_active == 1 ? true : false,['class' => 'form-control flat-red', 'placeholder' => trans('strings.title')]) !!}
            </label>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="pull-left">
                <a href="{{route('backend.question_group.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
            </div>
            <div class="pull-right">
                <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
{!! Form::close() !!}
@endsection