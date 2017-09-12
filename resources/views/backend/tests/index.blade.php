@section ('title', trans('menus.tests.index'))

@section('content_header')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ trans('strings.manager') }}
            <small>{{ trans('strings.tests') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('backend.dashboard')}}"><i class="fa fa-dashboard"></i> {{ trans('strings.dashboard') }}</a></li>
            <li class="active">{{ trans('menus.tests.index') }}</li>
        </ol>
</section>
@endsection

@extends('layouts.backend.app')

@section('content')


    <div class="pull-right" style="margin-bottom:10px">
        <a href="{{ route('backend.tests.create') }}" class="btn btn-primary btn-xs">
            {{ trans('menus.tests.create') }}
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
        {!! Form::open(['route' => ['backend.tests.index'], 'class' => 'form-horizontal', 'method' => 'get'])  !!}
        <div class="box-body">
            <div class="row">
                {!! Form::hidden('f_submit', '1') !!}
                {!! Form::label('TestController@index:title',  trans('strings.title'), ['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::text('TestController@index:title', null, ['class' => 'form-control']  ) !!}
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
                            <th>{!! trans('strings.user_name') !!}</th>
                            <th>{!! trans('strings.validity') !!}</th>
                            <th>{!! trans('strings.created_at') !!}</th>
                            <th>{!! trans('strings.actions') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($tests as $value)
                                <tr>
                                    <td>{!! $value->user->name !!}</td>
                                    <td>{!! format_datetimebr($value->validity) !!}</td>
                                    <td>{!! format_datetimebr($value->created_at) !!}</td>
                                    <td>{!! $value->action_buttons !!}</td>
                                </tr>
                            @empty
                                Vazio
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{!! trans('strings.user_name') !!}</th>
                                <th>{!! trans('strings.validity') !!}</th>
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