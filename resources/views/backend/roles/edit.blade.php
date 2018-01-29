@section ('title', trans('menus.roles.index'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.roles') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}</a>
            </li>
            <li>
                <a href="{{ route('backend.roles.index') }}">{{ trans('menus.questions.index') }}</a>
            </li>
            <li class="active">{{ trans('menus.roles.edit') }}</li>
        </ol>
    </section>
@endsection

@extends('layouts.backend.app')

@section('content')

{!! Form::model($role, ['route' => ['backend.roles.update', $role->id], 'class' => '', 'role' => 'form', 'method' => 'put']) !!}
<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <div class="form-group">
                    {!! Form::label('name', trans('strings.name').' *', ['class' => '', 'title' => trans('menus.roles.tooltip.name'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::text('name', $role->name, ['class' => 'form-control', 'placeholder' => trans('strings.name')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <div class="form-group">
                    {!! Form::label('label', trans('strings.label').' *', ['class' => '', 'title' => trans('menus.roles.tooltip.label'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::text('label', $role->label, ['class' => 'form-control', 'placeholder' => trans('strings.label')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <div class="form-group">
                    {!! Form::label('is_active', trans('strings.is_active').'*', ['style' => 'display: block']) !!}
                    {!! Form::checkbox('is_active', 1, $role->is_active == 1 ? true : false, ['class' => 'form-control flat-red', 'placeholder' => trans('strings.title')]) !!}
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                {!! Form::label('permission_id[]', trans('strings.permissions').' *', ['class' => '']) !!}
            </div>
            @foreach($permissions as $key => $value)
                <div class="col-xs-12 col-md-4 col-lg-4 col-sm-4">
                    <label class="cursor-pointer">
                        @if($role->permissions->contains('id', $value->id))
                            <input type="checkbox" name="permission_id[]" checked="checked" value="{!! $value->id !!}">
                        @else
                            <input type="checkbox" name="permission_id[]" value="{!! $value->id !!}">
                        @endif
                        {!! $value->label !!}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pull-left">
                    <a href="{{ route('backend.roles.index') }}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
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