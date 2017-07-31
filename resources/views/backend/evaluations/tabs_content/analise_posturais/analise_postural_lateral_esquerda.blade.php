<div class="tab-pane" id="tab_analise_postural_lateral_esquerda">

    {!! Form::open(['route' => ['backend.evaluations.update_analise_postural_lateral_esquerda', $evaluation->id], 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'update_analise_postural_lateral_esquerda']) !!}
    {!! Form::hidden('uploaded_image', '0') !!}
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input type="checkbox" {{ $evaluation->analisePosturalLateralEsquerda->lehc == 1 ? "checked" : "" }} id="lehc" name="lehc" value="1" class="minimal" />
            <label for="lehc">Hiperlordose Cervical</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralEsquerda->leht == 1 ? "checked" : "" }} id="leht" name="leht" value="1" class="minimal" />
            <label for="leht">Hiperlordose Torácica</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralEsquerda->lehl == 1 ? "checked" : ""}} id="lehl" name="lehl" value="1" class="minimal" />
            <label for="lehl">Hiperlordose Lombar</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralEsquerda->lecp == 1 ? "checked" : "" }} id="lecp" name="lecp" value="1" class="minimal" />
            <label for="lecp">Costa Plana</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralEsquerda->legr == 1 ? "checked" : "" }} id="legr" name="legr" value="1" class="minimal" />
            <label for="legr">Geno Recurvato</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralEsquerda->legf == 1 ? "checked" : "" }} id="legf" name="legf" value="1" class="minimal" />
            <label for="legf">Geno Flexo</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralEsquerda->leact == 1 ? "checked" : "" }} id="leact" name="leact" value="1" class="minimal" />
            <label for="leact">Atitude Citófica Torácica</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralEsquerda->lell == 1 ? "checked" : "" }} id="lell" name="lell" value="1" class="minimal" />
            <label for="lell">Lordose Lombar</label>
            <br><br>
            <input type="checkbox" {{ $evaluation->analisePosturalLateralEsquerda->leas == 1 ? "checked" : "" }} id="leas" name="leas" value="1" class="minimal" />
            <label for="leas">Aparentemente Saudável</label>
            <br><br>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
            {!! Form::label('obs', trans('strings.obs'), ['class' => '']) !!}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 pull-right">
            {!! Form::textarea('obs', $evaluation->analisePosturalLateralEsquerda->obs, ['width' => '100%', 'class' => 'form-control textarea', 'placeholder' => trans('strings.obs'). ' CM']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    <br>
    <br>


    {!! Form::open(['route' => ['backend.evaluations.send_img_analise_postural_lateral_esquerda', $evaluation->id], 'files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'send_img_analise_postural_lateral_esquerda']) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4" style="margin-bottom: 10px;">
            {!! Form::label('image', trans('strings.image'), ['class' => '']) !!}
            <input type="file" name="img" id="btn_img_analise_postural_lateral_esquerda" accept="image/jpeg,image/png,image/gif,image/bmp">
            <br>
            <div class="progress desactive">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" id="visualizar">
            @if(!is_null($evaluation->analisePosturalLateralEsquerda->img))
                @if(imageurl('analise_postural', $evaluation->analisePosturalLateralEsquerda->img, 400, true) != "")
                    <img src="{{imageurl('analise_postural', $evaluation->analisePosturalLateralEsquerda->img, 400, true)}}" id="img-reader" style="width: 100%; height: 380px;">
                @elseif(imageurl('analise_postural', $evaluation->analisePosturalLateralEsquerda->img, 0, true) != "")
                    <img src="{{imageurl('analise_postural', $evaluation->analisePosturalLateralEsquerda->img, 0, true)}}" id="img-reader" style="width: 100%; height: 380px;">
                @else
                    <img src="" id="img-reader" class="desactive" style="width: 100%; height: 380px;">
                @endif
            @else
                <img src="" id="img-reader" class="desactive" style="width: 100%; height: 380px;">
            @endif
        </div>
    </div>
    <br>
    {!! Form::close() !!}
    <br>
    <div class="row btn-desactive">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="pull-right">
                <img src="{!!asset('img')!!}/loading.gif" class="desactive">
                <input type="submit" class="btn btn-success" id="btn_update_analise_postural_lateral_esquerda" value="{{ trans('strings.save_button') }}" />
            </div>
        </div>
    </div>
</div>