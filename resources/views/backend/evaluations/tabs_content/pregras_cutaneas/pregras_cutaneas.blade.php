{!! Form::open(['route' => ['backend.evaluations.update_pregras_cutaneas', $evaluation->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'update_pregras_cutaneas']) !!}
<div class="row">
    <br>
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('biceps', trans('strings.biceps'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
            <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                <div class="input-group">
                    {!! Form::text('biceps', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->biceps : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.biceps')]) !!}
                    <span class="input-group-addon" id="">MM</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('triceps', trans('strings.triceps'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
            <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                <div class="input-group">
                    {!! Form::text('triceps', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->triceps : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.triceps')]) !!}
                    <span class="input-group-addon" id="">MM</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('subescapular', trans('strings.subescapular'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
            <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                <div class="input-group">
                    {!! Form::text('subescapular', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->subescapular : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.subescapular')]) !!}
                    <span class="input-group-addon" id="">MM</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('peitoral', trans('strings.peitoral'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
            <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                <div class="input-group">
                    {!! Form::text('peitoral', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->peitoral : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.peitoral')]) !!}
                    <span class="input-group-addon" id="">MM</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('supra_ilíaca', trans('strings.supra_ilíaca'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
            <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                <div class="input-group">
                    {!! Form::text('supra_ilíaca', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->supra_ilíaca : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.supra_ilíaca')]) !!}
                    <span class="input-group-addon" id="">MM</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('coxa', trans('strings.coxa'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
            <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                <div class="input-group">
                    {!! Form::text('coxa', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->coxa : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.coxa')]) !!}
                    <span class="input-group-addon" id="">MM</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('abdominal', trans('strings.abdominal'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
            <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                <div class="input-group">
                    {!! Form::text('abdominal', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->abdominal : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.abdominal')]) !!}
                    <span class="input-group-addon" id="">MM</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('panturrilha', trans('strings.panturrilha'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
            <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                <div class="input-group">
                    {!! Form::text('panturrilha', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->panturrilha : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.panturrilha')]) !!}
                    <span class="input-group-addon" id="">MM</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('axilar_media', trans('strings.axilar_media'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-4 col-lg-6']) !!}
            <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
                <div class="input-group">
                    {!! Form::text('axilar_media', !is_null($evaluation->pregrasCutanea) ? $evaluation->pregrasCutanea->axilar_media : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.axilar_media')]) !!}
                    <span class="input-group-addon" id="">MM</span>
                </div>
            </div>
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
{!! Form::close() !!}