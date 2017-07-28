<form class="" method="POST" action="{{ route('backend.evaluations.update_weight_and_height', ['id' => $evaluation->id]) }}" id="update_weight_and_height">
    <br>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('weight', trans('strings.weight'), ['class' => '']) !!}
                <div class="input-group">
                    {!! Form::text('weight', !is_null($evaluation->evaluationAttribute) ? $evaluation->evaluationAttribute->weight : NULL, ['class' => 'form-control cm', 'placeholder' => trans('strings.weight')]) !!}
                    <span class="input-group-addon" id="">KG</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            {!! Form::label('height', trans('strings.height'), ['class' => '']) !!}
            <div class="input-group">
                {!! Form::text('height', !is_null($evaluation->evaluationAttribute) ? $evaluation->evaluationAttribute->height : NULL, ['class' => 'form-control cm', 'placeholder' => trans('strings.height')]) !!}
                <span class="input-group-addon" id="">M</span>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="pull-right">
                <input type="submit" class="btn btn-success" value="{{ trans('strings.save_button') }}" />
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</form>