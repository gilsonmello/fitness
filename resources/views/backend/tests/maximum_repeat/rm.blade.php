<div class="small-box bg-aqua" style="cursor: pointer;">
    <div class="inner" data-toggle="modal" data-target="#modal_rm">
        <h3>RM</h3>
        <p>{{trans('strings.maximum_repeat')}}</p>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
    </div>
</div>
@include('backend.tests.maximum_repeat.modals.rm')

<div class="small-box bg-aqua" style="cursor: pointer;">
    <div class="inner" data-toggle="modal" data-target="#modal_flexitests">
        <h3>Flexiteste</h3>
        <p>Flexiteste</p>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
    </div>
</div>
@include('backend.tests.flexibilities.flexitests.flexitests')

<div class="small-box bg-aqua" style="cursor: pointer;">
    <div class="inner" data-toggle="modal" data-target="#modal_wells_bank">
        <h3>Banco de Wells</h3>
        <p>Banco de Wells</p>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
    </div>
</div>
@include('backend.tests.flexibilities.wells_bank.wells_bank')

