<div class="small-box bg-aqua" style="cursor: pointer">
    <div class="inner" data-toggle="modal" data-target="#modal_maximum_heart_rate" >
        <h3>FCM</h3>
        <p>Frequência Cardíaca Máxima</p>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
    </div>
    {{--<button data-toggle="modal" data-target="#modal_maximum_heart_rate" class="btn btn-block btn-info">
        Criar Testes <i class="fa fa-arrow-circle-right"></i>
    </button>
    <button id="modal_additional_data_maximum_heart_rate" class="btn btn-block btn-info" style="margin-top: 2px">
        Dados Adicionais <i class="fa fa-arrow-circle-right"></i>
    </button>--}}
</div>
@include('backend.tests.frequencia_cardiaca.modals.maximum_heart_rate'){{--
@include('backend.tests.frequencia_cardiaca.modals.additional_data_maximum_heart_rate')--}}


<div class="small-box bg-aqua" style="cursor: pointer">
    <div class="inner" data-toggle="modal" data-target="#modal_minimum_heart_rate">
        <h3>FCR</h3>
        <p>Frequência Cardíaca Minima</p>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
    </div>
    {{--<button data-toggle="modal" data-target="#modal_minimum_heart_rate" class="btn btn-block btn-info">
        Criar Testes <i class="fa fa-arrow-circle-right"></i>
    </button>
    <button id="modal_additional_data_minimum_heart_rate" class="btn btn-block btn-info" style="margin-top: 2px">
        Dados Adicionais <i class="fa fa-arrow-circle-right"></i>
    </button>--}}
</div>
@include('backend.tests.frequencia_cardiaca.modals.minimum_heart_rate'){{--
@include('backend.tests.frequencia_cardiaca.modals.additional_data_minimum_heart_rate')--}}

<div class="small-box bg-aqua" style="cursor: pointer;">
    <div class="inner" data-toggle="modal" data-target="#modal_reserve_heart_rate">
        <h3>RFC</h3>
        <p>Frequência Cardíaca Reserva</p>
    </div>
    <div class="icon">
        <i class="ion ion-bag"></i>
    </div>
    {{--<button data-toggle="modal" data-target="#modal_reserve_heart_rate" class="btn btn-block btn-info">
        Criar Testes <i class="fa fa-arrow-circle-right"></i>
    </button>
    <button id="modal_additional_data_reserve_heart_rate" class="btn btn-block btn-info" style="margin-top: 2px">
        Dados Adicionais <i class="fa fa-arrow-circle-right"></i>
    </button>--}}
</div>
@include('backend.tests.frequencia_cardiaca.modals.reserve_heart_rate'){{--
@include('backend.tests.frequencia_cardiaca.modals.additional_data_reserve_heart_rate')--}}






