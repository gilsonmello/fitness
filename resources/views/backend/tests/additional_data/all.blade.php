<div class="modal fade" id="modal_additional_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Dados Adicionais - {!! $test->evaluation->user->name !!}</h4>
            </div>

            <form id="save_additional_data" action="{{route('backend.tests.save_additional_data', ['evaluation_id' => $test->evaluation->id])}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <?php $desactive = 'desactive';?>
                        @forelse($additionalData as $value)
                            <?php $desactive = '';?>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                <div class="form-group">
                                    {!! Form::label('additional_data_id_'.$value->id, $value->name, ['class' => '']) !!}
                                    <div class="input-group">
                                        {!! Form::text('additional_data_id_'.$value->id, $value->value, ['id' => 'additional_data_id_'.$value->id, 'class' => 'decimal form-control input_validate_additional_data', 'placeholder' => $value->name]) !!}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label>
                                        Não existe dados adicionais cadastrados
                                    </label>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{ trans('strings.cancel_button') }}</button>
                    <button type="submit" class="{{ $desactive }} btn btn-primary" id="">{{ trans('strings.save_button') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>