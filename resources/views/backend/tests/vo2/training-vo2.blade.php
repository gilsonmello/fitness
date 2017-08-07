<div class="box box-primary collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title" style="display: block; cursor: pointer;" data-widget="collapse">Vo 2 Treino</h3>
        {{--<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>--}}
    </div>
    <div class="box-body" style="display: none;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    {!! Form::label('protocol', trans('strings.protocol'), []) !!}
                    {!! Form::select('protocol', $protocols->pluck('name', 'id')->all(), $protocols_id['trainingVo2'], ['id' => 'protocol_training_vo2', 'witdh' => '100%', 'class' => 'form-control', 'data-placeholder' => trans('strings.protocol'), 'multiple' => 'multiple']) !!}
                </div>
            </div>
        </div>
        {!! Form::open(['route' =>['backend.tests.save_training_vo2', $test->id], 'id' => 'save_training_vo2', 'role' => 'form', 'method' => 'post']) !!}
        <?php $desactive = 'desactive';?>
        <div class="row row-input">
            @if(count($test->trainingVo2) > 0)
                <?php $desactive = '';?>
                @foreach($test->trainingVo2 as $trainingVo2)
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6" id="{{$trainingVo2->protocol->name}}">
                        <div class="form-group">
                            <label for="protocol_{{$trainingVo2->protocol->id}}[result]"><strong>{{$trainingVo2->protocol->name}}.:</strong> {{$trainingVo2->protocol->formula}}</label>
                            <input type="hidden" name="protocol_{{$trainingVo2->protocol->id}}[id]" value="{{$trainingVo2->protocol->id}}">
                            <br><label>Resultado</label>
                            <input id="protocol_{{$trainingVo2->protocol->id}}[result]" name="protocol_{{$trainingVo2->protocol->id}}[result]" value="{{$trainingVo2->result}}" type="text" class="number input_training_vo2 form-control">
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row {{$desactive}}" id="btn_save_training_vo2">
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