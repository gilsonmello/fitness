<form method="POST" action="{{ route('backend.evaluations.update_bioempedancia', ['id' => $evaluation->id]) }}" id="update_bioempedancia">
    <br>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                {!! Form::label('fat', trans('strings.fat'), ['class' => '']) !!}
                <div class="input-group">
                    {!! Form::text('fat', !is_null($evaluation->bioempedancia) ? $evaluation->bioempedancia->fat: NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.fat')]) !!}
                    <span class="input-group-addon" id="">%</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                {!! Form::label('muscle_mass', trans('strings.muscle_mass'), ['class' => '']) !!}
                <div class="input-group">
                    {!! Form::text('muscle_mass', !is_null($evaluation->bioempedancia) ? $evaluation->bioempedancia->muscle_mass : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.muscle_mass')]) !!}
                    <span class="input-group-addon" id="">%</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                {!! Form::label('body_water', trans('strings.body_water'), ['class' => '']) !!}
                <div class="input-group">
                    {!! Form::text('body_water', !is_null($evaluation->bioempedancia) ? $evaluation->bioempedancia->body_water: NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.body_water')]) !!}
                    <span class="input-group-addon" id="">%</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                {!! Form::label('osseous_weight', trans('strings.osseous_weight'), ['class' => '']) !!}
                <div class="input-group">
                    {!! Form::text('osseous_weight', !is_null($evaluation->bioempedancia) ? $evaluation->bioempedancia->osseous_weight : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.osseous_weight')]) !!}
                    <span class="input-group-addon" id="">KG</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                {!! Form::label('imc', trans('strings.imc'), ['class' => '']) !!}
                <div class="input-group">
                    {!! Form::text('imc', !is_null($evaluation->bioempedancia) ? $evaluation->bioempedancia->imc : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.imc')]) !!}
                    <span class="input-group-addon" id="">IMC</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="pull-right">
                <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</form>