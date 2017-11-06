@section ('title', trans('menus.protocols.index'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.diaries') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}</a>
            </li>
            <li>
                <a href="{{ route('backend.diaries.index') }}">{{ trans('menus.diaries.index') }}</a>
            </li>
            <li class="active">{{ trans('menus.diaries.edit') }}</li>
        </ol>
    </section>
@endsection

@extends('layouts.backend.app')

@section('content')

{!! Form::model($diary, ['route' => ['backend.diaries.update', $diary->id], 'class' => '', 'role' => 'form', 'method' => 'put']) !!}
<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('supplier_id', trans('strings.suppliers').' *', ['class' => '']) !!}
                    {!! Form::select('supplier_id', $suppliers->pluck('name', 'id')->all(), $diary->supplier->id, ['witdh' => '100%', 'class' => 'select2 form-control', 'data-placeholder' => 'Medidas']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('available_date', trans('strings.available_date').' *', ['class' => '']) !!}
                    {!! Form::text('available_date', format($diary->available_date, 'd/m/Y'), ['class' => 'datepicker form-control', 'placeholder' => trans('strings.available_date')]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    {!! Form::label('description', trans('strings.description').'*', ['class' => '']) !!}
                    {!! Form::textarea('description', $diary->description, ['class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-12">
                <div class="form-group">
                    {!! Form::label('is_active', trans('strings.is_active').'*', ['class' => '']) !!}
                    {!! Form::checkbox('is_active', 1, $diary->is_active == 1 ? true : false,['class' => 'form-control flat-red', 'placeholder' => trans('strings.title')]) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pull-left">
                    <a href="{{route('backend.diaries.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
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