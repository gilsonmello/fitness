@section ('title', trans('menus.users.index') . ' | ' . trans('menus.users.edit'))

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
            <li class="active">{{ trans('menus.users.edit') }}</li>
        </ol>
    </section>
@endsection

@extends('layouts.backend.app')

@section('content')
{!! Form::model($auth, ['route' => ['backend.auth.update', $auth->id], 'id' => 'backend-auth-update', 'role' => 'form', 'method' => 'put']) !!}
{!! Form::hidden('user_id', $auth->id) !!}
<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('name', trans('strings.name').'*', ['class' => '']) !!}
                    {!! Form::text('name', $auth->name, ['class' => 'form-control', 'placeholder' => trans('strings.name')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('email', trans('strings.email').'*', ['class' => '']) !!}
                    {!! Form::email('email', $auth->email, ['class' => 'form-control', 'placeholder' => trans('strings.email')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('password', trans('strings.password'), ['class' => '']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('strings.password')]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('cpf', trans('strings.cpf').'*', ['class' => '']) !!}
                    {!! Form::text('cpf', $auth->cpf, ['class' => 'cpf form-control', 'placeholder' => trans('strings.cpf')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('rg', trans('strings.rg').'*', ['class' => '']) !!}
                    {!! Form::text('rg', $auth->rg, ['class' => 'rg form-control', 'placeholder' => trans('strings.rg')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('birth_date', trans('strings.birth_date').'*', ['class' => '']) !!}
                    {!! Form::text('birth_date', !is_null($auth->birth_date) ? format($auth->birth_date, 'd/m/Y') : null, ['class' => 'birth_date form-control', 'placeholder' => trans('strings.birth_date')]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('role_id[]', trans('strings.profile').' *', ['class' => '']) !!}
                    {!! Form::select('role_id[]', $roles->pluck('label', 'id')->all(), $auth->roles->pluck('id')->all(), ['style' => 'width: 100%;','multiple' => 'multiple' ,'class' => 'select2', 'data-placeholder' => trans('strings.profile')]) !!}
                </div>
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('gender', trans('strings.gender'), ['class' => '']) !!}
                    {!! Form::select('gender', [0 => 'Masculino', 1 => 'Feminino'], $auth->gender, 
                        [
                            'style' => 'width: 100%;', 
                            'class' => 'select2', 
                            'placeholder' => trans('strings.gender')
                        ]) 
                    !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('phone', trans('strings.phone'), ['class' => '']) !!}
                    {!! Form::text('phone', $auth->phone, ['class' => 'phone form-control', 'placeholder' => trans('strings.phone')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('cell_phone', trans('strings.cell_phone'), ['class' => '']) !!}
                    {!! Form::text('cell_phone', $auth->cell_phone, ['class' => 'cell_phone form-control', 'placeholder' => trans('strings.cell_phone')]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('supplier_id[]', trans('strings.supplier'), ['class' => '']) !!}
                    {!! Form::select('supplier_id[]', $suppliers, $auth->suppliers->pluck('id')->all(), ['style' => 'width: 100%;', 'class' => 'select2', 'multiple' => 'multiple', 'data-placeholder' => trans('strings.supplier')]) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pull-left">
                    <a href="{{route('backend.auth.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
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