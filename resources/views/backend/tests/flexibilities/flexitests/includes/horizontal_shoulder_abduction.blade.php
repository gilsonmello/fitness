<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            {!! Form::label('horizontal_shoulder_abduction', 'Abdução Horizontal dos Ombros', []) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Abdução Horizontal dos Ombros" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'horizontal_shoulder_abduction_1.png', 0)}}">
        </div>
        <div class="form-group">
            {!! Form::radio('horizontal_shoulder_abduction', 1, isset($test->flexibility) && $test->flexibility->horizontal_shoulder_abduction == 1 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Abdução Horizontal dos Ombros" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'horizontal_shoulder_abduction_2.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('horizontal_shoulder_abduction', 2, isset($test->flexibility) && $test->flexibility->horizontal_shoulder_abduction == 2 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Abdução Horizontal dos Ombros" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'horizontal_shoulder_abduction_3.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('horizontal_shoulder_abduction', 3, isset($test->flexibility) && $test->flexibility->horizontal_shoulder_abduction == 3 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Abdução Horizontal dos Ombros" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'horizontal_shoulder_abduction_4.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('horizontal_shoulder_abduction', 4, isset($test->flexibility) && $test->flexibility->horizontal_shoulder_abduction == 4 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
</div>