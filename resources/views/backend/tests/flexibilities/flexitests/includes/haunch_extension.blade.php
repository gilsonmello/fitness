<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            {!! Form::label('haunch_extension', 'Extensão da Coxa', []) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Extensão da Coxa" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'haunch_extension_1.png', 0)}}">
        </div>
        <div class="form-group">
            {!! Form::radio('haunch_extension', 1, isset($test->flexibility) && $test->flexibility->haunch_extension == 1 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Extensão da Coxa" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'haunch_extension_2.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('haunch_extension', 2, isset($test->flexibility) && $test->flexibility->haunch_extension == 2 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Extensão da Coxa" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'haunch_extension_3.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('haunch_extension', 3, isset($test->flexibility) && $test->flexibility->haunch_extension == 3 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">
        <div class="form-group">
            <img alt="Extensão da Coxa" class="img-responsive" style="display: initial" src="{{imageurl('flexibilities', 'haunch_extension_4.png', 0)}}">
        </div>
        <div class="form-group text-center">
            {!! Form::radio('haunch_extension', 4, isset($test->flexibility) && $test->flexibility->haunch_extension == 4 ? true : false, ['class' => 'flat-red form-control']) !!}
        </div>
    </div>
</div>