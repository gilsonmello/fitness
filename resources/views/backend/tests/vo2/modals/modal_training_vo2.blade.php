<div class="modal fade" id="modal_training_vo2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Vo 2 Treino</h4>
            </div>
            {!! Form::open(['route' =>['backend.tests.save_training_vo2', $test->id], 'id' => 'save_training_vo2', 'role' => 'form', 'method' => 'post']) !!}

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            {!! Form::label('protocol', trans('strings.protocol'), []) !!}
                            {!! Form::select('protocol', $protocols->pluck('name', 'id')->all(), $trainingVo2, ['id' => 'protocol_training_vo2', 'witdh' => '100%', 'class' => 'form-control', 'data-placeholder' => trans('strings.protocol'), 'multiple' => 'multiple']) !!}
                        </div>
                    </div>
                </div>
                <?php $desactive = 'desactive';?>
                <div class="row row-input">
                    @if(count($test->trainingVo2) > 0)
                        <?php $desactive = '';?>
                        @foreach($test->trainingVo2 as $value)
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 calculated" id="{{$value->protocol->name}}">
                                <div class="form-group">
                                    <label for="protocol_{{$value->protocol->id}}[result]"><strong>{{$value->protocol->name}}.:</strong> {{$value->protocol->formula}}</label>
                                    <input type="hidden" name="protocol_{{$value->protocol->id}}[id]" value="{{$value->protocol->id}}">
                                    <div class="input-group">
                                        <input id="protocol_{{$value->protocol->id}}[result]" name="protocol_{{$value->protocol->id}}[result]" value="{{$value->result}}" type="text" class="number input_training_vo2 form-control">
                                        <span class="input-group-addon" id="">{{ $value->protocol->measure->initials }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="protocol_{{$value->protocol->id}}[obs]">{{trans('strings.obs')}}</label>
                                    <textarea id="protocol_{{$value->protocol->id}}[obs]" name="protocol_{{$value->protocol->id}}[obs]" class="textarea form-control">
                                        {{ $value->obs }}
                                    </textarea>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                {{--<div class="row {{$desactive}}" id="btn_save_maximum_vo2">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="pull-left">
                            <button class="btn btn-xs btn-success btn-calculate desactive">{{ trans('strings.Calculate') }}</button>
                        </div>
                        <div class="pull-right">
                            <input type="submit" class="btn btn-xs btn-primary" value="{{ trans('strings.save_button') }}" />
                        </div>
                    </div>
                </div>--}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{ trans('strings.cancel_button') }}</button>
                <button type="submit" class="btn btn-primary {{$desactive}}" id="btn_save_training_vo2">{{ trans('strings.save_button') }}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>