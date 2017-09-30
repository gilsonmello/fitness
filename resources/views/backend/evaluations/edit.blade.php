@extends('layouts.backend.app')

@section ('title', trans('menus.evaluations.edit'))

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
    {!! Form::open(['route' => ['backend.evaluations.update', $evaluation->id], 'class' => '', 'role' => 'form', 'method' => 'put']) !!}
    <div class="box box-primary collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Dados da Avaliação</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        {!! Form::label('user_id', trans('strings.name').'*', ['class' => '']) !!}
                        {!! Form::select('user_id', $users->pluck('name', 'id')->all(), $evaluation->user->id, ['class' => 'select2', 'placeholder' => trans('strings.name')]) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        {!! Form::label('validity', trans('strings.validity').'*', ['class' => '']) !!}
                        {!! Form::text('validity', format($evaluation->validity, 'd/m/Y'), ['class' => 'datepicker form-control', 'placeholder' => trans('strings.validity')]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        {!! Form::label('objective', trans('strings.objective'), ['class' => '']) !!}
                        {!! Form::textarea('objective', $evaluation->objective, ['class' => 'form-control textarea', 'placeholder' => trans('strings.objective')]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-12">
                    <div class="form-group">
                        {!! Form::label('is_active', trans('strings.is_active').'*', ['class' => '']) !!}
                        {!! Form::checkbox('is_active', 1, $evaluation->is_active == 1 ? true : false, ['class' => 'form-control flat-red', 'placeholder' => trans('strings.title')]) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="pull-left">
                        <a href="{{route('backend.evaluations.index')}}" class="btn btn-danger">{{ trans('strings.cancel_button') }}</a>
                    </div>
                    <div class="pull-right">
                        <input type="submit" class="btn btn-primary" value="{{ trans('strings.save_button') }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    {!! Form::close() !!}


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
                        {{ $evaluation->user->name }}
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('email', trans('strings.email').'.: ', ['class' => '']) !!}
                        {{ $evaluation->user->email }}
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('birth_date', trans('strings.birth_date').'.: ', ['class' => '']) !!}
                        {{ !is_null($evaluation->user->birth_date) ? format($evaluation->user->birth_date, 'd/m/Y') : 'Não informado'}}
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('age', trans('strings.age').'.: ', ['class' => '']) !!}
                        {{ !is_null($evaluation->user->birth_date) ? age($evaluation->user->birth_date) : 'Não informado'}}
                    </h5>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <h5 class="">
                        {!! Form::label('phone', trans('strings.phone').'.: ', ['class' => '']) !!}
                        {{ !is_null($evaluation->user->phone) ? $evaluation->user->phone : 'Não informado' }}
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">

                {{-- Todas as Tabs primárias --}}
                <ul class="nav nav-tabs">
                    @include('backend.evaluations.nav_tabs.level_1.all')
                </ul>{{-- Fim Todas as Tabs primárias --}}

                {{-- Conteúdo de Todas as Tabs primárias --}}
                <div class="tab-content">

                    {{-- Conteúdo Tab Antropometria --}}
                    <div class="tab-pane active" id="antropometria">
                        {{-- Tabs secundárias de Antropometria --}}
                        <div class="nav-tabs-custom">
                            {{-- Conteúdo das Nav-Tabs secundárias de Antropometria --}}
                            <ul class="nav nav-tabs">
                                @include('backend.evaluations.nav_tabs.level_2.antropometria')
                            </ul>{{-- Fim Conteúdo das Nav-Tabs ecundárias de Antropometria --}}

                            {{-- Conteúdo das Tabs secundárias de Antropometria --}}
                            <div class="tab-content">
                                {{-- Conteúdo da Tab Peso e Altura --}}
                                <div class="tab-pane active" id="tab_peso_e_altura">
                                    @include('backend.evaluations.tabs_content.antropometria.peso_altura')
                                </div>{{-- Fim Conteúdo da Tab Peso e Altura --}}

                                {{-- Conteudo da Tab Perimetros e Circuferencia --}}
                                <div class="tab-pane" id="tab_perimetros_circuferencias">
                                    @include('backend.evaluations.tabs_content.antropometria.perimetros_circuferencias')
                                </div>{{-- Fim Conteudo da Tab Perimetros E Circuferencia --}}

                                {{-- Conteudo da Tab Diâmetro Ósseos --}}
                                <div class="tab-pane" id="tab_diametro_osseos">
                                    @include('backend.evaluations.tabs_content.antropometria.diametro_osseo')
                                </div>{{-- Fim Conteudo da Tab Diâmetro Ósseos --}}
                            </div>
                        </div>{{-- Fim Tabs secundárias de Antropometria --}}
                    </div>{{-- Fim Tab Antropometria --}}


                    {{-- Tab Resistência --}}
                    <div class="tab-pane" id="bioempedancia">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                @include('backend.evaluations.tabs_content.bioempedancia.bioempedancia')
                            </div>
                        </div>
                    </div>
                    {{-- Fim Tab Resistência--}}

                    <div class="tab-pane" id="parq">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                @include('backend.evaluations.tabs_content.parq.parq')
                            </div>
                        </div>
                    </div>
                    {{-- Fim do conteúdo tab PAR'Q --}}

                    {{-- Conteúdo Tab Pregras Cutaneas --}}
                    <div class="tab-pane" id="pregas_cutaneas">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                @include('backend.evaluations.tabs_content.pregras_cutaneas.pregras_cutaneas')
                            </div>
                        </div>
                    </div>{{-- Fim do Conteúdo Tab Pregras Cutaneas --}}

                    {{-- Conteúdo Tab Análise Postural --}}
                    <div class="tab-pane" id="analise_postural">
                        <div class="nav-tabs-custom">

                            {{-- Nav-Tabs Análise Postural --}}
                            <ul class="nav nav-tabs">
                                @include('backend.evaluations.nav_tabs.level_2.analise_postural')
                            </ul>

                            {{-- Conteúdo Tabs secundárias Análise Postural --}}
                            <div class="tab-content">
                                @include('backend.evaluations.tabs_content.analise_posturais.analise_postural_anterior')
                                @include('backend.evaluations.tabs_content.analise_posturais.analise_postural_lateral_esquerda')
                                @include('backend.evaluations.tabs_content.analise_posturais.analise_postural_lateral_direita')
                                @include('backend.evaluations.tabs_content.analise_posturais.analise_postural_posterior')
                            </div>
                        </div>
                    </div>

                    {{-- Conteúdo Tab Risco Coronário --}}
                    <div class="tab-pane" id="risco_coronario">
                        <div class="nav-tabs-custom">
                            {{-- Conteúdo Tabs secundárias Análise Postural --}}
                            <div class="tab-content">
                                @include('backend.evaluations.tabs_content.riscos_coronarios.riscos_coronarios')
                            </div>
                        </div>
                    </div>{{-- Fim Conteúdo da Tab Risco Coronáriol --}}


                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection