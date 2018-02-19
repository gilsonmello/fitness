@extends('layouts.backend.app')

@section ('title', trans('menus.roles.index') . ' | ' . trans('menus.roles.create'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.roles') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    {{ trans('strings.dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('backend.roles.index') }}">
                    {{ trans('menus.roles.index') }}
                </a>
            </li>
            <li class="active">{{ trans('menus.roles.create') }}</li>
        </ol>
    </section>
@endsection

@section('content')
{!! Form::open(['route' => 'backend.roles.store', 'class' => '', 'role' => 'form', 'method' => 'post']) !!}
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="form-group">
                        {!! Form::label('name', trans('strings.name').' *', ['class' => '', 'title' => trans('menus.roles.tooltip.name'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => trans('strings.name')]) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="form-group">
                        {!! Form::label('label', trans('strings.label').' *', ['class' => '', 'title' => trans('menus.roles.tooltip.label'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                        {!! Form::text('label', old('title'), ['class' => 'form-control', 'placeholder' => trans('strings.label')]) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <div class="form-group">
                        {!! Form::label('is_active', trans('strings.is_active').' *', ['style' => 'display: block']) !!}
                        {!! Form::checkbox('is_active', 1, true, ['class' => 'form-control flat-red', 'placeholder' => trans('strings.title')]) !!}
                    </div>
                </div>
            </div>
            <hr>
            <div class="row permissions">
                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                    {!! Form::label('permission_id[]', trans('strings.permissions'), ['class' => '']) !!}
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <label class="cursor-pointer">
                        {{ trans('strings.check_all') }}
                        {!! Form::checkbox('all', '1', false, ['class' => '', 'id' => 'check-all']) !!}
                    </label>
                </div>
                @foreach($permissionModules as $key => $value)
                    <div class="col-xs-12 col-md-6 col-lg-6 col-sm-6">
                        <h4>{{ $value->name }}</h4>
                        @forelse($value->permissions as $permission)
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                                    @php
                                        $checked = false;
                                        if(is_array(old('permission_id'))) {
                                            $checked = in_array($permission->id, old('permission_id'));
                                        }
                                    @endphp
                                    <label style="font-weight: normal;" class="cursor-pointer">
                                        {!! Form::checkbox('permission_id[]', $permission->id, $checked, ['class' => 'flat-red']) !!}
                                        {!! $permission->label !!}
                                    </label>
                                </div>
                            </div>
                        @empty

                        @endforelse
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