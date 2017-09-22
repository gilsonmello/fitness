<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('strings.maximum_heart_rate')}}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        @if(count($current->maximumHeartRate) > 0)
            <table id="example2" cellspacing="0" class="table table-bordered table-hover data-table">
                <thead>
                <tr>
                    <th>{{ trans('strings.protocols') }}</th>
                    <th>{{ trans('strings.formula') }}</th>
                    <th>{{ trans('strings.result') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($current->maximumHeartRate as $value)
                    <tr>
                        <td>{{$value->protocol->name}}</td>
                        <td>{{$value->protocol->formula}}</td>
                        <td>{{$value->result}}</td>
                    </tr>
                @empty
                    Vazio
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>{{ trans('strings.protocols') }}</th>
                    <th>{{ trans('strings.formula') }}</th>
                    <th>{{ trans('strings.result') }}</th>
                </tr>
                </tfoot>
            </table>
        @else
            <h5>Não há registros para a Frequência Cadíaca Máxima</h5>
        @endif
    </div>
    <div class="box-footer">

    </div>
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('strings.minimum_heart_rate')}}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        @if(count($current->minimumHeartRate) > 0)
            <table id="example2" cellspacing="0" class="table table-bordered table-hover data-table">
                <thead>
                <tr>
                    <th>{{ trans('strings.protocols') }}</th>
                    <th>{{ trans('strings.formula') }}</th>
                    <th>{{ trans('strings.result') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($current->minimumHeartRate as $value)
                    <tr>
                        <td>{{$value->protocol->name}}</td>
                        <td>{{$value->protocol->formula}}</td>
                        <td>{{$value->result}}</td>
                    </tr>
                @empty
                    Vazio
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>{{ trans('strings.protocols') }}</th>
                    <th>{{ trans('strings.formula') }}</th>
                    <th>{{ trans('strings.result') }}</th>
                </tr>
                </tfoot>
            </table>
        @else
            <h5>Não há registros para a frequência cardíaca repouso</h5>
        @endif
    </div>
    <div class="box-footer">

    </div>
</div>


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('strings.reserve_heart_rate')}}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        @if(count($current->reserveHeartRate) > 0)
            <table id="example2" cellspacing="0" class="table table-bordered table-hover data-table">
                <thead>
                <tr>
                    <th>{{ trans('strings.protocols') }}</th>
                    <th>{{ trans('strings.formula') }}</th>
                    <th>{{ trans('strings.result') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($current->reserveHeartRate as $value)
                    <tr>
                        <td>{{$value->protocol->name}}</td>
                        <td>{{$value->protocol->formula}}</td>
                        <td>{{$value->result}}</td>
                    </tr>
                @empty
                    Vazio
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>{{ trans('strings.protocols') }}</th>
                    <th>{{ trans('strings.formula') }}</th>
                    <th>{{ trans('strings.result') }}</th>
                </tr>
                </tfoot>
            </table>
        @else
            <h5>Não há registros para a frequência cardíaca reserva</h5>
        @endif
    </div>
    <div class="box-footer">

    </div>
</div>


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('strings.maximum_vo2')}}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        @if(count($current->maximumVo2) > 0)
            <table id="example2" cellspacing="0" class="table table-bordered table-hover data-table">
                <thead>
                <tr>
                    <th>{{ trans('strings.protocols') }}</th>
                    <th>{{ trans('strings.formula') }}</th>
                    <th>{{ trans('strings.result') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($user->tests[0]->maximumVo2 as $value)
                    <tr>
                        <td>{{$value->protocol->name}}</td>
                        <td>{{$value->protocol->formula}}</td>
                        <td>{{$value->result}}</td>
                    </tr>
                @empty
                    Vazio
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>{{ trans('strings.protocols') }}</th>
                    <th>{{ trans('strings.formula') }}</th>
                    <th>{{ trans('strings.result') }}</th>
                </tr>
                </tfoot>
            </table>
        @else
            <h5>Não há registros para o Vo 2 Máximo</h5>
        @endif
    </div>
    <div class="box-footer">

    </div>
</div>


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('strings.training_vo2')}}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        @if(count($current->trainingVo2) > 0)
            <table id="example2" cellspacing="0" class="table table-bordered table-hover data-table">
                <thead>
                <tr>
                    <th>{{ trans('strings.protocols') }}</th>
                    <th>{{ trans('strings.formula') }}</th>
                    <th>{{ trans('strings.result') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($current->trainingVo2 as $value)
                    <tr>
                        <td>{{$value->protocol->name}}</td>
                        <td>{{$value->protocol->formula}}</td>
                        <td>{{$value->result}}</td>
                    </tr>
                @empty
                    Vazio
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>{{ trans('strings.protocols') }}</th>
                    <th>{{ trans('strings.formula') }}</th>
                    <th>{{ trans('strings.result') }}</th>
                </tr>
                </tfoot>
            </table>
        @else
            <h5>Não há registros para o Vo 2 Treino</h5>
        @endif
    </div>
    <div class="box-footer">

    </div>
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('strings.target_zone')}}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        @if(count($current->targetZone) > 0)
            <table id="example2" cellspacing="0" class="table table-bordered table-hover data-table">
                <thead>
                <tr>
                    <th>{{ trans('strings.protocols') }}</th>
                    <th>{{ trans('strings.formula') }}</th>
                    <th>{{ trans('strings.result') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($current->targetZone as $value)
                    <tr>
                        <td>{{$value->protocol->name}}</td>
                        <td>{{$value->protocol->formula}}</td>
                        <td>{{$value->result}}</td>
                    </tr>
                @empty
                    Vazio
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>{{ trans('strings.protocols') }}</th>
                    <th>{{ trans('strings.formula') }}</th>
                    <th>{{ trans('strings.result') }}</th>
                </tr>
                </tfoot>
            </table>
        @else
            <h5>Não há registros para a Zona Alvo</h5>
        @endif
    </div>
    <div class="box-footer">

    </div>
</div>


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('strings.maximum_repeat')}}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <?php $supine = supine($current->id); $squat = squat($current->id);?>
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <h3>Supino</h3>
                @if($supine)
                    <div class="form-group">
                        {!! Form::label('load_estimed', trans('strings.load_estimed'), ['class' => '']) !!}
                        <div class="input-group">
                            {!! Form::text('load_estimed', $supine->load_estimed, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.load_estimed')]) !!}
                            <span class="input-group-addon" id="">&nbsp;KG&nbsp;</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            {!! Form::text('option_1', $supine->option_1, ['readonly', 'class' => 'decimal form-control', 'placeholder' => '10%']) !!}
                            <span class="input-group-addon" id="">10%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            {!! Form::text('option_2', $supine->option_2, ['readonly', 'class' => 'decimal form-control', 'placeholder' => '20%']) !!}
                            <span class="input-group-addon" id="">20%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            {!! Form::text('option_3', $supine->option_3, ['readonly', 'class' => 'decimal form-control', 'placeholder' => '30%']) !!}
                            <span class="input-group-addon" id="">30%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            {!! Form::text('option_3', $supine->option_4, ['readonly', 'class' => 'decimal form-control', 'placeholder' => '40%']) !!}
                            <span class="input-group-addon" id="">40%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            {!! Form::text('maximum_repeat', $supine->maximum_repeat, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.maximum_repeat')]) !!}
                            <span class="input-group-addon" id="">&nbsp;RM&nbsp;</span>
                        </div>
                    </div>
                @else
                    <h5>Não há registros</h5>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <h3>{{trans('strings.squat')}}</h3>
                @if($squat)
                    <div class="form-group">
                        {!! Form::label('load_estimed', trans('strings.load_estimed'), ['class' => '']) !!}
                        <div class="input-group">
                            {!! Form::text('load_estimed', $squat->load_estimed, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.load_estimed')]) !!}
                            <span class="input-group-addon" id="">&nbsp;KG&nbsp;</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            {!! Form::text('option_1', $squat->option_1, ['readonly', 'class' => 'decimal form-control', 'placeholder' => '10%']) !!}
                            <span class="input-group-addon" id="">10%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            {!! Form::text('option_2', $squat->option_2, ['readonly', 'class' => 'decimal form-control', 'placeholder' => '20%']) !!}
                            <span class="input-group-addon" id="">20%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            {!! Form::text('option_3', $squat->option_3, ['readonly', 'class' => 'decimal form-control', 'placeholder' => '30%']) !!}
                            <span class="input-group-addon" id="">20%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            {!! Form::text('option_4', $squat->option_4, ['readonly', 'class' => 'decimal form-control', 'placeholder' => '40%']) !!}
                            <span class="input-group-addon" id="">20%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            {!! Form::text('maximum_repeat', $squat->maximum_repeat, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.maximum_repeat')]) !!}
                            <span class="input-group-addon" id="">&nbsp;RM&nbsp;</span>
                        </div>
                    </div>
                @else
                    <h5>Não há registros</h5>
                @endif
            </div>
        </div>
    </div>
    <div class="box-footer">

    </div>
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('strings.flexibility')}}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        @if(count($current->flexitest) > 0)
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if($current->flexitest->abduction_shoulders)
                        <div class="form-group">
                            {!! Form::label('abduction_shoulders', trans('strings.abduction_shoulders'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('abduction_shoulders', $current->flexitest->abduction_shoulders, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.abduction_shoulders')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <h3>{{ trans('strings.abduction_shoulders') }}</h3>
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if($current->flexitest->lateral_trunk_flexion)
                        <div class="form-group">
                            {!! Form::label('lateral_trunk_flexion', trans('strings.lateral_trunk_flexion'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('lateral_trunk_flexion', $current->flexitest->lateral_trunk_flexion, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.lateral_trunk_flexion')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <h3>{{ trans('strings.lateral_trunk_flexion') }}</h3>
                            <h5>Não há registros></h5>
                        </div>
                    @endif
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if(!is_null($current->flexitest->leg_hyperextension))
                        <div class="form-group">
                            {!! Form::label('leg_hyperextension', trans('strings.leg_hyperextension'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('leg_hyperextension', $current->flexitest->leg_hyperextension, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.leg_hyperextension')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('leg_hyperextension', trans('strings.leg_hyperextension'), ['class' => '']) !!}
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if(!is_null($current->flexitest->elbow_flexion))
                        <div class="form-group">
                            {!! Form::label('elbow_flexion', trans('strings.elbow_flexion'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('elbow_flexion', $current->flexitest->elbow_flexion, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.elbow_flexion')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('elbow_flexion', trans('strings.elbow_flexion'), ['class' => '']) !!}
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if(!is_null($current->flexitest->elbow_hyperextension))
                        <div class="form-group">
                            {!! Form::label('elbow_hyperextension', trans('strings.elbow_hyperextension'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('elbow_hyperextension', $current->flexitest->elbow_hyperextension, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.elbow_hyperextension')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('elbow_flexion', trans('strings.elbow_hyperextension'), ['class' => '']) !!}
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if(!is_null($current->flexitest->fist_flexion))
                        <div class="form-group">
                            {!! Form::label('fist_flexion', trans('strings.fist_flexion'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('fist_flexion', $current->flexitest->fist_flexion, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.fist_flexion')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('fist_flexion', trans('strings.fist_flexion'), ['class' => '']) !!}
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if(!is_null($current->flexitest->fist_extension))
                        <div class="form-group">
                            {!! Form::label('fist_extension', trans('strings.fist_extension'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('fist_extension', $current->flexitest->fist_extension, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.fist_extension')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('fist_extension', trans('strings.fist_extension'), ['class' => '']) !!}
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if(!is_null($current->flexitest->horizontal_shoulder_abduction))
                        <div class="form-group">
                            {!! Form::label('horizontal_shoulder_abduction', trans('strings.horizontal_shoulder_abduction'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('horizontal_shoulder_abduction', $current->flexitest->horizontal_shoulder_abduction, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.horizontal_shoulder_abduction')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('horizontal_shoulder_abduction', trans('strings.horizontal_shoulder_abduction'), ['class' => '']) !!}
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if(!is_null($current->flexitest->hip_flexion))
                        <div class="form-group">
                            {!! Form::label('hip_flexion', trans('strings.hip_flexion'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('hip_flexion', $current->flexitest->hip_flexion, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.hip_flexion')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('hip_flexion', trans('strings.hip_flexion'), ['class' => '']) !!}
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if(!is_null($current->flexitest->trunk_hyperextension))
                        <div class="form-group">
                            {!! Form::label('trunk_hyperextension', trans('strings.trunk_hyperextension'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('trunk_hyperextension', $current->flexitest->trunk_hyperextension, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.trunk_hyperextension')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('trunk_hyperextension', trans('strings.trunk_hyperextension'), ['class' => '']) !!}
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if(!is_null($current->flexitest->haunch_flexion))
                        <div class="form-group">
                            {!! Form::label('haunch_flexion', trans('strings.haunch_flexion'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('haunch_flexion', $current->flexitest->haunch_flexion, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.haunch_flexion')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('haunch_flexion', trans('strings.haunch_flexion'), ['class' => '']) !!}
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if(!is_null($current->flexitest->haunch_extension))
                        <div class="form-group">
                            {!! Form::label('haunch_extension', trans('strings.haunch_extension'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('haunch_extension', $current->flexitest->haunch_extension, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.haunch_extension')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('haunch_extension', trans('strings.haunch_extension'), ['class' => '']) !!}
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if(!is_null($current->flexitest->leg_flexion))
                        <div class="form-group">
                            {!! Form::label('leg_flexion', trans('strings.leg_flexion'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('leg_flexion', $current->flexitest->leg_flexion, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.leg_flexion')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('leg_flexion', trans('strings.leg_flexion'), ['class' => '']) !!}
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if(!is_null($current->flexitest->plantar_dorsiflexion))
                        <div class="form-group">
                            {!! Form::label('plantar_dorsiflexion', trans('strings.plantar_dorsiflexion'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('plantar_dorsiflexion', $current->flexitest->plantar_dorsiflexion, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.plantar_dorsiflexion')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('plantar_dorsiflexion', trans('strings.plantar_dorsiflexion'), ['class' => '']) !!}
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    @if(!is_null($current->flexitest->plantar_flexion))
                        <div class="form-group">
                            {!! Form::label('plantar_flexion', trans('strings.plantar_flexion'), ['class' => '']) !!}
                            <div class="input-group">
                                {!! Form::text('plantar_flexion', $current->flexitest->plantar_flexion, ['readonly', 'class' => 'decimal form-control', 'placeholder' => trans('strings.plantar_flexion')]) !!}
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('plantar_flexion', trans('strings.plantar_flexion'), ['class' => '']) !!}
                            <h5>Não há registro</h5>
                        </div>
                    @endif
                </div>
            </div>

        @else
            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                <h5>Não há registro</h5>
            </div>
        @endif
    </div>

    <div class="box-footer">

    </div>
</div>




