/**
 * Created by Junnyor on 24/08/2017.
 */
$(function(){

    validateForm({
        el: $('#save_additional_data'),
        validate: 0
    });

    var input = $('.additional-data-evaluations').select2({tags: true});

    //Código para seleção de procolos
    $('.create-additional-data-user').select2().on('select2:select', function (e) {
        var data = e.params.data;
        if(data.id != ''){
            $.ajax({
                url: src+'user/'+data.id+'/evaluations',
                method: 'GET',
                dataType: 'Json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                data: {},
                success: function (data) {
                    if(data.length > 0){
                        input.empty().trigger("change");
                        for(var i in data){
                            var newState = new Option(getFormattedDate(data[i].created_at), data[i].id);
                            // Append it to the select
                            input.append(newState).trigger('change');/*
                            input.append('<option>'+data[i].validity+'</option>').val(data[i].id);*/
                        }
                    }else{
                        input.empty().trigger("change");
                        var newState = new Option('Não foram encontrados resultados', '');
                        input.append(newState).trigger('change');
                    }
                    

                    /*if(data.length > 0)
                        swal("Atualizado!", "", "success");
                    else
                        swal("Oops...", "Something went wrong!", "error");*/
                },
                error: function(data){
                    swal("Oops...", "Ocorreu algum erro interno, tente novamente!", "error");
                }
            });
        }
    });

    /*$('#save_additional_data').on('click', function(){
        openModalWithFields({
            routeBlade: '/admin/tests/'+test_id+'/additional_data',
            inputClass: 'input_validate_additional_data'
        });
    });*/
});
