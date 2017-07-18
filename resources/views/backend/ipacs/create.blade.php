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
                <a href="{{ route('backend.question_group.index') }}">
                    {{ trans('menus.questions.index') }}
                </a>
            </li>
            <li class="active">{{ trans('menus.questions.create') }}</li>
        </ol>
    </section>
@endsection

@section('content')
    
    @can('backend.ipacs.create')
        {!! Form::open(['route' => 'backend.ipacs.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
            {!! csrf_field() !!}
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-1">
                    {!! Form::label('user_id', trans('strings.users'), []) !!}
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-11 pull-right">
                    {!! Form::select('user_id', ['0' => 'Selecione o usuário'] + $users->pluck('name', 'id')->all(), NULL, ['id' => 'user_id', 'witdh' => '100%', 'class' => 'select2 form-control', 'data-placeholder' => trans('strings.users'), ]) !!}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-1">
                    {!! Form::label('question_group_id', trans('strings.question_group'), []) !!}
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-11 pull-right">
                    {!! Form::select('question_group_id', ['0' => 'Selecione o grupo de questão'] + $questionGroup->pluck('title', 'id')->all(), NULL, ['id' => 'question_group_id', 'witdh' => '100%', 'class' => 'select2 form-control', 'data-placeholder' => trans('strings.users'), ]) !!}
                </div>
            </div>
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
    <div class="row">
        <div class="col-md-6">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <b>How to use:</b>

                        <p>Exactly like the original bootstrap tabs except you should use
                            the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                        A wonderful serenity has taken possession of my entire soul,
                        like these sweet mornings of spring which I enjoy with my whole heart.
                        I am alone, and feel the charm of existence in this spot,
                        which was created for the bliss of souls like mine. I am so happy,
                        my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                        that I neglect my talents. I should be incapable of drawing a single stroke
                        at the present moment; and yet I feel that I never was a greater artist than now.
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        The European languages are members of the same family. Their separate existence is a myth.
                        For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                        in their grammar, their pronunciation and their most common words. Everyone realizes why a
                        new common language would be desirable: one could refuse to pay expensive translators. To
                        achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                        words. If several languages coalesce, the grammar of the resulting language is more simple
                        and regular than that of the individual languages.
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                        like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
@endsection