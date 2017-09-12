<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            {!! Form::label('leg_flexion', trans('strings.leg_flexion'), []) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Flexão da Perna" class="img-responsive" style="display: initial" src="{{imageurl('flexitest', 'leg_flexion_1.png', 0)}}">
        </div>
        <div class="form-group">
            {!! Form::radio('leg_flexion', 1, isset($test->flexitest) && $test->flexitest->leg_flexion == 1 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Flexão da Perna" class="img-responsive" style="display: initial" src="{{imageurl('flexitest', 'leg_flexion_2.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('leg_flexion', 2, isset($test->flexitest) && $test->flexitest->leg_flexion == 2 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Flexão da Perna" class="img-responsive" style="display: initial" src="{{imageurl('flexitest', 'leg_flexion_3.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('leg_flexion', 3, isset($test->flexitest) && $test->flexitest->leg_flexion == 3 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Flexão da Perna" class="img-responsive" style="display: initial" src="{{imageurl('flexitest', 'leg_flexion_4.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('leg_flexion', 4, isset($test->flexitest) && $test->flexitest->leg_flexion == 4 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
</div>