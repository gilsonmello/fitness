{!! Form::open(['route' => ['backend.evaluations.update_parq', $evaluation->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'update_parq']) !!}
<br>
<div class="row">
    {{-- Pergunta 1 --}}
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h5>1) Alguma vez seu médico disse que você possui algum problema de coração e recomendou que você só praticasse atividade física sob prescrição médica? </h5>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="2">{{ trans('strings.yes') }}</label>
        <input type="radio" id="2" name="question_1" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_1 == 1 ? "checked=checked" : ""}} class="flat-red answer-yes-click" />
        <label for="1">{{ trans('strings.no') }}</label>
        <input type="radio" id="1" name="question_1" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_1 == 0 ? "checked=checked" : ""}} class="flat-red" />
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
        <input type="radio" id="2" name="question_2" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_2 == 1 ? "checked=checked" : ""}} class="flat-red answer-yes-click" />
        <label for="1">{{ trans('strings.no') }}</label>
        <input type="radio" id="1" name="question_2" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_2 == 0 ? "checked=checked" : ""}} class="flat-red" />
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
        <input type="radio" id="2" name="question_3" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_3 == 1 ? "checked=checked" : ""}} class="flat-red answer-yes-click" />
        <label for="1">{{ trans('strings.no') }}</label>
        <input type="radio" id="1" name="question_3" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_3 == 0 ? "checked=checked" : ""}} class="flat-red" />
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
        <input type="radio" id="2" name="question_4" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_4 == 1 ? "checked=checked" : ""}} class="flat-red answer-yes-click" />
        <label for="1">{{ trans('strings.no') }}</label>
        <input type="radio" id="1" name="question_4" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_4 == 0 ? "checked=checked" : ""}} class="flat-red" />
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
        <input type="radio" id="2" name="question_5" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_5 == 1 ? "checked=checked" : ""}} class="flat-red answer-yes-click" />
        <label for="1">{{ trans('strings.no') }}</label>
        <input type="radio" id="1" name="question_5" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_5 == 0 ? "checked=checked" : ""}} class="flat-red" />
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
        <input type="radio" id="2" name="question_6" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_6 == 1 ? "checked=checked" : ""}} class="flat-red answer-yes-click" />
        <label for="1">{{ trans('strings.no') }}</label>
        <input type="radio" id="1" name="question_6" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_6 == 0 ? "checked=checked" : ""}} class="flat-red" />
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
        <input type="radio" id="2" name="question_7" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_7 == 1 ? "checked=checked" : ""}} class="flat-red answer-yes-click" />
        <label for="1">{{ trans('strings.no') }}</label>
        <input type="radio" id="1" name="question_7" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_7 == 0 ? "checked=checked" : ""}} class="flat-red" />
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
        <input type="radio" id="2" name="question_8" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->question_8 == 1 ? "checked=checked" : ""}} class="flat-red answer-yes-click" />
        <label for="1">{{ trans('strings.no') }}</label>
        <input type="radio" id="1" name="question_8" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->question_8 == 0 ? "checked=checked" : ""}} class="flat-red" />
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
        <input type="radio" id="2" name="terms" value="1" {{!is_null($evaluation->parq) && $evaluation->parq->terms == 1 ? "checked=checked" : ""}} class="flat-red answer-yes-click" />
        <label for="1">{{ trans('strings.no') }}</label>
        <input type="radio" id="1" name="terms" value="0" {{!is_null($evaluation->parq) && $evaluation->parq->terms == 0 ? "checked=checked" : ""}} class="flat-red" />
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