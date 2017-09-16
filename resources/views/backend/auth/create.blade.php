@section ('title', trans('menus.users.index') . ' | ' . trans('menus.users.create'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.users') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}</a>
            </li>
            <li>
                <a href="{{ route('backend.auth.index') }}">{{ trans('menus.users.index') }}</a>
            </li>
            <li class="active">{{ trans('menus.users.create') }}</li>
        </ol>
    </section>
@endsection

@extends('layouts.backend.app')

@section('content')

{!! Form::open(['route' => 'backend.auth.store', 'class' => '', 'id' => 'backend-auth-store', 'role' => 'form', 'method' => 'post']) !!}
<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('name', trans('strings.name').' *', ['class' => '']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('strings.name')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('email', trans('strings.email').' *', ['class' => '']) !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('strings.email')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('password', trans('strings.password').' *', ['class' => '']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('strings.password')]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('cpf', trans('strings.cpf').' *', ['class' => '']) !!}
                    {!! Form::text('cpf', null, ['class' => 'cpf form-control', 'placeholder' => trans('strings.cpf')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('rg', trans('strings.rg').' *', ['class' => '']) !!}
                    {!! Form::text('rg', null, ['class' => 'rg form-control', 'placeholder' => trans('strings.rg')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('birth_date', trans('strings.birth_date').'*', ['class' => '']) !!}
                    {!! Form::text('birth_date', null, ['class' => 'birth_date form-control', 'placeholder' => trans('strings.birth_date')]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('role_id[]', trans('strings.profile').' *', ['class' => '']) !!}
                    {!! Form::select('role_id[]', $roles->pluck('label', 'id')->all(), NULL, ['style' => 'width: 100%;','multiple' => 'multiple' ,'class' => 'select2', 'data-placeholder' => trans('strings.profile')]) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pull-left">
                    <a href="{{route('backend.dashboard')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
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