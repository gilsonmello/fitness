<div class="small-box bg-aqua" style="cursor: pointer">
    <div class="inner" data-toggle="modal" data-target="#modal_maximum_vo2" >
        <h3>Vo 2 Máximo</h3>
        <p>Vo 2 Máximo</p>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
    </div>
    {{--<button data-toggle="modal" data-target="#modal_maximum_vo2" class="btn btn-block btn-info">
        Criar Testes <i class="fa fa-arrow-circle-right"></i>
    </button>
    <button id="modal_additional_data_maximum_vo2" class="btn btn-block btn-info" style="margin-top: 2px">
        Dados Adicionais <i class="fa fa-arrow-circle-right"></i>
    </button>--}}
</div>
@include('backend.tests.vo2.modals.modal_maximum_vo2'){{--
@include('backend.tests.vo2.modals.modal_additional_data_maximum_vo2')--}}

<div class="small-box bg-aqua" style="cursor: pointer;">
    <div class="inner" data-toggle="modal" data-target="#modal_training_vo2">
        <h3>Vo 2 Treino</h3>
        <p>Vo 2 Treino</p>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
    </div>
    {{--<button data-toggle="modal" data-target="#modal_training_vo2" class="btn btn-block btn-info">
        Criar Testes <i class="fa fa-arrow-circle-right"></i>
    </button>
    <button id="modal_additional_data_training_vo2" class="btn btn-block btn-info" style="margin-top: 2px">
        Dados Adicionais <i class="fa fa-arrow-circle-right"></i>
    </button>--}}
</div>
@include('backend.tests.vo2.modals.modal_training_vo2'){{--
@include('backend.tests.vo2.modals.modal_additional_data_training_vo2')--}}

<div class="small-box bg-aqua" style="cursor: pointer;">
    <div class="inner" data-toggle="modal" data-target="#target_zone">
        <h3>Zona Alvo</h3>
        <p>Zona Alvo</p>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
    </div>
    {{--<button data-toggle="modal" data-target="#target_zone" class="btn btn-block btn-info">
        Criar Testes <i class="fa fa-arrow-circle-right"></i>
    </button>
    <button id="modal_additional_data_target_zone" class="btn btn-block btn-info" style="margin-top: 2px">
        Dados Adicionais <i class="fa fa-arrow-circle-right"></i>
    </button>--}}
</div>
@include('backend.tests.target_zones.modals.target_zone'){{--
@include('backend.tests.target_zones.modals.additional_data_target_zone')--}}
