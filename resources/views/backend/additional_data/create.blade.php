@extends('layouts.backend.app')

@section ('title', trans('menus.additional_data.create'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('menus.additional_data.index') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    {{ trans('strings.dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('backend.additional_data.index') }}">
                    {{ trans('menus.additional_data.index') }}
                </a>
            </li>
            <li class="active">{{ trans('menus.additional_data.create') }}</li>
        </ol>
    </section>
@endsection

@section('content')
{!! Form::open(['route' => 'backend.additional_data.store', 'class' => '', 'role' => 'form', 'method' => 'post']) !!}
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('user_id', trans('strings.user_name').' *', ['class' => '']) !!}
                        {!! Form::select('user_id', $userWithTest->pluck('name', 'id')->all(), NULL, ['witdh' => '100%', 'class' => 'select2 form-control', 'data-placeholder' => trans('strings.user_name')]) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('name', trans('strings.name').'*', ['class' => '']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('strings.name')]) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label('initials', 'Sigla *', ['class' => '']) !!}
                        {!! Form::text('initials', null, ['class' => 'form-control', 'placeholder' => 'Sigla']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                        {!! Form::label('value', trans('strings.value').' *', ['class' => '']) !!}
                        {!! Form::text('value', null, ['class' => 'form-control decimal', 'placeholder' => trans('strings.value')]) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                        {!! Form::label('is_active', trans('strings.is_active').'*', ['class' => '']) !!}
                        <br>
                        {!! Form::checkbox('is_active', 1, true,['class' => 'form-control flat-red', 'placeholder' => trans('strings.title')]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
                    <div class="form-group">
                        {!! Form::label('description', trans('strings.description').'*', ['class' => '']) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="pull-left">
                        <a href="{{route('backend.additional_data.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
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