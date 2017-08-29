<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            {!! Form::label('abduction_shoulders', 'Abdução dos Ombros', []) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Abdução dos Ombros" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'abduction_of_shoulders_1.png', 0)}}">
        </div>
        <div class="form-group">
            {!! Form::radio('abduction_shoulders', 1, isset($test->flexibility) && $test->flexibility->abduction_shoulders == 1 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Abdução dos Ombros" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'abduction_of_shoulders_2.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('abduction_shoulders', 2, isset($test->flexibility) && $test->flexibility->abduction_shoulders == 2 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Abdução dos Ombros" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'abduction_of_shoulders_3.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('abduction_shoulders', 3, isset($test->flexibility) && $test->flexibility->abduction_shoulders == 3 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Abdução dos Ombros" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'abduction_of_shoulders_4.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('abduction_shoulders', 4, isset($test->flexibility) && $test->flexibility->abduction_shoulders == 4 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
</div>