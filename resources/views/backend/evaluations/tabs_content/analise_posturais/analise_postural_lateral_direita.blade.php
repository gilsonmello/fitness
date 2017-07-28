<div class="tab-pane" id="tab_analise_postural_lateral_direita">

    {!! Form::open(['route' => ['backend.evaluations.update_analise_postural_lateral_direita', $evaluation->id], 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'update_analise_postural_lateral_direita']) !!}
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input type="checkbox" {{ $evaluation->analisePosturalLateralDireita->ldhc == 1 ? "checked" : "" }} id="ldhc" name="ldhc" value="1" class="minimal" />
            <label for="ldhc">Hiperlordose Cervical</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralDireita->ldht == 1 ? "checked" : "" }} id="ldht" name="ldht" value="1" class="minimal" />
            <label for="ldht">Hiperlordose Torácica</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralDireita->ldhl == 1 ? "checked" : ""}} id="ldhl" name="ldhl" value="1" class="minimal" />
            <label for="ldhl">Hiperlordose Lombar</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralDireita->ldcp == 1 ? "checked" : "" }} id="ldcp" name="ldcp" value="1" class="minimal" />
            <label for="ldcp">Costa Plana</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralDireita->ldgr == 1 ? "checked" : "" }} id="ldgr" name="ldgr" value="1" class="minimal" />
            <label for="ldgr">Geno Recurvato</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralDireita->ldgf == 1 ? "checked" : "" }} id="ldgf" name="ldgf" value="1" class="minimal" />
            <label for="ldgf">Geno Flexo</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralDireita->ldact == 1 ? "checked" : "" }} id="ldact" name="ldact" value="1" class="minimal" />
            <label for="ldact">Atitude Citófica Torácica</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralDireita->ldll == 1 ? "checked" : "" }} id="ldll" name="ldll" value="1" class="minimal" />
            <label for="ldll">Lordose Lombar</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralDireita->ldas == 1 ? "checked" : "" }} id="ldas" name="ldas" value="1" class="minimal" />
            <label for="ldas">Aparentemente Saudável</label>
            <br><br>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
            {!! Form::label('obs', trans('strings.obs'), ['class' => '']) !!}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 pull-right">
            {!! Form::textarea('obs', $evaluation->analisePosturalLateralDireita->obs, ['width' => '100%', 'class' => 'form-control textarea', 'placeholder' => trans('strings.obs')]) !!}
        </div>
    </div>
    {!! Form::close() !!}
    <br>
    <br>


    {!! Form::open(['route' => ['backend.evaluations.send_img_analise_postural_lateral_direita', $evaluation->id], 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'send_img_analise_postural_lateral_direita']) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4" style="margin-bottom: 10px;">
            {!! Form::label('image', trans('strings.image'), ['class' => '']) !!}
            <input type="file" name="img" id="btn_img_analise_postural_lateral_direita" accept="image/jpeg,image/png,image/gif,image/bmp">
            <br>
            <div class="progress desactive">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" id="visualizar">
            <img src="{{imageurl('analise_postural', !is_null($evaluation->analisePosturalLateralDireita) ? $evaluation->analisePosturalLateralDireita->img : NULL, 400, true)}}" id="img-reader" style="width: 100%; height: 380px;">
        </div>
    </div>
    <br>
    {!! Form::close() !!}
    <br>
    <div class="row btn-desactive">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="pull-right">
                <img src="{!!asset('img')!!}/loading.gif" class="desactive">
                <input type="submit" class="btn btn-success" id="btn_update_analise_postural_lateral_direita" value="{{ trans('strings.save_button') }}" />
            </div>
        </div>
    </div>
</div>