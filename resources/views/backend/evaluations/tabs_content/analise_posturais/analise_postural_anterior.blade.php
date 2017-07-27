<div class="tab-pane active" id="tab_analise_postural_anterior">
    {!! Form::open(['route' => ['backend.evaluations.update_analise_postural_anterior', $evaluation->id], 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'update_analise_postural_anterior']) !!}
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->arlcd == 1 ? $evaluation->analisePosturalAnterior->arlcd : "checked" }} id="arlcd" name="arlcd" value="1" class="minimal" />
            <label for="arlcd">Rotação Lateral Cervical Dir.</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->arlce == 1 ? $evaluation->analisePosturalAnterior->arlce : "checked" }} id="arlce" name="arlce" value="1" class="minimal" />
            <label for="arlce">Rotação Lateral Cervical Esq.</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->ailcd == 1 ? $evaluation->analisePosturalAnterior->ailcd : "checked" }} id="ailcd" name="ailcd" value="1" class="minimal" />
            <label for="ailcd">Inclinação Lateral Cervical Dir.</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->ailce == 1 ? $evaluation->analisePosturalAnterior->ailce : "checked" }} id="ailce" name="ailce" value="1" class="minimal" />
            <label for="ailce">Inclinação Lateral Cervical Esq.</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->aeod == 1 ? $evaluation->analisePosturalAnterior->aeod : "checked" }} id="aeod" name="aeod" value="1" class="minimal" />
            <label for="aeod">Elevação do Ombro Dir.</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->aeoe == 1 ? $evaluation->analisePosturalAnterior->aeoe : "checked" }} id="aeoe" name="aeoe" value="1" class="minimal" />
            <label for="aeoe">Elevação do Ombro Esq.</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->armpd == 1 ? $evaluation->analisePosturalAnterior->armpd : "checked" }} id="aeoe" name="armpd" value="1" class="minimal" />
            <label for="armpd">Rotação Medial do Punho Dir.</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->armpe == 1 ? $evaluation->analisePosturalAnterior->armpe : "checked" }} id="armpe" name="armpe" value="1" class="minimal" />
            <label for="armpe">Rotação Medial do Punho Esq.</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->admp == 1 ? $evaluation->analisePosturalAnterior->admp : "checked" }} id="admp" name="admp" value="1" class="minimal" />
            <label for="admp">Desalinhamento de Mamilos e Peitoral</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->adq == 1 ? $evaluation->analisePosturalAnterior->adq : "checked" }} id="adq" name="adq" value="1" class="minimal" />
            <label for="adq">Desequilíbrio de Quadril</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->aami == 1 ? $evaluation->analisePosturalAnterior->aami : "checked" }} id="aami" name="aami" value="1" class="minimal" />
            <label for="aami">Assimetría de Membro Inferior</label>
            <br><br>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->ajvaro == 1 ? $evaluation->analisePosturalAnterior->ajvaro : "checked" }} id="ajvaro" name="ajvaro" value="1" class="minimal" />
            <label for="ajvaro">Joelho Varo</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->ajvalgo == 1 ? $evaluation->analisePosturalAnterior->ajvalgo : "checked" }} id="ajvalgo" name="ajvalgo" value="1" class="minimal" />
            <label for="ajvalgo">Joelho Valgo</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->arijde == 1 ? $evaluation->analisePosturalAnterior->arijde : "checked" }} id="arijde" name="arijde" value="1" class="minimal" />
            <label for="arijde">Rotação Interna de Joelho Dir/Esq.</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->apede == 1 ? $evaluation->analisePosturalAnterior->apede : "checked" }} id="apede" name="apede" value="1" class="minimal" />
            <label for="apede">Pé em Eversão Dir/Esq.</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->apide == 1 ? $evaluation->analisePosturalAnterior->apide : "checked" }} id="apide" name="apide" value="1" class="minimal" />
            <label for="apide">Pé em Inversão Dir/Esq.</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->apabdutode == 1 ? $evaluation->analisePosturalAnterior->apabdutode : "checked" }} id="apabdutode" name="apabdutode" value="1" class="minimal" />
            <label for="apabdutode">Pé Abduto Dir/Esq.</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->admi == 1 ? $evaluation->analisePosturalAnterior->admi : "checked" }} id="admi" name="admi" value="1" class="minimal" />
            <label for="admi">Desalinhamento dos Maléolos Int.</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->ape == 1 ? $evaluation->analisePosturalAnterior->ape : "checked" }} id="ape" name="ape" value="1" class="minimal" />
            <label for="ape">Pé Equino</label>
            <br><br>
            <input type="checkbox" {{ !is_null($evaluation->analisePosturalAnterior) && $evaluation->analisePosturalAnterior->aas == 1 ? $evaluation->analisePosturalAnterior->aas : "checked" }} id="aas" name="aas" value="1" class="minimal" />
            <label for="aas">Aparentemente Saudável</label>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
            {!! Form::label('obs', trans('strings.obs'), ['class' => '']) !!}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 pull-right">
            {!! Form::textarea('obs', $evaluation->analisePosturalAnterior->obs, ['width' => '100%', 'class' => 'form-control textarea', 'placeholder' => trans('strings.obs'). ' CM']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    <br>
    <br>
    {!! Form::open(['route' => ['backend.evaluations.send_img_analise_postural_anterior', $evaluation->id], 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'send_img_analise_postural_anterior']) !!}

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4" style="margin-bottom: 10px;">
            {!! Form::label('imaage', trans('strings.imaage'), ['class' => '']) !!}
            <input type="file" name="img" id="img_a" accept="image/jpeg,image/png,image/gif,image/bmp">
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
    <br>
    <div class="row btn-desactive">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="pull-right">
                <img src="{!!asset('img')!!}/loading.gif" class="desactive">
                <input type="submit" class="btn btn-success" id="btn-update_analise_postural_anterior" value="{{ trans('strings.save_button') }}" />
            </div>
        </div>
    </div>
</div>