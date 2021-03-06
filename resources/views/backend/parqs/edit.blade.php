@extends('layouts.backend.app')

@section ('title', trans('menus.coupon_management') . ' | ' . trans('menus.create_coupon'))

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.questions') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('backend.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    {{ trans('strings.dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('backend.parqs.index') }}">
                    {{ trans('menus.parqs.index') }}
                </a>
            </li>
            <li class="active">{{ trans('menus.parqs.create') }}</li>
        </ol>
    </section>
@endsection

@section('content')
    
    @can('backend.parqs.create')
    {!! Form::model($parq, ['route' => ['backend.parqs.update', $parq->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'put']) !!}
            {!! csrf_field() !!}
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-1">
                    {!! Form::label('user_id', trans('strings.users'), []) !!}
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-11 pull-right">
                    {!! Form::select('user_id', ['0' => 'Selecione o usuário'] + $users->pluck('name', 'id')->all(), $parq->user->id, ['id' => 'user_id', 'witdh' => '100%', 'class' => 'select2 form-control', 'data-placeholder' => trans('strings.users'), ]) !!}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-1">
                    {!! Form::label('question_group_id', trans('strings.question_group'), []) !!}
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-11 pull-right">
                    {!! Form::select('question_group_id', ['0' => 'Selecione o grupo de questão'] + $groupQuestions->pluck('title', 'id')->all(), $parq->questionGroup->id, ['id' => 'question_group_id', 'witdh' => '100%', 'class' => 'select2 form-control', 'data-placeholder' => trans('strings.users'), ]) !!}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="pull-left">
                        <a href="{{route('backend.parqs.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
                    </div>
                    <div class="pull-right">
                        <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

        {!! Form::close() !!}


    @endcan
@endsection