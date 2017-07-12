@extends('layouts.backend.app')

@section ('title', trans('menus.coupon_management') . ' | ' . trans('menus.create_coupon'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.questions') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    {{ trans('strings.dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('backend.questions.index') }}">
                    {{ trans('menus.questions.index') }}
                </a>
            </li>
            <li class="active">{{ trans('menus.questions.create') }}</li>
        </ol>
    </section>
@endsection

@section('content')
    {!! Form::open(['route' => 'backend.questions.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
        {!! csrf_field() !!}
        <hr>
        <div class="row">
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-1">
                {!! Form::label('title', trans('strings.title').'*', ['class' => '']) !!}
            </div>
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-11 pull-right">
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('strings.title')]) !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-1">
                {!! Form::label('note', trans('strings.note').'*', ['class' => '']) !!}
            </div>
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-11 pull-right">
                {!! Form::textarea('note', null, ['class' => 'form-control textarea', 'placeholder' => trans('strings.note')]) !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-1">
                {!! Form::label('group_question', trans('strings.group_question'), []) !!}
            </div>
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-11 pull-right">
                {!! Form::select('group_question[]', $groupQuestionsRepository->pluck('title', 'id')->all(), NULL, ['id' => 'group_question', 'witdh' => '100%', 'class' => 'select2 form-control', 'data-placeholder' => trans('strings.note'), 'multiple' => 'multiple']) !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1">
                {!! Form::label('is_active', trans('strings.is_active').'*', ['class' => '']) !!}
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-11 pull-right">
                <label>
                    {!! Form::checkbox('is_active', 1, true,['class' => 'form-control flat-red', 'placeholder' => trans('strings.title')]) !!}
                </label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pull-left">
                    <a href="{{route('backend.questions.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
                </div>
                <div class="pull-right">
                    <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

    {!! Form::close() !!}
@endsection