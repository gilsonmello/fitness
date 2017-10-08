/**
 * Created by Junnyor on 17/08/2017.
 */
$(function(){

    /*$('#modal_additional_data_target_zone').on('click', function(){
        openModalWithFields({
            routeBlade: '/admin/tests/additional_data_target_zone',
            inputClass: 'input_validate_additional_data_target_zone'
        });
    });*/

    tests({
        name: 'target_zone',
        form: $('#save_target_zone'),
        btn: $('#btn_save_target_zone'),
        inputSelect: $("#protocol_target_zone"),
        classInputText: 'input_target_zone',
        inputText: $('.input_target_zone'),
        row: $('#save_target_zone').find('.row-input'),
        route: {
            destroy: 'destroy_target_zone'
        }
    });

/*
    validateForm({
        el: $('#save_additional_data_target_zone'),
        input: $('.input_validate_additional_data_target_zone')
    });*/

});