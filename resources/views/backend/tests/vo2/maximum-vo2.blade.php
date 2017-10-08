<!-- /.box-header -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title" style="display: block; cursor: pointer;" data-widget="collapse">Vo 2 Máximo</h3>
        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_maximum_vo2">
            Criar Testes
        </button>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_additional_data_maximum_vo2">
            Dados Adicionais
        </button>
        {{--<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>--}}
    </div>
    <div class="box-body" style="display: block;">
        {{--<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    {!! Form::label('protocol', trans('strings.protocol'), []) !!}
                    {!! Form::select('protocol', $protocols->pluck('name', 'id')->all(), $protocols_id['maximumVo2'], ['id' => 'protocol_maximum_vo2', 'witdh' => '100%', 'class' => 'form-control', 'data-placeholder' => trans('strings.protocol'), 'multiple' => 'multiple']) !!}
                </div>
            </div>
        </div>--}}
        {{--{!! Form::open(['route' =>['backend.tests.save_maximum_vo2', $test->id], 'id' => 'save_maximum_vo2', 'role' => 'form', 'method' => 'post']) !!}--}}
        <?php //$desactive = 'desactive';?>
        <?php //$desactive = '';?>
        {{--<div class="row row-input">
            @if(count($test->maximumVo2) > 0)

                @foreach($test->maximumVo2 as $maximumVo2)
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6" id="{{$maximumVo2->protocol->name}}">
                        <div class="form-group">
                            <label for="protocol_{{$maximumVo2->protocol->id}}[result]"><strong>{{$maximumVo2->protocol->name}}.:</strong> {{$maximumVo2->protocol->formula}}</label>
                            <input type="hidden" name="protocol_{{$maximumVo2->protocol->id}}[id]" value="{{$maximumVo2->protocol->id}}">
                            <br><label>Resultado</label>
                            <input id="protocol_{{$maximumVo2->protocol->id}}[result]" name="protocol_{{$maximumVo2->protocol->id}}[result]" value="{{$maximumVo2->result}}" type="text" class="number input_maximum_vo2 form-control">
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row {{$desactive}}" id="btn_save_maximum_vo2">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pull-right">
                    <input type="submit" class="btn btn-xs btn-primary" value="{{ trans('strings.save_button') }}" />
                </div>
            </div>
        </div>
        <div class="clearfix"></div>--}}
        {{--{!! Form::close() !!}--}}
    </div>
</div>