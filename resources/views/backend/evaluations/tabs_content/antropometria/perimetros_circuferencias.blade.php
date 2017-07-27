<form class="form-horizontal" method="POST" action="{{ route('backend.evaluations.update_antropometria', ['id' => $evaluation->id]) }}" id="update_antropometria">
    <div class="row">
        <br>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('right_arm', trans('strings.right_arm'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                    <div class="input-group">
                        {!! Form::text('right_arm', !is_null($evaluation->antropometria) ? $evaluation->antropometria->right_arm : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.right_arm')]) !!}
                        <span class="input-group-addon" id="">cm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('left_arm', trans('strings.left_arm'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                    <div class="input-group">
                        {!! Form::text('left_arm', !is_null($evaluation->antropometria) ? $evaluation->antropometria->left_arm : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.left_arm')]) !!}
                        <span class="input-group-addon" id="">cm</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('tummy', trans('strings.tummy'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                    <div class="input-group">
                        {!! Form::text('tummy', !is_null($evaluation->antropometria) ? $evaluation->antropometria->tummy : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.tummy')]) !!}
                        <span class="input-group-addon" id="">cm</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('hip', trans('strings.hip'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                    <div class="input-group">
                        {!! Form::text('hip', !is_null($evaluation->antropometria) ? $evaluation->antropometria->hip : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.hip')]) !!}
                        <span class="input-group-addon" id="">cm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('coxa_proximal', "Coxa Proximal", ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                    <div class="input-group">
                        {!! Form::text('coxa_proximal', !is_null($evaluation->antropometria) ? $evaluation->antropometria->coxa_proximal : NULL, ['class' => 'cm form-control', 'placeholder' => "Coxa Proximal"]) !!}
                        <span class="input-group-addon" id="">cm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('coxa_medial', "Coxa Medial", ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                    <div class="input-group">
                        {!! Form::text('coxa_medial', !is_null($evaluation->antropometria) ? $evaluation->antropometria->coxa_medial : NULL, ['class' => 'cm form-control', 'placeholder' => "Coxa Medial"]) !!}
                        <span class="input-group-addon" id="">cm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('coxa_distal', "Coxa Distal", ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                    <div class="input-group">
                        {!! Form::text('coxa_distal', !is_null($evaluation->antropometria) ? $evaluation->antropometria->coxa_distal : NULL, ['class' => 'cm form-control', 'placeholder' => "Coxa Distal"]) !!}
                        <span class="input-group-addon" id="">cm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('right_leg', trans('strings.right_leg'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                    <div class="input-group">
                        {!! Form::text('right_leg', !is_null($evaluation->antropometria) ? $evaluation->antropometria->right_leg : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.right_leg')]) !!}
                        <span class="input-group-addon" id="">cm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('left_leg', trans('strings.left_leg'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                    <div class="input-group">
                        {!! Form::text('left_leg', !is_null($evaluation->antropometria) ? $evaluation->antropometria->left_leg : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.left_leg')]) !!}
                        <span class="input-group-addon" id="">cm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('forearm', trans('strings.forearm'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}

                <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                    <div class="input-group">
                        {!! Form::text('forearm', !is_null($evaluation->antropometria) ? $evaluation->antropometria->forearm : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.forearm')]) !!}
                        <span class="input-group-addon" id="">cm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('chest', trans('strings.chest'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                    <div class="input-group">
                        {!! Form::text('chest', !is_null($evaluation->antropometria) ? $evaluation->antropometria->chest : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.chest')]) !!}
                        <span class="input-group-addon" id="">cm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('waist', trans('strings.waist'), ['class' => 'control-label col-xs-12 col-sm-3 col-md-5 col-lg-6']) !!}
                <div class="col-xs-12 col-sm-9 col-md-7 col-lg-6">
                    <div class="input-group">
                        {!! Form::text('waist', !is_null($evaluation->antropometria) ? $evaluation->antropometria->waist : NULL, ['class' => 'cm form-control', 'placeholder' => trans('strings.waist')]) !!}
                        <span class="input-group-addon" id="">cm</span>
                    </div>
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
