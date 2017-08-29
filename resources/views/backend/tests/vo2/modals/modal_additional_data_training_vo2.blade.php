<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Dados Adicionais - Vo 2 Treino</h4>
            </div>

            <form id="save_additional_data_training_vo2" action="{{route('backend.tests.save_additional_data', ['id' => 4])}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                   <div class="row">
                       <?php $desactive = 'desactive';?>
                        @forelse($additionalDataTrainingVo2 as $value)
                               <?php $desactive = '';?>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                <div class="form-group">
                                    {!! Form::label('additional_data_training_vo2_id_'.$value->id, $value->name, ['class' => '']) !!}
                                    <div class="input-group">
                                        {!! Form::text('additional_data_id_'.$value->id, $value->value, ['id' => 'additional_data_training_vo2_id_'.$value->id, 'class' => 'decimal form-control input_validate_additional_data_training_vo2', 'placeholder' => $value->name]) !!}
                                        <span class="input-group-addon" id="">{{ $value->measure->initials }}</span>
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