@section ('title', trans('menus.categories.edit'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.categories') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}</a>
            </li>
            <li>
                <a href="{{ route('backend.categories.index') }}">{{ trans('menus.categories.index') }}</a>
            </li>
            <li class="active">{{ trans('menus.categories.edit') }}</li>
        </ol>
    </section>
@endsection

@extends('layouts.backend.app')

@section('content')

{!! Form::model($category, ['route' => ['backend.categories.update', $category->id], 'class' => '', 'role' => 'form', 'method' => 'put']) !!}
<div class="box box-primary">
    <div class="box-body">
        {!! Form::hidden('id', $category->id) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <div class="form-group">
                    {!! Form::label('name', trans('strings.name').' *', ['class' => '']) !!}
                    {!! Form::text('name', $category->name, ['class' => 'form-control title-has-slug', 'placeholder' => trans('strings.name')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <div class="form-group">
                    {!! Form::label('slug', trans('strings.slug').' *', ['class' => '']) !!}
                    {!! Form::text('slug', $category->slug, ['class' => 'form-control slug-from-title', 'placeholder' => trans('strings.slug')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <div class="form-group">
                    {!! Form::label('is_active', trans('strings.is_active').'*', ['style' => 'display: block']) !!}
                    {!! Form::checkbox('is_active', 1, $category->is_active == 1 ? true : false, ['class' => 'form-control flat-red', 'placeholder' => trans('strings.title')]) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pull-left">
                    <a href="{{route('backend.categories.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
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