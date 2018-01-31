@section ('title', trans('menus.packages.index'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.packages') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}"><i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}</a>
            </li>
            <li>
                <a href="{{ route('backend.packages.index') }}">{{ trans('menus.packages.index') }}</a>
            </li>
            <li class="active">{{ trans('menus.packages.edit') }}</li>
        </ol>
    </section>
@endsection

@extends('layouts.backend.app')

@section('content')

{!! Form::model($package, ['route' => ['backend.packages.update', $package->id], 'class' => '', 'role' => 'form', 'method' => 'put', 'files' => true]) !!}
<div class="box box-primary">
    <div class="box-body">
        {!! Form::hidden('id', $package->id) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <div class="form-group">
                    {!! Form::label('name', trans('strings.name').' *', ['class' => '']) !!}
                    {!! Form::text('name', $package->name, ['class' => 'form-control title-has-slug', 'placeholder' => trans('strings.name')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                <div class="form-group">
                    {!! Form::label('slug', trans('strings.slug').' *', ['class' => '']) !!}
                    {!! Form::text('slug', $package->slug, ['class' => 'form-control slug-from-title', 'placeholder' => trans('strings.slug')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <div class="form-group">
                    {!! Form::label('is_active', trans('strings.is_active').'*', ['style' => 'display: block']) !!}
                    {!! Form::checkbox('is_active', 1, $package->is_active == 1 ? true : false, ['class' => 'form-control flat-red', 'placeholder' => trans('strings.title')]) !!}
                </div>
            </div>
        </div>
        <hr> 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    {!! Form::label('description', trans('strings.description').' *', ['class' => '']) !!}
                    {!! Form::textarea('description', $package->description, ['class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                </div>
            </div>
        </div>
        <hr> 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('validity', trans('strings.validity').'*', ['class' => '', 'title' => 'Informe a validade em número de dias', 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::text('validity', $package->validity, ['class' => 'form-control number', 'placeholder' => trans('strings.validity')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('value', trans('strings.value').'*', ['class' => '', 'title' => 'Preço do Pacote', 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::text('value', $package->value, ['class' => 'form-control money-br', 'placeholder' => trans('strings.value')]) !!}
                </div>
            </div>
        </div>
        <hr> 
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('begin_discount', trans('strings.begin_discount').' *', ['class' => '', 'title' => trans('strings.begin_discount'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::text('begin_discount', format($package->begin_discount, 'd/m/Y H:i'), ['class' => 'form-control datepicker', 'placeholder' => trans('strings.begin_discount')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('end_discount', trans('strings.end_discount').' *', ['class' => '', 'title' => trans('strings.end_discount'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::text('end_discount', format($package->end_discount, 'd/m/Y H:i'), ['class' => 'form-control datepicker', 'placeholder' => trans('strings.end_discount')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    {!! Form::label('value_discount', trans('strings.value_discount').' *', ['class' => '', 'title' => trans('strings.value_discount'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::text('value_discount', format($package->value_discount, 'd/m/Y H:i'), ['class' => 'form-control money-br', 'placeholder' => trans('strings.value_discount')]) !!}
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
                    <a href="{{ $package->img }}" target="_blank">
                        <img src="{{ $package->img }}" class="img-responsive">
                    </a>
                </div>
            </div>
        </div>
        <hr> 
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('img_discount', trans('strings.img_discount').' *', ['class' => '', 'title' => 'Selecione a imagem para a capa do pacote, caso esteja em promoção', 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::file('img_discount', ['placeholder' => trans('strings.img_discount'), 'accept' => "image/*"]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <a href="{{ $package->img_discount }}" target="_blank">
                        <img src="{{ $package->img_discount }}" class="img-responsive">
                    </a>
                </div>
            </div>
        </div> 
        <hr>       
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('meta_title', trans('strings.meta_title').' *', ['class' => '', 'title' => trans('strings.meta_title'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::textarea('meta_title', $package->meta_title, ['class' => 'form-control textarea', 'placeholder' => trans('strings.meta_title')]) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('meta_description', trans('strings.meta_description').' *', ['class' => '', 'title' => trans('strings.meta_description'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
                    {!! Form::textarea('meta_description', $package->meta_description, ['class' => 'form-control textarea', 'placeholder' => trans('strings.meta_description')]) !!}
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