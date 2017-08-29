<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            {!! Form::label('plantar_flexion', 'Flexão Plantar', []) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Flexão Plantar" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'plantar_flexion_1.png', 0)}}">
        </div>
        <div class="form-group">
            {!! Form::radio('plantar_flexion', 1, isset($test->flexibility) && $test->flexibility->plantar_flexion == 1 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Flexão Plantar" for="plantar_flexion" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'plantar_flexion_1.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('plantar_flexion', 2, isset($test->flexibility) && $test->flexibility->plantar_flexion == 2 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Flexão Plantar" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'plantar_flexion_1.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('plantar_flexion', 3, isset($test->flexibility) && $test->flexibility->plantar_flexion == 3 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Flexão Plantar" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'plantar_flexion_1.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('plantar_flexion', 4, isset($test->flexibility) && $test->flexibility->plantar_flexion == 4 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
</div>