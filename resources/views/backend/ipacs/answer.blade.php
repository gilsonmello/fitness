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
    {!! Form::open(['route' => ['backend.ipacs.answer', $ipac->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'put']) !!}
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-1">
                    {!! Form::label('user_id', trans('strings.name'), []) !!}
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-11 pull-right">
                    {!! Form::text('user_id', $ipac->user->name, ['readonly' => 'readonly', 'class' => 'form-control', 'placeholder' => trans('strings.title')]) !!}
                </div>
            </div>
            <br>
            <?php dd($ipac->questionGroup->questions);?>
            @foreach($ipac->questionGroup->questions as $questions)
                <div class="row">
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-1">
                        {!! Form::label('question_group_id', trans('strings.question_group'), []) !!}
                    </div>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-11 pull-right">
                        {!! Form::text('user_id', $questions->description, ['readonly' => 'readonly', 'class' => 'form-control', 'placeholder' => trans('strings.title')]) !!}
                    </div>
                </div>
            @endforeach
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="pull-left">
                        <a href="{{route('backend.ipacs.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
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