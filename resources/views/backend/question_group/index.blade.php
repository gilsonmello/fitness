@section('content_header')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.questions') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}</a></li>
            <li class="active">{{ trans('menus.questions.index') }}</li>
        </ol>
</section>
@endsection

@extends('layouts.backend.app')

@section('content')


    <div class="pull-right" style="margin-bottom:10px">
        <a href="{{ route('backend.question_group.create') }}" class="btn btn-primary btn-xs">
            {{ trans('menus.question_group.create') }}
        </a>
        {{--<a href="{{route('admin.coupons.import')}}" class="btn btn-primary btn-xs">--}}
        {{--{{ trans('menus.import_coupon') }}--}}
        {{--</a>--}}
    </div>
    <div class="clearfix"></div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('strings.filter') }}</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        {!! Form::open(['route' => ['backend.question_group.index'], 'class' => 'form-horizontal', 'method' => 'get'])  !!}
        <div class="box-body">
            <div class="row">
                {!! Form::hidden('f_submit', '1') !!}
                {!! Form::label('QuestionGroupController@index:title',  trans('strings.title'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('QuestionGroupController@index:title', !is_null($title) && isset($title) ? $title : '', ['class' => 'form-control']  ) !!}
                </div>
            </div>
        </div>
        <div class="box-footer">
            {!! Form::submit( trans('strings.search'), ['class' => 'btn btn-primary btn-xs']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" cellspacing="0" class="table table-bordered table-hover data-table">
                        <thead>
                        <tr>
                            <th>{!! trans('strings.title') !!}</th>
                            <th>{!! trans('strings.description') !!}</th>
                            <th>{!! trans('strings.created_at') !!}</th>
                            <th>{!! trans('strings.actions') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @can('backend.question_group.index', $results)
                                @forelse($results as $value)
                                <tr>
                                    <td>{!! $value->title !!}</td>
                                    <td>{!! $value->description !!}</td>
                                    <td>{!! $value->created_at !!}</td>
                                    <th>{!! $value->action_buttons !!}</th>
                                </tr>
                                @empty
                                    Vazio
                                @endforelse
                            @endcan
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{!! trans('strings.title') !!}</th>
                                <th>{!! trans('strings.description') !!}</th>
                                <th>{!! trans('strings.created_at') !!}</th>
                                <th>{!! trans('strings.actions') !!}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection