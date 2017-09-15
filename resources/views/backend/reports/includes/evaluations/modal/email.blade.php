<div class="modal fade" id="send-evaluation-user-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Dados Adicionais</h4>
            </div>

            <form id="save_additional_data" action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{ trans('strings.cancel_button') }}</button>
                    <button type="submit" class="btn btn-primary" id="">{{ trans('strings.save_button') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>