/**
 * Created by Junnyor on 03/08/2017.
 */
$(function(){

    var form = $('#save_frequencia_cardiaca_maxima');
    var btn = $('#btn_save_frequencia_cardiaca_maxima');
    //Código para seleção de procolos
    $("#protocol_maximum_heart_rate").select2().on('select2:select', function (e) {
        var args = e.params.data;
        $.ajax({
            method: 'GET',
            url: '/admin/tests/protocols/'+args.id+'/find_protocol',
            success: function(data){
                var html = '<div class="row" id="'+args.text+'" style="display: none;">';
                html += '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
                html += '<div class="form-group">';
                html += '<h4>'+data.name+'.: '+data.formula+'</h4>';
                html += '<input type="hidden" name="protocol_'+data.id+'[id]" value="'+data.id+'">';
                html += '<h5>Resultado</h5>';
                html += '<input name="protocol_'+data.id+'[result]" type="text" class="number maximum-heart-rate form-control">';
                html += '</div>';
                html += '</div>';
                html += '</div>';

                html = $(html);
                html.hide();

                btn.fadeIn('slow').removeClass('desactive');
                $(html).insertBefore(btn);
                $('.number').inputmask("[9]99.99", {
                    "placeholder": ""
                });
                html.fadeIn('slow');

                html.find('.maximum-heart-rate').rules("add", {
                    required: true,
                    number: true,
                    minlength: true,
                    messages: {
                        required:  "Este campo é obrigatório",
                        number:  "Informe somente números",
                        minlength: "Informe no mínimo 3 números com casas decimais"
                    }
                });
            },
            dataType: 'Json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
    }).on('select2:unselect', function(e){
        var args = e.params.data;
        $.ajax({
            method: 'DELETE',
            url: '/admin/tests/'+test_id+'/protocols/'+args.id+'/destroy_frequencia_cardiaca_maxima',
            success: function(data) {
                    form.find('#'+args.text).fadeOut('slow').promise().done(function(){
                    $(this).remove();
                    var rows = form.find('.row').length;
                    if(rows == 1){
                        btn.fadeOut('slow').addClass('desactive');
                    }
                });
            },
            dataType: 'Json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

    });

   form.validate({
        submitHandler: function(frm){
            var data = serialize(frm);
            var action = form.attr('action');
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
                            swal("Oops...", "Something went wrong!", "error");
                    },
                    error: function(data){
                        swal("Oops...", "Something went wrong!", "error");
                    }
                });

            });
        }
    });


    //Implementando validações para os inputs do formulário
    $(".maximum-heart-rate").each(function (item) {
        $(this).rules("add", {
            required: true,
            number: true,
            minlength: true,
            messages: {
                required: "Este campo é obrigatório",
                number: "Informe somente números",
                minlength: "Informe no mínimo 3 números com casas decimais"
            }
        });

        $(this).inputmask("[9]99.99", {
            "placeholder": ""
        });
    });

});