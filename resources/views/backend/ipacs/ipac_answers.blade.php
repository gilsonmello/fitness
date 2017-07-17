@extends('layouts.backend.app')

@section ('title', trans('menus.coupon_management') . ' | ' . trans('menus.create_coupon'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.ipacs.answer') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    {{ trans('strings.dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('backend.ipacs.index') }}">
                    {{ trans('menus.ipacs.index') }}
                </a>
            </li>
            <li class="active">{{ trans('menus.ipacs.answer') }}</li>
        </ol>
    </section>
@endsection

@section('content')
    
    @can('backend.ipacs.create')
    {!! Form::open(['route' => ['backend.ipacs.update_ipac_answers', $ipac->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT']) !!}
        <hr>
        <div class="box">
            <div class="box-header with-border">
                <h3 class=" text-center">
                    PAR Q*
                    <br>
                    Physical Activity Readiness Questionnarie
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <em><h4>Este questionário tem objetivo de identificar a necessidade de avaliação clínica antes do início da atividade física. Caso você marque mais de um sim, é aconselhável a realização da avaliação clínica. Contudo, qualquer pessoa pode participar de uma atividade física de esforço moderado, respeitando as restrições médicas.</h4></em>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h4>Por favor, assinale “sim” ou “não” as seguintes perguntas:</h4>
                    </div>
                </div>
                <br>
                <?php $count = 1; ?>
                @foreach($ipac->ipacAnswers as $value)
                    @if(!is_null($value->question))
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h5>{!! $count.') '. strip_tags($value->question->note) !!}</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                {!! Form::radio('question_id_'.$value->question->id.'[answer_'.$value->question->id.']', '1', !is_null($value->option_answer) ? true : false, ['class' => 'flat-red answer-yes-click']) !!}
                                {!! Form::label('answer_'.$value->question->id.'', trans('strings.yes')) !!}
                                {!! Form::radio('question_id_'.$value->question->id.'[answer_'.$value->question->id.']', '0', is_null($value->option_answer) ? true : false, ['class' => 'flat-red']) !!}
                                {!! Form::label('answer_'.$value->question->id.'', trans('strings.no')) !!}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 answer-yes {{ !is_null($value->option_answer) ? "editor-active" : "" }}">
                                <br>
                                {!! Form::textarea('question_id_'.$value->question->id.'[option_answer_'.$value->question->id.']', $value->option_answer, ['style' => 'width: 100%','class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                            </div>
                        </div>
                        <br>
                        <?php $count++; ?>
                    @endif
                @endforeach
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="pull-left">
                            <a href="{{ route('backend.ipacs.index') }}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
                        </div>
                        <div class="pull-right">
                            <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        {!! Form::close() !!}
    @endcan
@endsection