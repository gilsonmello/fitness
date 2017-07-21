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
    
    {{--@can('backend.parqs.create')
        {!! Form::open(['route' => 'backend.parqs.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
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
                        <a href="{{route('backend.parqs.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
                    </div>
                    <div class="pull-right">
                        <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

        {!! Form::close() !!}
    @endcan--}}
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab">Antropometria</a>
                    </li>
                    <li>
                        <a href="#tab_2" data-toggle="tab">Resistência</a>
                    </li>
                    <li>
                        <a href="#tab_3" data-toggle="tab">Flexibilidade</a>
                    </li>
                </ul>

                <div class="tab-content">
                    {{-- Tab Antropometria --}}
                    <div class="tab-pane active" id="tab_1">

                        {{-- Tabs secundárias de Antropometria --}}
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_peso_e_altura" data-toggle="tab">Peso e Altura</a>
                                </li>
                                <li>
                                    <a href="#tab_perimetros_circuferencias" data-toggle="tab">Perímetros / Circuferências</a>
                                </li>
                                <li>
                                    <a href="#tab_diametro_osseos" data-toggle="tab">Diâmetro Ósseos</a>
                                </li>
                                <li>
                                    <a href="#tab_pregas_cultaneas" data-toggle="tab">Pregas Cultâneas</a>
                                </li>
                                <li>
                                    <a href="#tab_analise_postural" data-toggle="tab">Análise Postural</a>
                                </li>
                            </ul>
                        </div>
                        {{-- Fim Tabs secundárias de Antropometria --}}

                        {{-- Conteúdo das Tabs secundárias de Antropometria --}}
                        <div class="tab-content" style="padding: 10px;">
                            <div class="tab-pane active" id="tab_peso_e_altura">
                                <br>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="weight" class="col-xs-12 col-sm-2 col-md-1 col-lg-1">
                                            {{ trans('strings.weight') }}
                                        </label>
                                        
                                        <div class="col-xs-12 col-sm-10 col-md-11 col-lg-11">
                                            <div class="input-group">
                                                {!! Form::text('weight', null, ['class' => 'form-control cm', 'placeholder' => trans('strings.weight')]) !!}
                                                <span class="input-group-addon" id="">cm</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="weight" class="col-xs-12 col-sm-2 col-md-1 col-lg-1">
                                            {{ trans('strings.height') }}
                                        </label>
                                        <div class="col-xs-12 col-sm-10 col-md-11 col-lg-11">
                                            <div class="input-group">
                                                {!! Form::text('height', null, ['class' => 'form-control cm', 'placeholder' => trans('strings.height')]) !!}
                                                <span class="input-group-addon" id="">cm</span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_perimetros_circuferencias">
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('braco_direito', trans('strings.braco_direito'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('braco_direito', null, ['class' => 'form-control', 'placeholder' => trans('strings.braco_direito'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('braco_esquerdo', trans('strings.braco_esquerdo'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('braco_esquerdo', null, ['class' => 'form-control', 'placeholder' => trans('strings.braco_esquerdo'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('abdomen', trans('strings.abdomen'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('abdomen', null, ['class' => 'form-control', 'placeholder' => trans('strings.abdomen'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('quadril', trans('strings.quadril'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('quadril', null, ['class' => 'form-control', 'placeholder' => trans('strings.quadril'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('coxa_proximal', trans('strings.coxa_proximal'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('coxa_proximal', null, ['class' => 'form-control', 'placeholder' => trans('strings.coxa_proximal'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('coxa_distal', trans('strings.coxa_distal'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('coxa_distal', null, ['class' => 'form-control', 'placeholder' => trans('strings.coxa_distal'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('perna_direita', trans('strings.perna'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('perna_direita', null, ['class' => 'form-control', 'placeholder' => trans('strings.perna_direita'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('perna_esquerda', trans('strings.perna_esquerda'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('perna_esquerda', null, ['class' => 'form-control', 'placeholder' => trans('strings.perna_esquerda'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('antibraco', trans('strings.antibraco'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('antibraco', null, ['class' => 'form-control', 'placeholder' => trans('strings.antibraco'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('torax', trans('strings.torax'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('torax', null, ['class' => 'form-control', 'placeholder' => trans('strings.torax'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('cintura', trans('strings.cintura'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('cintura', null, ['class' => 'form-control', 'placeholder' => trans('strings.cintura'). ' CM']) !!}
                                    </div>
                                </div>



                            </div>
                            <div class="tab-pane" id="tab_diametro_osseos">
                                Diâmetro Ósseos
                            </div>
                            <div class="tab-pane" id="tab_pregas_cultaneas">
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('bicipital', trans('strings.bicipital'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                            {!! Form::text('bicipital', null, ['class' => 'form-control', 'placeholder' => trans('strings.bicipital'). ' CM']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_analise_postural">
                                {{--Tabs de Fotos--}}
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('anterior', trans('strings.anterior'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('anterior', null, ['class' => 'form-control', 'placeholder' => trans('strings.anterior'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('obs', trans('strings.obs'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::textarea('obs', null, ['class' => 'form-control textarea', 'placeholder' => trans('strings.obs'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('posterior', trans('strings.posterior'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('posterior', null, ['class' => 'form-control', 'placeholder' => trans('strings.posterior'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('obs', trans('strings.obs'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::textarea('obs', null, ['class' => 'form-control textarea', 'placeholder' => trans('strings.obs'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('lateral_direito', trans('strings.lateral_direito'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('lateral_direito', null, ['class' => 'form-control', 'placeholder' => trans('strings.lateral_direito'). ' CM']) !!}
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('obs', trans('strings.obs'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::textarea('obs', null, ['class' => 'form-control textarea', 'placeholder' => trans('strings.obs'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('lateral_esquerdo', trans('strings.lateral_esquerdo'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::text('lateral_esquerdo', null, ['class' => 'form-control', 'placeholder' => trans('strings.lateral_esquerdo'). ' CM']) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                        {!! Form::label('obs', trans('strings.obs'), ['class' => '']) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 pull-right">
                                        {!! Form::textarea('obs', null, ['class' => 'form-control textarea', 'placeholder' => trans('strings.obs'). ' CM']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Fim Conteúdo das Tabs secundárias de Antropometria --}}
                    </div>
                    {{-- Fim Tab Antropometria --}}


                    {{-- Tab Resistência --}}
                    <div class="tab-pane" id="tab_2">
                        Resistência
                    </div>
                    {{-- Fim Tab Resistência--}}


                    <div class="tab-pane" id="tab_3">

                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_banco_wells" data-toggle="tab">Banco de Wells</a>
                                </li>
                                <li>
                                    <a href="#tab_fleximetro" data-toggle="tab">Flexímetro</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" style="padding: 10px;">
                            <div class="tab-pane active" id="tab_banco_wells">
                                Banco de Wells
                            </div>
                            <div class="tab-pane" id="tab_fleximetro">
                                Flexímetro
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection