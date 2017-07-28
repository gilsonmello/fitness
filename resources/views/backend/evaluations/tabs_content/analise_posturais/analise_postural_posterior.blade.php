<div class="tab-pane" id="tab_analise_postural_posterior">
    {!! Form::open(['route' => ['backend.evaluations.update_analise_postural_posterior', $evaluation->id], 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'update_analise_postural_posterior']) !!}
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input type="checkbox" {{ $evaluation->analisePosturalPosterior->pec == 1 ? "checked" : "" }} id="pec" name="pec" value="1" class="minimal" />
            <label for="pec">Escoliose Cervical</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalPosterior->pet == 1 ? "checked" : "" }} id="pet" name="pet" value="1" class="minimal" />
            <label for="pet">Escoliose Torácica</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalPosterior->pel == 1 ? "checked" : "" }} id="pel" name="pel" value="1" class="minimal" />
            <label for="pel">Escoliose Lombar</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalPosterior->pde == 1 ? "checked" : "" }} id="pde" name="pde" value="1" class="minimal" />
            <label for="pde">Desalinhamento de Escápulas</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalPosterior->peabduzidas == 1 ? "checked" : "" }} id="peabduzidas" name="peabduzidas" value="1" class="minimal" />
            <label for="peabduzidas">Escápulas Abduzidas</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalPosterior->peaduzidas == 1 ? "checked" : "" }} id="peaduzidas" name="peaduzidas" value="1" class="minimal" />
            <label for="peaduzidas">Escápulas Aduzidas</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalPosterior->pdda == 1 ? "checked" : "" }} id="pdda" name="pdda" value="1" class="minimal" />
            <label for="pdda">Desalinhamento de Dobra Axilar</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalPosterior->pdq == 1 ? "checked" : "" }} id="pdq" name="pdq" value="1" class="minimal" />
            <label for="pdq">Desalinhamento de Quadril</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalPosterior->pdpd == 1 ? "checked" : "" }} id="pdpd" name="pdpd" value="1" class="minimal" />
            <label for="pdpd">Dobra Poplítea Desalinhada</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalPosterior->prmp == 1 ? "checked" : "" }} id="prmp" name="prmp" value="1" class="minimal" />
            <label for="prmp">Rotação Medial de Punhos</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalPosterior->pas == 1 ? "checked" : "" }} id="pas" name="pas" value="1" class="minimal" />
            <label for="pas">Aparentemente Saudável</label>
            <br><br>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
            {!! Form::label('obs', trans('strings.obs'), ['class' => '']) !!}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 pull-right">
            {!! Form::textarea('obs', $evaluation->analisePosturalPosterior->obs, ['width' => '100%', 'class' => 'form-control textarea', 'placeholder' => trans('strings.obs')]) !!}
        </div>
    </div>
    {!! Form::close() !!}
    <br>
    <br>
    {!! Form::open(['route' => ['backend.evaluations.send_img_analise_postural_posterior', $evaluation->id], 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'send_img_analise_postural_posterior']) !!}

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4" style="margin-bottom: 10px;">
            {!! Form::label('imaage', trans('strings.imaage'), ['class' => '']) !!}
            <input type="file" name="img" id="btn_img_analise_postural_posterior" accept="image/jpeg,image/png,image/gif,image/bmp">
            <br>
            <div class="progress desactive">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" id="visualizar">
            <img src="{{imageurl('analise_postural', !is_null($evaluation->analisePosturalPosterior) ? $evaluation->analisePosturalPosterior->img : NULL, 400, true)}}" class="desactive" id="img-reader" style="width: 100%; height: 380px;">
        </div>
    </div>
    <br>
    {!! Form::close() !!}
    <br>
    <div class="row btn-desactive">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="pull-right">
                <img src="{!!asset('img')!!}/loading.gif" class="desactive">
                <input type="submit" class="btn btn-success" id="btn_update_analise_postural_posterior" value="{{ trans('strings.save_button') }}" />
            </div>
        </div>
    </div>
</div>