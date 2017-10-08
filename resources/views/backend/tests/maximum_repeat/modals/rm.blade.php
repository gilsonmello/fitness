<div class="modal fade" id="modal_rm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">RM({{trans('strings.maximum_repeat')}})</h4>
            </div>
            <div class="row">
                {{-- Formulário de resistência do tipo supino --}}
                <div class="ccol-xs-12 col-sm-12 col-md-6 col-lg-6">
                    {!! Form::open(['route' =>['backend.tests.save_rm', 'test_id' => $test->id, 'type_resistance' => 1], 'id' => 'supine', 'role' => 'form', 'method' => 'post']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('rm', 'Supino') !!}
                                </div>
                            </div>
                        </div>
                        <?php $desactive = 'desactive';?>
                        <div class="row row-input">
                            <?php $supine = supine($test->id);?>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="">
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('load_estimed', isset($supine) ? $supine->load_estimed : null, ['class' => 'decimal form-control', 'placeholder' => trans('strings.load_estimed')]) !!}
                                        <span class="input-group-addon" id="">&nbsp;KG&nbsp;</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('option_1', isset($supine) ? $supine->option_1 : null, ['class' => 'decimal form-control', 'placeholder' => trans('strings.result')]) !!}
                                        <span class="input-group-addon" id="">10%</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('option_2', isset($supine) ? $supine->option_2 : null, ['class' => 'decimal form-control', 'placeholder' => trans('strings.result')]) !!}
                                        <span class="input-group-addon" id="">10%</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('option_3', isset($supine) ? $supine->option_3 : null, ['class' => 'decimal form-control', 'placeholder' => trans('strings.result')]) !!}
                                        <span class="input-group-addon" id="">10%</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('option_4', isset($supine) ? $supine->option_4 : null, ['class' => 'decimal form-control', 'placeholder' => trans('strings.result')]) !!}
                                        <span class="input-group-addon" id="">10%</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('maximum_repeat', isset($supine) ? $supine->maximum_repeat : null, ['class' => 'decimal form-control', 'placeholder' => trans('strings.maximum_repeat')]) !!}
                                        <span class="input-group-addon" id="">&nbsp;RM&nbsp;</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="obs">{{trans('strings.obs')}}</label>
                                    <textarea id="obs" name="obs" class="textarea form-control">
                                        {{ isset($supine) ? $supine->obs : null }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{ trans('strings.cancel_button') }}</button>
                        <button type="submit" class="btn btn-primary" id="btn_save_resistance">{{ trans('strings.save_button') }}</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- Formulário de resistência do tipo agachamento --}}
                <div class="ccol-xs-12 col-sm-12 col-md-6 col-lg-6">
                    {!! Form::open(['route' =>['backend.tests.save_rm', 'test_id' => $test->id, 'type_resistance' => 2], 'id' => 'squat', 'role' => 'form', 'method' => 'post']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('rm', 'Agachamento') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row row-input">
                            <?php $squat = squat($test->id);?>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="">
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('load_estimed', isset($squat) ? $squat->load_estimed : null, ['class' => 'decimal form-control', 'placeholder' => trans('strings.load_estimed')]) !!}
                                        <span class="input-group-addon" id="">&nbsp;KG&nbsp;</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('option_1', isset($squat) ? $squat->option_1 : null, ['class' => 'decimal form-control', 'placeholder' => trans('strings.result')]) !!}
                                        <span class="input-group-addon" id="">10%</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('option_2', isset($squat) ? $squat->option_2 : null, ['class' => 'decimal form-control', 'placeholder' => trans('strings.result')]) !!}
                                        <span class="input-group-addon" id="">10%</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('option_3', isset($squat) ? $squat->option_3 : null, ['class' => 'decimal form-control', 'placeholder' => trans('strings.result')]) !!}
                                        <span class="input-group-addon" id="">10%</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('option_4', isset($squat) ? $squat->option_4 : null, ['class' => 'decimal form-control', 'placeholder' => trans('strings.result')]) !!}
                                        <span class="input-group-addon" id="">10%</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('maximum_repeat', isset($squat) ? $squat->maximum_repeat : null, ['class' => 'decimal form-control', 'placeholder' => trans('strings.maximum_repeat')]) !!}
                                        <span class="input-group-addon" id="">&nbsp;RM&nbsp;</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="obs">{{trans('strings.obs')}}</label>
                                    <textarea id="obs" name="obs" class="textarea form-control">
                                        {{ isset($squat) ? $squat->obs : null }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{ trans('strings.cancel_button') }}</button>
                        <button type="submit" class="btn btn-primary" id="btn_save_resistance">{{ trans('strings.save_button') }}</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>