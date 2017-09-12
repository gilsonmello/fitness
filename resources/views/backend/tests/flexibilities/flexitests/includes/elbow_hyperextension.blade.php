<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            {!! Form::label('lateral_trunk_flexion', trans('strings.elbow_hyperextension'), []) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Hiperextensão do Cotovelo" class="img-responsive" style="display: initial" src="{{imageurl('flexitest', 'elbow_hyperextension_1.png', 0)}}">
        </div>
        <div class="form-group">
            {!! Form::radio('elbow_hyperextension', 1, isset($test->flexitest) && $test->flexitest->elbow_hyperextension == 1 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Hiperextensão do Cotovelo" class="img-responsive" style="display: initial" src="{{imageurl('flexitest', 'elbow_hyperextension_2.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('elbow_hyperextension', 2, isset($test->flexitest) && $test->flexitest->elbow_hyperextension == 2 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Hiperextensão do Cotovelo" class="img-responsive" style="display: initial" src="{{imageurl('flexitest', 'elbow_hyperextension_3.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('elbow_hyperextension', 3, isset($test->flexitest) && $test->flexitest->elbow_hyperextension == 3 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Hiperextensão do Cotovelo" class="img-responsive" style="display: initial" src="{{imageurl('flexitest', 'elbow_hyperextension_4.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('elbow_hyperextension', 4, isset($test->flexitest) && $test->flexitest->elbow_hyperextension == 4 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
</div>