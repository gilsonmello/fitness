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
                        Oi
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('birth_date', trans('strings.birth_date').'.: ', ['class' => '']) !!}
                        31/12/1994
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('age', trans('strings.age').'.: ', ['class' => '']) !!}
                        22
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('phone', trans('strings.phone').'.: ', ['class' => '']) !!}
                        (71) 9 9714-3703
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('email', trans('strings.email').'.: ', ['class' => '']) !!}
                        Oi
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-6 col-sm-12">
            @include('backend.tests.frequencia_cardiaca.frequencia_cardiaca')
        </div><!-- /.col -->
        <div class="col-md-12 col-xs-12 col-lg-6 col-sm-12">
            @include('backend.tests.vo2.vo2')
        </div><!-- /.col -->
    </div>
    <!-- /.row -->

    <script type="text/javascript">
        var test_id = '{{$test->id}}';
    </script>
@endsection