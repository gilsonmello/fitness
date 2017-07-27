<div class="tab-pane" id="tab_analise_postural_lateral_esquerda">
    {!! Form::open(['route' => ['backend.evaluations.send_img_analise_postural_lateral_esquerda', $evaluation->id], 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'send_img_analise_postural_lateral_esquerda']) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4" style="margin-bottom: 10px;">
            {!! Form::label('image', trans('strings.image'), ['class' => '']) !!}
            <input type="file" name="img" id="img_a_p_l_e" accept="image/jpeg,image/png,image/gif,image/bmp">
            <br>
            <div class="progress desactive">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" id="visualizar">
            <img src="{{imageurl('analise_postural_anterior', !is_null($evaluation->analisePosturalAnterior) ? $evaluation->analisePosturalAnterior->img : NULL, 400, true)}}" id="img-reader" style="width: 100%; height: 380px;">
        </div>
    </div>
    <br>
    {!! Form::close() !!}
</div>