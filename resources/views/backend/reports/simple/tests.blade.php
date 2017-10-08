@extends('layouts.backend.app')

@section ('title', trans('menus.reports.tests.index'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.evaluations') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    {{ trans('strings.dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('backend.reports.index') }}">
                    {{ trans('menus.reports.index') }}
                </a>
            </li>
            <li class="active">{{ trans('menus.reports.tests.index') }}</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Dados do Aluno</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('name', trans('strings.name').'.: ', ['class' => '']) !!}
                        {{ $user->name }}
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('email', trans('strings.email').'.: ', ['class' => '']) !!}
                        {{ $user->email }}
                    </h5>
                </div>
                @if($user->birth_date)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <h5 class="">
                            {!! Form::label('birth_date', trans('strings.birth_date').'.: ', ['class' => '']) !!}
                            {{ format($user->birth_date, 'd/m/Y') }}
                        </h5>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <h5 class="">
                            {!! Form::label('age', trans('strings.age').'.: ', ['class' => '']) !!}
                            {{ age($user->birth_date) }}
                        </h5>
                    </div>
                @endif
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('phone', trans('strings.phone').'.: ', ['class' => '']) !!}
                        {{ !is_null($user->phone) ? $user->phone : 'Não informado' }}
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">

                </div>
            </div>
        </div>
    </div>

    <?php $previous = previousTest($user->id); $current = currentTest($user->id);?>
    <div class="row">
        <div class="col-lg-6 col-xs-12 col-md-6 col-sm-12">
            @if(!is_null($previous))
                <h1 class="page-header">Dados Anterior - {{ !is_null($previous->validity) ? format($previous->validity, 'd/m/Y') : 'Sem limite'}}</h1>
                @include('backend.reports.includes.tests.mhf.previous')
            @else
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dados Anterior</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <h4 class="box-title">Não há registros anteriores</h4>
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            @endif
        </div>
        <div class="col-lg-6 col-xs-12 col-md-6 col-sm-12">
            @if(!is_null($current))
                <h1 class="page-header">Dados Atual - {{ !is_null($current->validity) ? format($current->validity, 'd/m/Y') : 'Sem limite'}}</h1>
                @include('backend.reports.includes.tests.mhf.current')
            @else
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dados Atual</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <h4 class="box-title">Não há registros anteriores</h4>
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            @endif
        </div>
    </div>



@endsection