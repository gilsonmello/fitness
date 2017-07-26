/**
 * Created by Junnyor on 09/07/2017.
 */
$(function () {

    function convertToSlug(str){
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
        var to = "aaaaaeeeeeiiiiooooouuuunc------";
        for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

        return str;
    }
    
    //Initialize Select2 Elements
    $(".select2").select2();



    $(".textarea").wysihtml5({
        toolbar: {
            html: true,
        },
    });

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    $('.cm').inputmask("[9][9]9.99", {
        "placeholder": ""
    });

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
    },
        function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    });

    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    }).on('ifChanged', function(e) {
        // Get the field name
        //var field = $(this).attr('name');
        //alert(field);
    });

    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    }).on('ifClicked', function(e) {
        // Get the field name
        var field = $(this);
        if(field.attr('class').indexOf('answer-yes-click') >= 0){
            window.console.log(field.parent().parent().parent());
            field.parent().parent().parent().find('.answer-yes').css({
                'display': 'block'
            });
        }else{
            field.parent().parent().parent().find('.answer-yes').css({
                'display': 'none'
            });
        }
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
        showInputs: false
    });



    $('.data-table').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        autoWidth: true,
        responsive: true,
        scroll: true,
        scrollX: true,
        scrollCollapse: true,
    });

    $('[data-method]').append(function(){

            var method;

            if($(this).attr('data-method') != undefined || $(this).attr('data-method') != ""){
                method = $(this).attr('data-method');
            }else{
                method = "POST";
            }
            var typeAlert = $(this).attr('data-alert');
            var message = $(this).attr('data-message');
            var name = null;
            switch (typeAlert) {
                case 'send_email':
                    name = "send_email";
                    break;
                case 'released_for_certification':
                    name = "released_for_certification";
                    break;
                default:
                    name = "delete_item";
                    break;
            }
            return "\n" +
                "<form action='" + $(this).attr('href') + "' method='POST' data-message='" + message + "' name='" + name + "' style='display:none'>\n" +
                "   <input type='hidden' name='_method' value='" + $(this).attr('data-method') + "'>\n" +
                "   <input type='hidden' name='_token' value='" + $('meta[name="_token"]').attr('content') + "'>\n" +
                "</form>\n"
        })
        .removeAttr('href')
        .attr('style', 'cursor:pointer;')
        .attr('onclick', '$(this).find("form").submit();');

    /*
     Generic are you sure dialog
     */
    $('form[name=delete_item]').submit(function () {
        return confirm("Tem certeza que deseja excluir esse item?");
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('.answer-yes').css({
        'display': 'none'
    });

    $('.editor-active').css({
        'display': 'block'
    });


    $('#update_weight_and_height').submit(function(e){
        e.preventDefault();
        var form = $(this);
        swal({
            title: "Você realmente deseja atualizar os dados?",
            type: "info",
            cancelButtonText: "Cancelar",
            showCancelButton: true,
            confirmButtonColor: "#00a65a",
            confirmButtonText: "Salvar",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },function(){
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                dataType: 'Json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                data: form.serialize(),
                success: function(data){
                    window.console.log(data);
                    swal("Atualizado!", "", "success");
                }
            });
        });
    });

    $('#update_antropometria').submit(function(e){
        e.preventDefault();
        var form = $(this);
        swal({
            title: "Você realmente deseja atualizar os dados?",
            type: "info",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#00a65a",
            confirmButtonText: "Salvar",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },function(){
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                dataType: 'Json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                data: form.serialize(),
                success: function(data){
                    window.console.log(data);
                    swal("Atualizado!", "", "success");
                }
            });
        });
    });

    $('#update_bioempedancia').submit(function(e){
        e.preventDefault();
        var form = $(this);
        swal({
            title: "Você realmente deseja atualizar os dados?",
            type: "info",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#00a65a",
            confirmButtonText: "Salvar",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },function(){
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                dataType: 'Json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                data: form.serialize(),
                success: function(data){
                    window.console.log(data);
                    swal("Atualizado!", "", "success");
                }
            });
        });
    });

    $('#update_parq').submit(function(e){
        e.preventDefault();
        var form = $(this);
        swal({
            title: "Você realmente deseja atualizar os dados?",
            type: "info",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#00a65a",
            confirmButtonText: "Salvar",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },function(){
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                dataType: 'Json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                data: form.serialize(),
                success: function(data){
                    window.console.log(data);
                    swal("Atualizado!", "", "success");
                }
            });
        });
    });

    $('#update_pregras_cutaneas').submit(function(e){
        e.preventDefault();
        var form = $(this);
        swal({
            title: "Você realmente deseja atualizar os dados?",
            type: "info",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#00a65a",
            confirmButtonText: "Salvar",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },function(){
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                dataType: 'Json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                data: form.serialize(),
                success: function(data){
                    window.console.log(data);
                    swal("Atualizado!", "", "success");
                }
            });
        });
    });

    var teste;
    $('#btn-update_analise_postural_anterior').on('click', function(e){
        e.preventDefault();
        var form = $('#update_analise_postural_anterior');
        swal({
            title: "Você realmente deseja atualizar os dados?",
            type: "info",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#00a65a",
            confirmButtonText: "Salvar",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },function(){
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                dataType: 'Json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                data: form.serialize(),
                success: function(data){
                    window.console.log(data);
                    swal("Atualizado!", "", "success");
                }
            });
        });
    });

   /* var arquivo = $('#img_a');
    $('#img_a').on('change', function(event){
        var data = new FormData();
        data.append('img', $(this)[0].files[0]);
        $.ajax({
            contentType: false, // evitar que o jQuery realize o set do 'content-type' para 'application/x-www-form-urlencoded'.
            processData: false,
            url: update_analise_postural_anterior+'?_token='+token+'',
            data: data,
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(data){
                window.console.log(data);
            }
        });
        return false;
    });*/

    $('.desactive').hide();

    if(window.FormData){
        var formData = new FormData();
    }

    var img_a = document.getElementById('img_a');
    var action = $('#send_img_analise_postural_anterior').attr('action');
    img_a.addEventListener('change', function(e){
        var file, form = $('#send_img_analise_postural_anterior');
        file = this.files[0];
        if(!!file.type.match(/image.*/)){
            if(window.FileReader){
                var reader = new FileReader();
                reader.onprogress = function(e){
                };
                reader.onloadend = function(e){
                    $('#send_img_analise_postural_anterior #visualizar #img-reader').attr('src', e.target.result);
                };

                reader.readAsDataURL(file);

                var data = new FormData();
                data.append('img', file);

                form.ajaxForm({
                    url: action,
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    beforeSend: function(){
                        $('#tab_analise_postural_anterior input[type="submit"]').hide();
                        $('#tab_analise_postural_anterior img.desactive').show();
                    },
                    success: function(data){
                        $('#tab_analise_postural_anterior input[type="submit"]').show();
                        $('#tab_analise_postural_anterior img.desactive').hide();
                    },
                    uploadProgress: function(event, position, total, percentComplete){
                        window.console.log(event, position, total, percentComplete);
                    },
                    resetForm: true,
                    dataType: 'Json'
                }).submit();

            }
        }
    }, false);
   /* $('#img_a').on('change', function(e){
        window.console.log($(this).files);
        e.preventDefault();
    });*/
    /*$('#img_a').on('change', function(event){
        var action = $('#send_img_analise_postural_anterior').attr('action');
        $('#send_img_analise_postural_anterior').ajaxForm({
            uploadProgress: function(event, position, total, percentComplete){
                var tam_file = total/1000000;
                window.console.log(event, position, total, percentComplete);
                if(tam_file <= 50){
                    $('#send_img_analise_postural_anterior .progress').css('display', 'block').addClass('active').removeAttr('desactive');
                    $('#send_img_analise_postural_anterior .progress-bar').css({
                        'width' : percentComplete+'%'
                    });
                    $('#send_img_analise_postural_anterior .progress-bar span').html(percentComplete+'%');
                }else{
                    location.href('/');
                }
            },
            success: function(data){

            },
            error: function(){

            },
            dataType: 'Json',
            url: action,
            resetForm: true,
        }).submit();
    });*/

    /*$(function () {

        //Imagem de Ánlise Postural Anterior
        $("#fileuploader").uploadFile({
            url: update_analise_postural_anterior+'?_token='+token+'',
            fileName: "myfile",
            multiple:false,
            dragDrop:false,
            maxFileCount:1,
            showPreview:true,
            previewHeight: "300px",
            previewWidth: "500px",
            showDelete: true,
            statusBarWidth: 600/!*,
            returnType: "json",
            deleteCallback: function (data, pd) {
                window.console.log(data, pd);
            }*!/
        });
    });*/

});
