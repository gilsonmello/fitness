<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            {!! Form::label('plantar_dorsiflexion', trans('strings.plantar_dorsiflexion'), []) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Dorse Flexão Plantar" class="img-responsive" style="display: initial" src="{{imageurl('flexitest', 'plantar_dorsiflexion_1.png', 0)}}">
        </div>
        <div class="form-group">
            {!! Form::radio('plantar_dorsiflexion', 1, isset($test->flexitest) && $test->flexitest->plantar_dorsiflexion == 1 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Dorse Flexão Plantar" class="img-responsive" style="display: initial" src="{{imageurl('flexitest', 'plantar_dorsiflexion_2.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('plantar_dorsiflexion', 2, isset($test->flexitest) && $test->flexitest->plantar_dorsiflexion == 2 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Dorse Flexão Plantar" class="img-responsive" style="display: initial" src="{{imageurl('flexitest', 'plantar_dorsiflexion_3.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('plantar_dorsiflexion', 3, isset($test->flexitest) && $test->flexitest->plantar_dorsiflexion == 3 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Dorse Flexão Plantar" class="img-responsive" style="display: initial" src="{{imageurl('flexitest', 'plantar_dorsiflexion_4.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('plantar_dorsiflexion', 4, isset($test->flexitest) && $test->flexitest->plantar_dorsiflexion == 4 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
</div>