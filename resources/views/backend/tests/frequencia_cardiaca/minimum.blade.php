<!-- /.box-header -->
<div class="box box-primary collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title" style="display: block; cursor: pointer" data-widget="collapse">Mínima</h3>
        {{--<div class="box-tools pull-right">
            <button id="add-test-frequencia-cardiaca" type="button" class="btn btn-box-tool">
                <i class="fa fa-plus"></i>
                Adicionar Teste
            </button>
        </div>--}}
    </div>
    <div class="box-body" style="display: none;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    {!! Form::label('protocol', trans('strings.protocol'), []) !!}
                    {!! Form::select('protocol', $protocols->pluck('name', 'id')->all(), $protocols_id['minimumHeartRate'], ['id' => 'protocol_minimum_heart_rate', 'witdh' => '100%', 'class' => 'form-control', 'data-placeholder' => trans('strings.protocol'), 'multiple' => 'multiple']) !!}
                </div>
            </div>
        </div>
        {!! Form::open(['route' =>['backend.tests.save_minimum_heart_rate', $test->id], 'id' => 'save_minimum_heart_rate', 'role' => 'form', 'method' => 'post']) !!}
            <?php $desactive = 'desactive';?>
            <div class="row row-input">
                @if(count($test->minimumHeartRate) > 0)
                    <?php $desactive = '';?>
                    @foreach($test->minimumHeartRate as $minimumHeartRate)
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6" id="{{$minimumHeartRate->protocol->name}}">
                                <div class="form-group">
                                    <label for="protocol_{{$minimumHeartRate->protocol->id}}[result]">{{$minimumHeartRate->protocol->name}}.: {{$minimumHeartRate->protocol->formula}}</label>
                                    <input type="hidden" name="protocol_{{$minimumHeartRate->protocol->id}}[id]" value="{{$minimumHeartRate->protocol->id}}">
                                    <br><label>Resultado</label>
                                    <input name="protocol_{{$minimumHeartRate->protocol->id}}[result]" value="{{$minimumHeartRate->result}}" type="text" class="number input_minimum_heart_rate form-control">
                                </div>
                            </div>
                    @endforeach
                @endif
            </div>
        <div class="row {{$desactive}}" id="btn_save_minimum_heart_rate">
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