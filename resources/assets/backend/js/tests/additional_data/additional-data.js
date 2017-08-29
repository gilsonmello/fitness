/**
 * Created by Junnyor on 24/08/2017.
 */
$(function(){

    validateForm({
        el: $('#save_additional_data'),
        validate: 0
    });

    /*$('#save_additional_data').on('click', function(){
        openModalWithFields({
            routeBlade: '/admin/tests/'+test_id+'/additional_data',
            inputClass: 'input_validate_additional_data'
        });
    });*/
});
