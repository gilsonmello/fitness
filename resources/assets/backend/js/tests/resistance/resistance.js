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