@extends('layouts.backend.app')

@section ('title', trans('menus.packages.index') . ' | ' . trans('menus.packages.create'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.packages') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    {{ trans('strings.dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('backend.packages.index') }}">
                    {{ trans('menus.packages.index') }}
                </a>
            </li>
            <li class="active">{{ trans('menus.packages.create') }}</li>
        </ol>
    </section>
@endsection

@section('content')
{!! Form::open(['route' => 'backend.packages.store', 'class' => '', 'role' => 'form', 'method' => 'post', 'files' => true]) !!}
    <div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <div class="form-group">
                    {!! Form::label('name', trans('strings.name').' *', ['class' => '', 'data-html' => true, 'title' => '* -> Campo Obrigatório', 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control title-has-slug', 'placeholder' => trans('strings.name')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <div class="form-group">
                    {!! Form::label('slug', trans('strings.slug').' *', ['class' => '']) !!}
                    {!! Form::text('slug', old('slug'), ['class' => 'form-control slug-from-title', 'placeholder' => trans('strings.slug')]) !!}
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
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('category_id[]', trans('strings.categories').' *', ['class' => '']) !!}
                    {!! Form::select('category_id[]', $categories, old('category_id'), 
                        [
                            'style' => 'width: 100%;', 
                            'class' => 'select2', 
                            'multiple' => 'multiple',
                            'data-placeholder' => trans('strings.categories')
                        ]) 
                    !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('tag_id[]', trans('strings.tags'), ['class' => '']) !!}
                    {!! Form::select('tag_id[]', $tags, old('tag_id'), 
                        [
                            'style' => 'width: 100%;', 
                            'class' => 'select2', 
                            'multiple' => 'multiple',
                            'data-placeholder' => trans('strings.tags')
                        ]) 
                    !!}
                </div>
            </div>
        </div>
        <hr> 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    {!! Form::label('description', trans('strings.description').' *', ['class' => '']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                </div>
            </div>
        </div>
        <hr> 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('validity', trans('strings.validity').' *', ['class' => '', 'title' => 'Informe a validade em número de dias', 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::text('validity', old('validity'), ['class' => 'form-control number', 'placeholder' => trans('strings.validity')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('value', trans('strings.value').' *', ['class' => '', 'title' => 'Preço do Pacote', 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::text('value', old('value'), ['class' => 'form-control money-br', 'placeholder' => trans('strings.value')]) !!}
                </div>
            </div>
        </div>
        <hr> 
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('begin_discount', trans('strings.begin_discount'), ['class' => '', 'title' => trans('strings.begin_discount'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::text('begin_discount', format(old('begin_discount'), 'd/m/Y H:i'), ['class' => 'form-control datepicker', 'placeholder' => trans('strings.begin_discount')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('end_discount', trans('strings.end_discount'), ['class' => '', 'title' => trans('strings.end_discount'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::text('end_discount', format(old('end_discount'), 'd/m/Y H:i'), ['class' => 'form-control datepicker', 'placeholder' => trans('strings.end_discount')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('value_discount', trans('strings.value_discount'), ['class' => '', 'title' => trans('strings.value_discount'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::text('value_discount', format(old('value_discount'), 'd/m/Y H:i'), ['class' => 'form-control money-br', 'placeholder' => trans('strings.value_discount')]) !!}
                </div>
            </div>
        </div>
        <hr> 
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('img', trans('strings.image').' *', ['class' => '', 'title' => 'Selecione a imagem para a capa do pacote', 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::file('img', ['placeholder' => trans('strings.image'), 'accept' => "image/*"]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('img_discount', trans('strings.img_discount'), ['class' => '', 'title' => 'Selecione a imagem para a capa do pacote, caso esteja em promoção', 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::file('img_discount', ['placeholder' => trans('strings.img_discount'), 'accept' => "image/*"]) !!}
                </div>
            </div>
        </div>
        <hr>       
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('meta_title', trans('strings.meta_title'), ['class' => '', 'title' => trans('strings.meta_title'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::textarea('meta_title', old('meta_title'), ['class' => 'form-control textarea', 'placeholder' => trans('strings.meta_title')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('meta_description', trans('strings.meta_description'), ['class' => '', 'title' => trans('strings.meta_description'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control textarea', 'placeholder' => trans('strings.meta_description')]) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pull-left">
                    <a href="{{route('backend.packages.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
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