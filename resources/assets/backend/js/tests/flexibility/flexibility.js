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