<div class="small-box bg-aqua">
    <div class="inner">
        <h3>FCM</h3>
        <p>Frequência Cardíaca Máxima</p>
    </div>
    <div class="icon">
        <i class="ion ion-bag"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>

<!-- /.box-header -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title" style="display: block; cursor: pointer" data-widget="collapse">Máxima</h3>
        {{--<div class="box-tools pull-right">
            <button id="add-test-frequencia-cardiaca" type="button" class="btn btn-box-tool">
                <i class="fa fa-plus"></i>
                Adicionar Teste
            </button>
        </div>--}}
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    {!! Form::label('protocol', trans('strings.protocol'), []) !!}
                    {!! Form::select('protocol', $protocols->pluck('name', 'id')->all(), $protocols_id['maximumHeartRate'], ['id' => 'protocol_maximum_heart_rate', 'witdh' => '100%', 'class' => 'form-control', 'data-placeholder' => trans('strings.protocol'), 'multiple' => 'multiple']) !!}
                </div>
            </div>
        </div>
        {!! Form::open(['route' =>['backend.tests.save_maximum_heart_rate', $test->id], 'id' => 'save_maximum_heart_rate', 'role' => 'form', 'method' => 'post']) !!}
                <?php $desactive = 'desactive';?>
                <div class="row row-input">
                    @if(count($test->maximumHeartRate) > 0)
                        <?php $desactive = '';?>
                        @foreach($test->maximumHeartRate as $maximumHeartRate)
                               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6" id="{{$maximumHeartRate->protocol->name}}">
                                    <div class="form-group">
                                        <label for="protocol_{{$maximumHeartRate->protocol->id}}[result]"><strong>{{$maximumHeartRate->protocol->name}}.:</strong> {{$maximumHeartRate->protocol->formula}}</label>
                                        <input type="hidden" name="protocol_{{$maximumHeartRate->protocol->id}}[id]" value="{{$maximumHeartRate->protocol->id}}">
                                        <br><label>Resultado</label>
                                        <input id="protocol_{{$maximumHeartRate->protocol->id}}[result]" name="protocol_{{$maximumHeartRate->protocol->id}}[result]" value="{{$maximumHeartRate->result}}" type="text" class="number input_maximum_heart_rate form-control">
                                    </div>
                                </div>
                        @endforeach
                    @endif
                </div>
                 <div class="row {{$desactive}}" id="btn_save_maximum_heart_rate">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-xs btn-primary" value="{{ trans('strings.save_button') }}" />
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
        {!! Form::close() !!}
    </div>
</div>