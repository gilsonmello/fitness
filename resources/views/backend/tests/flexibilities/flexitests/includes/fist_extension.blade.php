<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            {!! Form::label('fist_extension', 'Extensão do Punho', []) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Extensão do Punho" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'fist_extension_1.png', 0)}}">
        </div>
        <div class="form-group">
            {!! Form::radio('fist_extension', 1, isset($test->flexibility) && $test->flexibility->fist_extension == 1 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Extensão do Punho" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'fist_extension_2.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('fist_extension', 2, isset($test->flexibility) && $test->flexibility->fist_extension == 2 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Extensão do Punho" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'fist_extension_3.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('fist_extension', 3, isset($test->flexibility) && $test->flexibility->fist_extension == 3 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Extensão do Punho" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'fist_extension_4.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('fist_extension', 4, isset($test->flexibility) && $test->flexibility->fist_extension == 4 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
</div>