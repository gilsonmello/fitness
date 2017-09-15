<div class="modal fade" id="send-test-user-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Informe os e-mails que deseja enviar</h4>
            </div>

            {!! Form::open(array('route' => array('backend.send_email.tests.user', $value->id), 'class' => '', 'method' => 'POST'))  !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            <div class="form-group">
                                <label>E-mails</label>
                                <div class="input-group">
                                    <select name="email[]" class="form-control select2-tags" multiple="multiple" style="width: 100%">
                                        <option selected="selected">{{$value->email}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{ trans('strings.cancel_button') }}</button>
                    <button type="submit" class="btn btn-primary" id="">{{ trans('strings.send') }}</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>