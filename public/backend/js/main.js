/**
 * Created by Junnyor on 22/08/2017.
 */
$(function(){
    $('#backend-auth-store').validate({
        submitHandler: function(form) {
            form.submit();
        },
        rules: {
            cpf: {
                required: true,
                isCPF: true
            },
            password: {
                required: true,
                minlength: 6
            },
            email: {
                required: true,
                email: true,
                remote: '/admin/auth/find/email_exists'
            }
        },
        messages: {
            cpf: {
                required: 'Campo Obrigatório',
                isCPF: 'Informe um CPF válido'
            },
            password: {
                required: 'Campo Obrigatório',
                minlength: 'Informe a senha com no mínimo 6 carácteres'
            },
            email: {
                required: 'Campo Obrigatório',
                email: 'Informe um e-mail válido',
                remote: "E-mail existente"
            }
        }
    });

    $('#backend-auth-update').validate({
        submitHandler: function(form) {
            form.submit();
        },
        rules: {
            cpf: {
                required: true,
                isCPF: true
            },
            email: {
                required: true,
                email: true,
                remote: '/admin/auth/find/email_exists?user_id='+ $('input[name="user_id"]').val()
            }
        },
        messages: {
            cpf: {
                required: 'Campo Obrigatório',
                isCPF: 'Informe um CPF válido'
            },
            email: {
                required: 'Campo Obrigatório',
                email: 'Informe um e-mail válido',
                remote: "E-mail existente"
            }
        }
    });
});

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
/**
 * Created by Junnyor on 14/08/2017.
 */
$(function(){

    var supine = $('#supine');
    supine.find('input[name="load_estimed"]').on('blur', function(){
        var load_estimed = $(this).val();
        load_estimed = parseFloat(load_estimed);
        if(!isNaN(load_estimed)){
            var result = undefined;
            for(var i = 1; i <= 4; i++){
                if(i == 1){
                    var option = supine.find('input[name="option_'+i+'"]');
                    result = parseFloat(load_estimed) * 0.1 + parseFloat(load_estimed);
                    option.val(result.format(2, true));
                }else{
                    var prevOption = supine.find('input[name="option_'+(i-1)+'"]').val();
                    var option = supine.find('input[name="option_'+i+'"]');
                    result = parseFloat(prevOption) * 0.1 + parseFloat(prevOption);
                    option.val(result.format(2, true));
                }
            }
        }
    });

    supine.validate({
        submitHandler: function(frm){
            var data = supine.serialize();
            var action = supine.attr('action');
            swal({
                title: "Você realmente deseja atualizar os dados?",
                type: "info",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#00a65a",
                confirmButtonText: "Salvar",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                $.ajax({
                    url: action,
                    method: 'POST',
                    dataType: 'Json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    data: data,
                    success: function (data) {
                        if(data == 'true')
                            swal("Atualizado!", "", "success");
                        else
                            swal("Oops...", "Ocorreu algum erro, revise os dados informados!", "error");
                    },
                    error: function(data){
                        swal("Oops...", "Ocorreu algum erro, revise os dados informados!", "error");
                    }
                });

            });
        }
    });

    var squat = $('#squat');
    squat.find('input[name="load_estimed"]').on('blur', function(){
        var load_estimed = $(this).val();
        load_estimed = parseFloat(load_estimed);
        if(!isNaN(load_estimed)){
            var result = undefined;
            for(var i = 1; i <= 4; i++){
                if(i == 1){
                    var option = squat.find('input[name="option_'+i+'"]');
                    result = parseFloat(load_estimed) * 0.1 + parseFloat(load_estimed);
                    option.val(result.format(2, true));
                }else{
                    var prevOption = squat.find('input[name="option_'+(i-1)+'"]').val();
                    var option = squat.find('input[name="option_'+i+'"]');
                    result = parseFloat(prevOption) * 0.1 + parseFloat(prevOption);
                    option.val(result.format(2, true));
                }
            }
        }
    });

    squat.validate({
        submitHandler: function(frm){
            var data = squat.serialize();
            var action = squat.attr('action');
            swal({
                title: "Você realmente deseja atualizar os dados?",
                type: "info",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#00a65a",
                confirmButtonText: "Salvar",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                $.ajax({
                    url: action,
                    method: 'POST',
                    dataType: 'Json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    data: data,
                    success: function (data) {
                        if(data == 'true')
                            swal("Atualizado!", "", "success");
                        else
                            swal("Oops...", "Ocorreu algum erro, revise os dados informados!", "error");
                    },
                    error: function(data){
                        swal("Oops...", "Ocorreu algum erro, revise os dados informados!", "error");
                    }
                });

            });
        }
    });
});
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
/**
 * Created by Junnyor on 14/08/2017.
 */
$(function(){
    $('#save_flexitests').validate({
        submitHandler: function(frm){
            swal({
                title: "Você realmente deseja atualizar os dados?",
                type: "info",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#00a65a",
                confirmButtonText: "Salvar",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                var data = $('#save_flexitests').serialize();
                var action = $('#save_flexitests').attr('action');
                $.ajax({
                    url: action,
                    method: 'POST',
                    dataType: 'Json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    data: data,
                    success: function (data) {
                        if(data == 'true')
                            swal("Atualizado!", "", "success");
                        else
                            swal("Oops...", "Ocorreu algum erro, revise os dados informados!", "error");
                    },
                    error: function(data){
                        swal("Oops...", "Ocorreu algum erro, revise os dados informados!", "error");
                    }
                });
            });
        }
    });

    $('#save_wells_bank').validate({
        submitHandler: function(frm){
            swal({
                title: "Você realmente deseja atualizar os dados?",
                type: "info",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#00a65a",
                confirmButtonText: "Salvar",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                var data = $('#save_wells_bank').serialize();
                var action = $('#save_wells_bank').attr('action');
                $.ajax({
                    url: action,
                    method: 'POST',
                    dataType: 'Json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    data: data,
                    success: function (data) {
                        if(data == 'true')
                            swal("Atualizado!", "", "success");
                        else
                            swal("Oops...", "Ocorreu algum erro, revise os dados informados!", "error");
                    },
                    error: function(data){
                        swal("Oops...", "Ocorreu algum erro, revise os dados informados!", "error");
                    }
                });
            });
        }
    });
});
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
