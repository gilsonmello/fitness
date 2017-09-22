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
                <a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}</a>
            </li>
            <li>
                <a href="{{ route('backend.additional_data.index') }}">{{ trans('menus.additional_data.index') }}</a>
            </li>
            <li class="active">{{ trans('menus.additional_data.edit') }}</li>
        </ol>
    </section>
@endsection

@extends('layouts.backend.app')

@section('content')

{!! Form::model($additionalData, ['route' => ['backend.additional_data.update', $additionalData->id], 'class' => '', 'role' => 'form', 'method' => 'put']) !!}
<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('user_id', trans('strings.user_name').' *', ['class' => '']) !!}
                    {!! Form::select('user_id', $userWithTest->pluck('name', 'id')->all(), $additionalData->evaluation->user->id, ['witdh' => '100%', 'class' => 'create-additional-data-user form-control', 'data-placeholder' => trans('strings.user_name')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('evaluation_id', 'Data de criação da Avaliação *', ['class' => '']) !!}
                    <select name="evaluation_id" class="additional-data-evaluations form-control">
                        @foreach($evaluations->pluck('created_at', 'id')->all() as $key => $value)
                            @if($key == $additionalData->evaluation->id)
                                <option value="{!! $key !!}" selected="selected">{!! format($value, 'd/m/Y H:i') !!}</option>
                            @else
                                <option value="{!! $key !!}" >{!! format($value, 'd/m/Y H:i') !!}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('name', trans('strings.name').'*', ['class' => '']) !!}
                    {!! Form::text('name', $additionalData->name, ['class' => 'form-control', 'placeholder' => trans('strings.name')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('initials', 'Sigla *', ['class' => '']) !!}
                    {!! Form::text('initials', $additionalData->initials, ['class' => 'form-control', 'placeholder' => 'Sigla']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    {!! Form::label('value', trans('strings.value'), ['class' => '']) !!}
                    {!! Form::text('value', $additionalData->value, ['class' => 'form-control decimal', 'placeholder' => trans('strings.value')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                <div class="form-group">
                    {!! Form::label('is_active', trans('strings.is_active').'*', ['class' => '']) !!}
                    <br>
                    {!! Form::checkbox('is_active', 1, $additionalData->is_active == 1 ? true : false,['class' => 'form-control flat-red', 'placeholder' => trans('strings.title')]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    {!! Form::label('description', trans('strings.description').'*', ['class' => '']) !!}
                    {!! Form::textarea('description', $additionalData->description, ['class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pull-left">
                    <a href="{{route('backend.protocols.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
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