@extends('layouts.backend.app')

@section ('title', trans('menus.coupon_management') . ' | ' . trans('menus.create_coupon'))

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
    <script>
        var evaluation_id = '{{$evaluation->id}}';
    </script>
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
                        {{ $evaluation->user->email }}
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab">Antropometria</a>
                    </li>
                    <li>
                        <a href="#tab_bioempedancia" data-toggle="tab">Bioempedância</a>
                    </li>
                    <li>
                        <a href="#tab_parq" data-toggle="tab">PAR'Q</a>
                    </li>
                    <li>
                        <a href="#tab_pregas_cultaneas" data-toggle="tab">Pregas Cultâneas</a>
                    </li>
                    <li>
                        <a href="#tab_analise_postural" data-toggle="tab">Análise Postural</a>
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
                            </ul>

                            {{-- Conteúdo das Tabs ecundárias de Antropometria --}}
                            <div class="tab-content">
                                {{-- Conteúdo da Tab Peso e Altura --}}
                                <div class="tab-pane active" id="tab_peso_e_altura">
                                    <form class="form-horizontal" method="POST" action="{{ route('backend.evaluations.update_weight_and_height', ['id' => $evaluation->id]) }}" id="update_weight_and_height">
                                        <input type="hidden" value="1" name="user_id">
                                        <div class="row">
                                            <br>
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('weight', trans('strings.weight'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}

                                                    <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('weight', !is_null($evaluation->evaluationAttribute) ? $evaluation->evaluationAttribute->weight : NULL, ['class' => 'form-control cm', 'placeholder' => trans('strings.weight')]) !!}
                                                            <span class="input-group-addon" id="">KG</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('height', trans('strings.height'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                                    <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('height', !is_null($evaluation->evaluationAttribute) ? $evaluation->evaluationAttribute->height : NULL, ['class' => 'form-control cm', 'placeholder' => trans('strings.height')]) !!}
                                                            <span class="input-group-addon" id="">M</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                                <div class="pull-right">
                                                    <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                {{-- Fim Conteúdo da Tab Peso e Altura --}}

                                {{-- Conteudo da Tab Perimetros E Circuferencia --}}
                                <div class="tab-pane" id="tab_perimetros_circuferencias">
                                    <form class="form-horizontal" method="POST" action="{{ route('backend.evaluations.update_antropometria', ['id' => $evaluation->id]) }}" id="update_antropometria">
                                        <div class="row">
                                            <br>
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('right_arm', trans('strings.right_arm'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                                                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('right_arm', !is_null($evaluation->antropometria) ? $evaluation->antropometria->right_arm : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.right_arm')]) !!}
                                                            <span class="input-group-addon" id="">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('left_arm', trans('strings.left_arm'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                                                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('left_arm', !is_null($evaluation->antropometria) ? $evaluation->antropometria->left_arm : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.left_arm')]) !!}
                                                            <span class="input-group-addon" id="">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('tummy', trans('strings.tummy'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                                                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('tummy', !is_null($evaluation->antropometria) ? $evaluation->antropometria->tummy : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.tummy')]) !!}
                                                            <span class="input-group-addon" id="">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('hip', trans('strings.hip'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                                                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('hip', !is_null($evaluation->antropometria) ? $evaluation->antropometria->hip : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.hip')]) !!}
                                                            <span class="input-group-addon" id="">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('coxa_proximal', "Coxa Proximal", ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                                                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('coxa_proximal', !is_null($evaluation->antropometria) ? $evaluation->antropometria->coxa_proximal : NULL, ['class' => 'cm form-control', 'placeholder' => "Coxa Proximal"]) !!}
                                                            <span class="input-group-addon" id="">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('coxa_medial', "Coxa Medial", ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                                                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('coxa_medial', !is_null($evaluation->antropometria) ? $evaluation->antropometria->coxa_medial : NULL, ['class' => 'cm form-control', 'placeholder' => "Coxa Medial"]) !!}
                                                            <span class="input-group-addon" id="">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('coxa_distal', "Coxa Distal", ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                                                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('coxa_distal', !is_null($evaluation->antropometria) ? $evaluation->antropometria->coxa_distal : NULL, ['class' => 'cm form-control', 'placeholder' => "Coxa Distal"]) !!}
                                                            <span class="input-group-addon" id="">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('right_leg', trans('strings.right_leg'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                                                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('right_leg', !is_null($evaluation->antropometria) ? $evaluation->antropometria->right_leg : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.right_leg')]) !!}
                                                            <span class="input-group-addon" id="">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('left_leg', trans('strings.left_leg'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                                                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('left_leg', !is_null($evaluation->antropometria) ? $evaluation->antropometria->left_leg : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.left_leg')]) !!}
                                                            <span class="input-group-addon" id="">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('forearm', trans('strings.forearm'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}

                                                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('forearm', !is_null($evaluation->antropometria) ? $evaluation->antropometria->forearm : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.forearm')]) !!}
                                                            <span class="input-group-addon" id="">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('chest', trans('strings.chest'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                                                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('chest', !is_null($evaluation->antropometria) ? $evaluation->antropometria->chest : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.chest')]) !!}
                                                            <span class="input-group-addon" id="">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('waist', trans('strings.waist'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                                                    <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('waist', !is_null($evaluation->antropometria) ? $evaluation->antropometria->waist : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.waist')]) !!}
                                                            <span class="input-group-addon" id="">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="pull-right">
                                                    <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>

                                </div>
                                {{-- Fim Conteudo da Tab Perimetros E Circuferencia --}}

                                {{-- Conteudo da Tab Diâmetro Ósseos --}}
                                <div class="tab-pane" id="tab_diametro_osseos">
                                    <form class="form-horizontal">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('waist', "Diâmetro Ósseos", ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                        </div>
                        {{-- Fim Tabs secundárias de Antropometria --}}
                    </div>
                    {{-- Fim Tab Antropometria --}}
                    </div>


                    {{-- Tab Resistência --}}
                    <div class="tab-pane" id="tab_bioempedancia">
                        <br>
                        <form class="form-horizontal" method="POST" action="{{ route('backend.evaluations.update_bioempedancia', ['id' => $evaluation->id]) }}" id="update_bioempedancia">
                            <div class="row">
                                <br>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('fat', trans('strings.fat'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('fat', !is_null($evaluation->bioempedancia) ? $evaluation->bioempedancia->fat: NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.fat')]) !!}
                                                <span class="input-group-addon" id="">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('muscle_mass', trans('strings.muscle_mass'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('muscle_mass', !is_null($evaluation->bioempedancia) ? $evaluation->bioempedancia->muscle_mass : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.muscle_mass')]) !!}
                                                <span class="input-group-addon" id="">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('body_water', trans('strings.body_water'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('body_water', !is_null($evaluation->bioempedancia) ? $evaluation->bioempedancia->body_water: NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.body_water')]) !!}
                                                <span class="input-group-addon" id="">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('osseous_weight', trans('strings.osseous_weight'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('osseous_weight', !is_null($evaluation->bioempedancia) ? $evaluation->bioempedancia->osseous_weight : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.osseous_weight')]) !!}
                                                <span class="input-group-addon" id="">KG</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('imc', trans('strings.imc'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('imc', !is_null($evaluation->bioempedancia) ? $evaluation->bioempedancia->imc : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.imc')]) !!}
                                                <span class="input-group-addon" id="">IMC</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    {{-- Fim Tab Resistência--}}

                    <div class="tab-pane" id="tab_parq">
                        {!! Form::open(['route' => ['backend.evaluations.update_parq', $evaluation->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'update_parq']) !!}
                            <br>
                            <div class="row">
                                {{-- Pergunta 1 --}}
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h5>1) Alguma vez seu médico disse que você possui algum problema de coração e recomendou que você só praticasse atividade física sob prescrição médica? </h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="2">{{ trans('strings.yes') }}</label>
                                    <input type="radio" id="2" name="question_1" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_1 == 1 ? "checked='checked'" : ""}} class="flat-red answer-yes-click" />
                                    <label for="1">{{ trans('strings.no') }}</label>
                                    <input type="radio" id="1" name="question_1" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_1 == 0 ? "checked='checked'" : ""}} class="flat-red" />
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 answer-yes {{!is_null($evaluation->parq) && $evaluation->parq->question_1 == 1 ? "editor-active" : "" }}">
                                    <br>
                                    {!! Form::textarea('option_answer_1', !is_null($evaluation->parq) ? $evaluation->parq->option_answer_1 : NULL, ['style' => 'width: 100%','class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                                </div>
                            </div>
                            {{-- Pergunta 2 --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h5>
                                        2) Você sente dor no peito causada pela prática de atividade física?
                                    </h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="2">{{ trans('strings.yes') }}</label>
                                    <input type="radio" id="2" name="question_2" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_2 == 1 ? "checked='checked'" : ""}} class="flat-red answer-yes-click" />
                                    <label for="1">{{ trans('strings.no') }}</label>
                                    <input type="radio" id="1" name="question_2" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_2 == 0 ? "checked='checked'" : ""}} class="flat-red" />
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 answer-yes {{!is_null($evaluation->parq) && $evaluation->parq->question_2 == 1 ? "editor-active" : "" }}">
                                    <br>
                                    {!! Form::textarea('option_answer_2', !is_null($evaluation->parq) ? $evaluation->parq->option_answer_2 : NULL, ['style' => 'width: 100%','class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                                </div>
                            </div>
                            {{-- Pergunta 3 --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h5>
                                        3) Você sentiu dor no peito no último mês?
                                    </h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="2">{{ trans('strings.yes') }}</label>
                                    <input type="radio" id="2" name="question_3" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_3 == 1 ? "checked='checked'" : ""}} class="flat-red answer-yes-click" />
                                    <label for="1">{{ trans('strings.no') }}</label>
                                    <input type="radio" id="1" name="question_3" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_3 == 0 ? "checked='checked'" : ""}} class="flat-red" />
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 answer-yes {{!is_null($evaluation->parq) && $evaluation->parq->question_3 == 1 ? "editor-active" : "" }}">
                                    <br>
                                    {!! Form::textarea('option_answer_3', !is_null($evaluation->parq) ? $evaluation->parq->option_answer_3 : NULL, ['style' => 'width: 100%','class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                                </div>
                            </div>
                            {{-- Pergunta 4 --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h5>
                                        4) Você tende a perder a consciência ou cair como resultado do treinamento?
                                    </h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="2">{{ trans('strings.yes') }}</label>
                                    <input type="radio" id="2" name="question_4" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_4 == 1 ? "checked='checked'" : ""}} class="flat-red answer-yes-click" />
                                    <label for="1">{{ trans('strings.no') }}</label>
                                    <input type="radio" id="1" name="question_4" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_4 == 0 ? "checked='checked'" : ""}} class="flat-red" />
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 answer-yes {{!is_null($evaluation->parq) && $evaluation->parq->question_4 == 1 ? "editor-active" : "" }}">
                                    <br>
                                    {!! Form::textarea('option_answer_4', !is_null($evaluation->parq) ? $evaluation->parq->option_answer_4 : NULL, ['style' => 'width: 100%','class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                                </div>
                            </div>
                            {{-- Pergunta 5 --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h5>
                                        5)	Você tem algum problema ósseo ou muscular que poderia ser agravado com a prática de atividades físicas?
                                    </h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="2">{{ trans('strings.yes') }}</label>
                                    <input type="radio" id="2" name="question_5" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_5 == 1 ? "checked='checked'" : ""}} class="flat-red answer-yes-click" />
                                    <label for="1">{{ trans('strings.no') }}</label>
                                    <input type="radio" id="1" name="question_5" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_5 == 0 ? "checked='checked'" : ""}} class="flat-red" />
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 answer-yes {{!is_null($evaluation->parq) && $evaluation->parq->question_5 == 1 ? "editor-active" : "" }}">
                                    <br>
                                    {!! Form::textarea('option_answer_5', !is_null($evaluation->parq) ? $evaluation->parq->option_answer_5 : NULL, ['style' => 'width: 100%','class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                                </div>
                            </div>
                            {{-- Pergunta 6 --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h5>
                                        6)	Seu médico já recomendou o uso de medicamentos para controle de sua pressão arterial ou condição cardiovascular?
                                    </h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="2">{{ trans('strings.yes') }}</label>
                                    <input type="radio" id="2" name="question_6" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_6 == 1 ? "checked='checked'" : ""}} class="flat-red answer-yes-click" />
                                    <label for="1">{{ trans('strings.no') }}</label>
                                    <input type="radio" id="1" name="question_6" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_6 == 0 ? "checked='checked'" : ""}} class="flat-red" />
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 answer-yes {{!is_null($evaluation->parq) && $evaluation->parq->question_6 == 1 ? "editor-active" : "" }}">
                                    <br>
                                    {!! Form::textarea('option_answer_6', !is_null($evaluation->parq) ? $evaluation->parq->option_answer_6 : NULL, ['style' => 'width: 100%','class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                                </div>
                            </div>
                            {{-- Pergunta 7 --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h5>
                                        7)	Você tem consciência, através de sua própria experiência e/ou de aconselhamento
                                        médico, de alguma outra razão física que impeça a realização de atividades físicas ?
                                    </h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="2">{{ trans('strings.yes') }}</label>
                                    <input type="radio" id="2" name="question_7" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_7 == 1 ? "checked='checked'" : ""}} class="flat-red answer-yes-click" />
                                    <label for="1">{{ trans('strings.no') }}</label>
                                    <input type="radio" id="1" name="question_7" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_7 == 0 ? "checked='checked'" : ""}} class="flat-red" />
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 answer-yes {{!is_null($evaluation->parq) && $evaluation->parq->question_7 == 1 ? "editor-active" : "" }}">
                                    <br>
                                    {!! Form::textarea('option_answer_7', !is_null($evaluation->parq) ? $evaluation->parq->option_answer_7 : NULL, ['style' => 'width: 100%','class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                                </div>
                            </div>
                            <hr>
                            {{-- Pergunta 8 --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h5>
                                        Gostaria de comentar algum outro problema de saúde seja de ordem física ou psicológica que impeça a sua participação na atividade proposta?
                                    </h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="2">{{ trans('strings.yes') }}</label>
                                    <input type="radio" id="2" name="question_8" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_8 == 1 ? "checked='checked'" : ""}} class="flat-red answer-yes-click" />
                                    <label for="1">{{ trans('strings.no') }}</label>
                                    <input type="radio" id="1" name="question_8" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_8 == 0 ? "checked='checked'" : ""}} class="flat-red" />
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 answer-yes {{!is_null($evaluation->parq) && $evaluation->parq->question_8 == 1 ? "editor-active" : "" }}">
                                    <br>
                                    {!! Form::textarea('option_answer_8', !is_null($evaluation->parq) ? $evaluation->parq->option_answer_8 : NULL, ['style' => 'width: 100%','class' => 'form-control textarea', 'placeholder' => trans('strings.description')]) !!}
                                </div>
                            </div>
                            <br>
                            {{-- Pergunta 8 --}}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h3><p class="text-center">Declaração de Responsabilidade</p></h3>
                                    <br>
                                    <h5>
                                        Estou ciente das propostas do Projeto VERDEANDO, evento/ atividade:
                                    </h5>
                                    <hr>
                                    <h5>Assumo a veracidade das informações prestadas no questionário 'PAR Q'  e afirmo estar liberado pelo meu médico para participação na atividade citada acima.</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="2">{{ trans('strings.yes') }}</label>
                                    <input type="radio" id="2" name="terms" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->terms == 1 ? "checked='checked'" : ""}} class="flat-red answer-yes-click" />
                                    <label for="1">{{ trans('strings.no') }}</label>
                                    <input type="radio" id="1" name="terms" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->terms == 0 ? "checked='checked'" : ""}} class="flat-red" />
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        {!! Form::close() !!}
                    </div>
                    {{-- Fim do conteúdo tab PAR'Q --}}

                    <div class="tab-pane" id="tab_pregas_cultaneas">
                        {!! Form::open(['route' => ['backend.evaluations.update_pregras_cutaneas', $evaluation->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'update_pregras_cutaneas']) !!}
                            <div class="row">
                                <br>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('biceps', trans('strings.biceps'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('biceps', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->biceps : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.biceps')]) !!}
                                                <span class="input-group-addon" id="">MM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('triceps', trans('strings.triceps'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('triceps', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->triceps : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.triceps')]) !!}
                                                <span class="input-group-addon" id="">MM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('subescapular', trans('strings.subescapular'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('subescapular', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->subescapular : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.subescapular')]) !!}
                                                <span class="input-group-addon" id="">MM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('peitoral', trans('strings.peitoral'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('peitoral', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->peitoral : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.peitoral')]) !!}
                                                <span class="input-group-addon" id="">MM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('supra_ilíaca', trans('strings.supra_ilíaca'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('supra_ilíaca', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->supra_ilíaca : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.supra_ilíaca')]) !!}
                                                <span class="input-group-addon" id="">MM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('coxa', trans('strings.coxa'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('coxa', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->coxa : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.coxa')]) !!}
                                                <span class="input-group-addon" id="">MM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('abdominal', trans('strings.abdominal'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('abdominal', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->abdominal : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.abdominal')]) !!}
                                                <span class="input-group-addon" id="">MM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('panturrilha', trans('strings.panturrilha'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('panturrilha', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->panturrilha : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.panturrilha')]) !!}
                                                <span class="input-group-addon" id="">MM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('axilar_media', trans('strings.axilar_media'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                            <div class="input-group">
                                                {!! Form::text('axilar_media', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->axilar_media : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.axilar_media')]) !!}
                                                <span class="input-group-addon" id="">MM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        {!! Form::close() !!}
                    </div>


                    <div class="tab-pane" id="tab_analise_postural">
                        {{--Tabs de Fotos--}}

                        {{-- Tab Antropometria --}}
                        <div class="tab-pane active" id="tab_1">
                            {{-- Tabs secundárias de Antropometria --}}
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_analise_postural_anterior" data-toggle="tab">Anterior</a>
                                    </li>
                                    <li>
                                        <a href="#tab_analise_postural_lateral_esquerda" data-toggle="tab">Lateral 1</a>
                                    </li>
                                    <li>
                                        <a href="#tab_analise_postural_lateral_direita" data-toggle="tab">Lateral 2</a>
                                    </li>
                                    <li>
                                        <a href="#tab_analise_postural_posterior" data-toggle="tab">Posterior</a>
                                    </li>
                                </ul>

                                {{-- Conteúdo das Tabs ecundárias de Antropometria --}}
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_analise_postural_anterior">
                                        <script>var update_analise_postural_anterior = '{{ route('backend.evaluations.send_img_analise_postural_anterior', $evaluation->id) }}'</script>
                                        {!! Form::open(['route' => ['backend.evaluations.update_analise_postural_anterior', $evaluation->id], 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'update_analise_postural_anterior']) !!}
                                        <br>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                <input type="checkbox" id="arlcd" name="arlcd" value="1" class="minimal" />
                                                <label for="arlcd">Rotação Lateral Cervical Dir.</label>
                                                <br><br>
                                                <input type="checkbox" id="arlce" name="arlce" value="1" class="minimal" />
                                                <label for="arlce">Rotação Lateral Cervical Esq.</label>
                                                <br><br>
                                                <input type="checkbox" id="ailcd" name="ailcd" value="1" class="minimal" />
                                                <label for="ailcd">Inclinação Lateral Cervical Dir.</label>
                                                <br><br>
                                                <input type="checkbox" id="ailce" name="ailce" value="1" class="minimal" />
                                                <label for="ailce">Inclinação Lateral Cervical Esq.</label>
                                                <br><br>
                                                <input type="checkbox" id="aeod" name="aeod" value="1" class="minimal" />
                                                <label for="aeod">Elevação do Ombro Dir.</label>
                                                <br><br>
                                                <input type="checkbox" id="aeoe" name="aeoe" value="1" class="minimal" />
                                                <label for="aeoe">Elevação do Ombro Esq.</label>
                                                <br><br>
                                                <input type="checkbox" id="aeoe" name="armpd" value="1" class="minimal" />
                                                <label for="aeoe">Rotação Medial do Punho Dir.</label>
                                                <br><br>
                                                <input type="checkbox" id="armpe" name="armpe" value="1" class="minimal" />
                                                <label for="armpe">Rotação Medial do Punho Esq.</label>
                                                <br><br>
                                                <input type="checkbox" id="admp" name="admp" value="1" class="minimal" />
                                                <label for="admp">Desalinhamento de Mamilos e Peitoral</label>
                                                <br><br>
                                                <input type="checkbox" id="adq" name="adq" value="1" class="minimal" />
                                                <label for="adq">Desequilíbrio de Quadril</label>
                                                <br><br>
                                                <input type="checkbox" id="aami" name="aami" value="1" class="minimal" />
                                                <label for="aami">Assimetría de Membro Inferior</label>
                                                <br><br>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                <input type="checkbox" id="ajvaro" name="ajvaro" value="1" class="minimal" />
                                                <label for="ajvaro">Joelho Varo</label>
                                                <br><br>
                                                <input type="checkbox" id="ajvalgo" name="ajvalgo" value="1" class="minimal" />
                                                <label for="ajvalgo">Joelho Valgo</label>
                                                <br><br>
                                                <input type="checkbox" id="arijde" name="arijde" value="1" class="minimal" />
                                                <label for="arijde">Rotação Interna de Joelho Dir/Esq.</label>
                                                <br><br>
                                                <input type="checkbox" id="apede" name="apede" value="1" class="minimal" />
                                                <label for="apede">Pé em Eversão Dir/Esq.</label>
                                                <br><br>
                                                <input type="checkbox" id="apide" name="apide" value="1" class="minimal" />
                                                <label for="apide">Pé em Inversão Dir/Esq.</label>
                                                <br><br>
                                                <input type="checkbox" id="apabdutode" name="apabdutode" value="1" class="minimal" />
                                                <label for="apabdutode">Pé Abduto Dir/Esq.</label>
                                                <br><br>
                                                <input type="checkbox" id="admi" name="admi" value="1" class="minimal" />
                                                <label for="admi">Desalinhamento dos Maléolos Int.</label>
                                                <br><br>
                                                <input type="checkbox" id="ape" name="ape" value="1" class="minimal" />
                                                <label for="ape">Pé Equino</label>
                                                <br><br>
                                                <input type="checkbox" id="aas" name="aas" value="1" class="minimal" />
                                                <label for="aas">Aparentemente Saudável</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                                                {!! Form::label('obs', trans('strings.obs'), ['class' => '']) !!}
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 pull-right">
                                                {!! Form::textarea('obs', null, ['width' => '100%', 'class' => 'form-control textarea', 'placeholder' => trans('strings.obs'). ' CM']) !!}
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                        <br>
                                        <br>
                                        {!! Form::open(['route' => ['backend.evaluations.send_img_analise_postural_anterior', $evaluation->id], 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'send_img_analise_postural_anterior']) !!}

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5" style="margin-bottom: 10px;">
                                                    <input type="file" name="img" id="img_a" accept="image/jpeg,image/png,image/gif,image/bmp">
                                                    {{--<br>
                                                    <div class="progress desactive">
                                                        <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="">
                                                            <span class="sr-only"></span>
                                                        </div>
                                                    </div>--}}
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7" id="visualizar">
                                                    <img src="{{imageurl('analise_postural_anterior', $evaluation->analisePosturalAnterior->img, 400, true)}}" id="img-reader" style="width: 100%; height: 380px;">
                                                </div>
                                            </div>
                                            <br>
                                        {!! Form::close() !!}


                                        <br>
                                        <div class="row btn-desactive">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="pull-right">
                                                    <img src="{!!asset('img')!!}/loading.gif" class="desactive">
                                                    <input type="submit" class="btn btn-success" id="btn-update_analise_postural_anterior" value="{{ trans('strings.save_button') }}" />
                                                </div>
                                            </div>
                                        </div>{{--
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 porcentagem" id="">
                                                <span class="valor"><p></p></span>
                                            </div>
                                            <style type="text/css">
                                                .porcentagem{
                                                    width: 570px;
                                                    padding: 5px;
                                                    background: #fff;
                                                    border: 1px solid #069;
                                                }
                                                .porcentagem .valor{
                                                    float: left;
                                                    display: block;
                                                    background: #069;
                                                }
                                                .porcentagem .valor p{
                                                    font: 15px tahoma, arial, helvetica;
                                                    color: #fff;
                                                    text-shadow: #000 0 1px 0;
                                                    margin: 5px;

                                                }
                                            </style>
                                        <br>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div id="img"></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>--}}

                                    </div>

                                    <div class="tab-pane" id="tab_analise_postural_lateral_esquerda">
                                        {!! Form::open(['route' => ['backend.evaluations.update_pregras_cutaneas', $evaluation->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'update_pregras_cutaneas']) !!}

                                        <br>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('previous', trans('strings.lateral_1'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
                                                    <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                                                        <div class="input-group">
                                                            {!! Form::text('lateral_1', null, ['class' => 'form-control', 'placeholder' => trans('strings.previous')]) !!}
                                                            <span class="input-group-addon" id="">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
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
                            </div>
                        </div>
                    </div>
                    {{-- Fim Conteúdo das Tabs secundárias de Antropometria --}}
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection