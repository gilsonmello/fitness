<div class="modal fade" id="modal_wells_bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            {!! Form::open(['route' => ['backend.tests.save_wells_bank', $test->id], 'id' => 'save_wells_bank', 'role' => 'form', 'method' => 'post']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Banco de Wells</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group">
                            {!! Form::label('right_leg', trans('strings.right_leg'), []) !!}
                            <div class="input-group">
                                {!! Form::text('right_leg', !is_null($test->wellsBank) ? $test->wellsBank->right_leg : NULL, ['class' => 'decimal form-control', 'placeholder' => trans('strings.right_leg')]) !!}
                                <span class="input-group-addon" id="">CM</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group">
                            {!! Form::label('left_leg', trans('strings.left_leg'), []) !!}
                            <div class="input-group">
                                {!! Form::text('left_leg', !is_null($test->wellsBank) ? $test->wellsBank->left_leg : NULL, ['class' => 'decimal form-control', 'placeholder' => trans('strings.left_leg')]) !!}
                                <span class="input-group-addon" id="">CM</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group">
                            {!! Form::label('trunk', trans('strings.trunk'), []) !!}
                            <div class="input-group">
                                {!! Form::text('trunk', !is_null($test->wellsBank) ? $test->wellsBank->trunk : NULL, ['class' => 'decimal form-control', 'placeholder' => trans('strings.trunk')]) !!}
                                <span class="input-group-addon" id="">CM</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            {!! Form::label('obs', trans('strings.obs'), []) !!}
                            {!! Form::textarea('obs', !is_null($test->wellsBank) ? $test->wellsBank->obs : NULL, ['class' => 'textarea form-control', 'placeholder' => trans('strings.obs')]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{ trans('strings.cancel_button') }}</button>
                <button type="submit" class="btn btn-primary">{{ trans('strings.save_button') }}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>