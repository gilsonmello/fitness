<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            {!! Form::label('trunk_hyperextension', 'Hiperextensão do Tronco', []) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Hiperextensão do Tronco" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'trunk_hyperextension_1.png', 0)}}">
        </div>
        <div class="form-group">
            {!! Form::radio('trunk_hyperextension', 1, isset($test->flexibility) && $test->flexibility->trunk_hyperextension == 1 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Hiperextensão do Tronco" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'trunk_hyperextension_2.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('trunk_hyperextension', 2, isset($test->flexibility) && $test->flexibility->trunk_hyperextension == 2 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Hiperextensão do Tronco" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'trunk_hyperextension_3.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('trunk_hyperextension', 3, isset($test->flexibility) && $test->flexibility->trunk_hyperextension == 3 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Hiperextensão do Tronco" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'trunk_hyperextension_4.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('trunk_hyperextension', 4, isset($test->flexibility) && $test->flexibility->trunk_hyperextension == 4 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
</div>