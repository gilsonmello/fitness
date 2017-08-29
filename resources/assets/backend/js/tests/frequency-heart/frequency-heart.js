$(function(){

    tests({
        name: 'maximum_heart_rate',
        form: $('#save_maximum_heart_rate'),
        btn: $('#btn_save_maximum_heart_rate'),
        inputSelect: $("#protocol_maximum_heart_rate"),
        classInputText: 'input_maximum_heart_rate',
        inputText: $('.input_maximum_heart_rate'),
        row: $('#save_maximum_heart_rate').find('.row-input'),
        route: {
            destroy: 'destroy_maximum_heart_rate'
        }
    });

    tests({
        name: 'minimum_heart_rate',
        form: $('#save_minimum_heart_rate'),
        btn: $('#btn_save_minimum_heart_rate'),
        inputSelect: $("#protocol_minimum_heart_rate"),
        classInputText: 'input_minimum_heart_rate',
        inputText: $('.input_minimum_heart_rate'),
        row: $('#save_minimum_heart_rate').find('.row-input'),
        route: {
            destroy: 'destroy_minimum_heart_rate'
        }
    });

    tests({
        name: 'reserve_heart_rate',
        form: $('#save_reserve_heart_rate'),
        btn: $('#btn_save_reserve_heart_rate'),
        inputSelect: $("#protocol_reserve_heart_rate"),
        classInputText: 'input_reserve_heart_rate',
        inputText: $('.input_reserve_heart_rate'),
        row: $('#save_reserve_heart_rate').find('.row-input'),
        route: {
            destroy: 'destroy_reserve_heart_rate'
        }
    });

    /*$('#modal_additional_data_maximum_heart_rate').on('click', function(){
        openModalWithFields({
            routeBlade: '/admin/tests/additional_data_maximum_heart_rate',
            inputClass: 'input_validate_additional_data_maximum_heart_rate'
        });
    });*/

   /* validateForm({
        el: $('#save_additional_data_maximum_heart_rate'),
        input: $('.input_validate_additional_data_maximum_heart_rate')
    });*/

    /*$('#modal_additional_data_minimum_heart_rate').on('click', function(){
        openModalWithFields({
            routeBlade: '/admin/tests/additional_data_minimum_heart_rate',
            inputClass: 'input_validate_additional_data_minimum_heart_rate'
        });
    });*/

    /*validateForm({
        el: $('#save_additional_data_minimum_heart_rate'),
        input: $('.input_validate_additional_data_minimum_heart_rate')
    });*/
/*
    $('#modal_additional_data_reserve_heart_rate').on('click', function(){
        openModalWithFields({
            routeBlade: '/admin/tests/additional_data_reserve_heart_rate',
            inputClass: 'input_validate_additional_data_reserve_heart_rate'
        });
    });*/

   /* validateForm({
        el: $('#save_additional_data_reserve_heart_rate'),
        input: $('.input_validate_additional_data_reserve_heart_rate')
    });*/

});