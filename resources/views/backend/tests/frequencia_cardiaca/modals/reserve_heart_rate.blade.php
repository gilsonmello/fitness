<div class="modal fade" id="modal_reserve_heart_rate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Frequência Cardíaca Reserva</h4>
            </div>
            {!! Form::open(['route' =>['backend.tests.save_reserve_heart_rate', $test->id], 'id' => 'save_reserve_heart_rate', 'role' => 'form', 'method' => 'post']) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            {!! Form::label('protocol', trans('strings.protocol'), []) !!}
                            {!! Form::select('protocol', $protocols->pluck('name', 'id')->all(), $reserveHeartRates, ['id' => 'protocol_reserve_heart_rate', 'witdh' => '100%', 'class' => 'form-control', 'data-placeholder' => trans('strings.protocol'), 'multiple' => 'multiple']) !!}
                        </div>
                    </div>
                </div>
                <?php $desactive = 'desactive';?>
                <div class="row row-input">
                    @if(count($test->reserveHeartRate) > 0)
                        <?php $desactive = '';?>
                        @foreach($test->reserveHeartRate as $value)
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 calculated" id="{{str_replace(' ', '_', $value->protocol->name)}}">
                                <div class="form-group">
                                    <label for="protocol_reserve_heart_rate_{{$value->protocol->id}}[result]">{{$value->protocol->name}}.: {{$value->protocol->formula}}</label><br>
                                    <label for="protocol_reserve_heart_rate_{{$value->protocol->id}}[result]">
                                        {{$value->protocol->formula}}
                                    </label>
                                    <input type="hidden" name="protocol_{{$value->protocol->id}}[id]" value="{{$value->protocol->id}}">
                                    <div class="input-group">
                                        <input id="protocol_reserve_heart_rate_{{$value->protocol->id}}[result]" name="protocol_{{$value->protocol->id}}[result]" value="{{$value->result}}" type="text" class="number input_reserve_heart_rate form-control">
                                        <span class="input-group-addon" id="">{{ $value->protocol->measure->initials }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{ trans('strings.cancel_button') }}</button>
                <button type="submit" class="btn btn-primary {{$desactive}}" id="btn_save_reserve_heart_rate">{{ trans('strings.save_button') }}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>