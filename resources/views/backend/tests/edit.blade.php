@extends('layouts.backend.app')

@section ('title', trans('menus.tests.index') . ' | ' . trans('menus.tests.edit'))

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
                <a href="{{ route('backend.evaluations.index') }}">
                    {{ trans('menus.evaluations.index') }}
                </a>
            </li>
            <li class="active">{{ trans('menus.evaluations.edit') }}</li>
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
                        {{ $test->evaluation->user->name }}
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('email', trans('strings.email').'.: ', ['class' => '']) !!}
                        {{ $test->evaluation->user->email }}
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('birth_date', trans('strings.birth_date').'.: ', ['class' => '']) !!}
                        {{ format($test->evaluation->user->birth_date, 'd/m/Y') }}
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('age', trans('strings.age').'.: ', ['class' => '']) !!}
                        {{ age($test->evaluation->user->birth_date) }}
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('phone', trans('strings.phone').'.: ', ['class' => '']) !!}
                        {{ !is_null($test->evaluation->user->phone) ? $test->evaluation->user->phone : 'Não informado' }}
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <button data-toggle="modal" data-target="#modal_additional_data" class="btn btn-block btn-info">
                        Dados Adicionais <i class="fa fa-arrow-circle-right"></i>
                    </button>
                    {{-- ao clicar no botão irá abrir o #modal_additional_data --}}
                    @include('backend.tests.additional_data.all')
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Todos os Testes</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-4 col-xs-12 col-md-4 col-sm-6">
                        @include('backend.tests.frequencia_cardiaca.frequencia_cardiaca')
                    </div>
                    <div class="col-lg-4 col-xs-12 col-md-4 col-sm-6">
                        @include('backend.tests.vo2.vo2')
                    </div>
                    <div class="col-lg-4 col-xs-12 col-md-4 col-sm-6">
                        @include('backend.tests.resistances.resistance')
                    </div>
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var test_id = '{{$test->id}}';
    </script>


@endsection