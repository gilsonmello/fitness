$(function(){

    tests({
        name: 'maximum_vo2',
        form: $('#save_maximum_vo2'),
        btn: $('#btn_save_maximum_vo2'),
        inputSelect: $("#protocol_maximum_vo2"),
        classInputText: 'input_maximum_vo2',
        inputText: $('.input_maximum_vo2'),
        row: $('#save_maximum_vo2').find('.row-input'),
        route: {
            destroy: 'destroy_maximum_vo2'
        }
    });

    tests({
        name: 'training_vo2',
        form: $('#save_training_vo2'),
        btn: $('#btn_save_training_vo2'),
        inputSelect: $("#protocol_training_vo2"),
        classInputText: 'input_training_vo2',
        inputText: $('.input_training_vo2'),
        row: $('#save_training_vo2').find('.row-input'),
        route: {
            destroy: 'destroy_training_vo2'
        }
    });

   /* $('#modal_additional_data_maximum_vo2').on('click', function(){
        openModalWithFields({
            routeBlade: '/admin/tests/additional_data_maximum_vo2',
            inputClass: 'input_validate_additional_data_maximum_vo2'
        });
    });*/
/*
    validateForm({
        el: $('#save_additional_data_maximum_vo2'),
        input: $('.input_validate_additional_data_maximum_vo2')
    });*/

 /*   $('#modal_additional_data_training_vo2').on('click', function(){
        openModalWithFields({
            routeBlade: '/admin/tests/additional_data_training_vo2',
            inputClass: 'input_validate_additional_data_training_vo2'
        });
    });*/

   /* validateForm({
        el: $('#save_additional_data_training_vo2'),
        input: $('.input_validate_additional_data_training_vo2')
    });*/

    /*frequencyHeart({
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

    frequencyHeart({
        form: $('#save_reserve_heart_rate'),
        btn: $('#btn_save_reserve_heart_rate'),
        inputSelect: $("#protocol_reserve_heart_rate"),
        classInputText: 'input_reserve_heart_rate',
        inputText: $('.input_reserve_heart_rate'),
        row: $('#save_reserve_heart_rate').find('.row-input'),
        route: {
            destroy: 'destroy_reserve_heart_rate'
        }
    });*/

});