/**
 * Created by Junnyor on 09/07/2017.
 */
function serialize(form) {
    if (!form || form.nodeName !== "FORM") {
        return;
    }
    var i, j, q = [];
    for (i = form.elements.length - 1; i >= 0; i = i - 1) {
        if (form.elements[i].name === "") {
            continue;
        }
        switch (form.elements[i].nodeName) {
            case 'INPUT':
                switch (form.elements[i].type) {
                    case 'text':
                    case 'hidden':
                    case 'password':
                    case 'button':
                    case 'reset':
                    case 'submit':
                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                        break;
                    case 'checkbox':
                    case 'radio':
                        if (form.elements[i].checked) {
                            q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                        }
                        break;
                }
                break;
            case 'file':
                break;
            case 'TEXTAREA':
                q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                break;
            case 'SELECT':
                switch (form.elements[i].type) {
                    case 'select-one':
                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                        break;
                    case 'select-multiple':
                        for (j = form.elements[i].options.length - 1; j >= 0; j = j - 1) {
                            if (form.elements[i].options[j].selected) {
                                q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].options[j].value));
                            }
                        }
                        break;
                }
                break;
            case 'BUTTON':
                switch (form.elements[i].type) {
                    case 'reset':
                    case 'submit':
                    case 'button':
                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                        break;
                }
                break;
        }
    }
    return q.join("&");
}

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

$(function () {
    $('.desactive').hide();

    $('.textarea').css({
        'width': '100%'
    });

    //Initialize Select2 Elements
    $(".select2").select2();

    $(".textarea").wysihtml5({
        toolbar: {
            html: true,
        },
    });

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});


    $(".rg").inputmask("99.999.999-99", {"placeholder": "99.999.999-99"});
    $(".cpf").inputmask("999.999.999-99", {"placeholder": "999.999.999-99"});

    $(".birth_date").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

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

    function submitFormWithSweetAlertAndAjax(id){
        form = $('#'+id);
        form.submit(function(e){
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
    }

    submitFormWithSweetAlertAndAjax('update_weight_and_height');
    submitFormWithSweetAlertAndAjax('update_perimetros_circunferencias');
    submitFormWithSweetAlertAndAjax('update_bioempedancia');
    submitFormWithSweetAlertAndAjax('update_parq');
    submitFormWithSweetAlertAndAjax('update_pregras_cutaneas');
    submitFormWithSweetAlertAndAjax('update_riscos_coronarios');

    /**
     * Função para fazer submit de formulário com AJAX
     * @param id
     * @param form_id
     */
    function updateFormForBtn(id, form_id){
        var el = document.getElementById(id);
        if(el == undefined || el == null){
            return false;
        }
        document.getElementById(id).addEventListener('click', function(){
            swal({
                title: "Você realmente deseja atualizar os dados?",
                type: "info",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#00a65a",
                confirmButtonText: "Salvar",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function () {
                var formElement = $('#'+form_id);
                formElement.ajaxForm({
                    url: $(this).attr('action'),
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    uploadProgress: function(event, position, total, percentComplete){
                    },
                    beforeSend: function(){
                    },
                    success: function(data){
                        window.console.log(data);
                        swal("Atualizado!", "", "success");
                    },
                    resetForm: true,
                    dataType: 'Json'
                }).submit();
            });
        }, false);
    }

    //Form Análise Postural Anterior
    updateFormForBtn(
        'btn_update_analise_postural_anterior',
        'update_analise_postural_anterior'
    );
    //Form Análise Postural Lateral Esquerda
    updateFormForBtn(
        'btn_update_analise_postural_lateral_esquerda',
        'update_analise_postural_lateral_esquerda'
    );
    //Form Análise Postural Lateral Direita
    updateFormForBtn(
        'btn_update_analise_postural_lateral_direita',
        'update_analise_postural_lateral_direita'
    );
    //Form Análise Postural Posterior
    updateFormForBtn(
        'btn_update_analise_postural_posterior',
        'update_analise_postural_posterior'
    );


    function sendImg(element, frm, tab){
        var el = document.querySelector(element);
        if(el == undefined || el == null){
            return ;
        }
        var file;
        var form = $(frm);
        var action = form.attr('action');
        var tabElement = $(tab);

        el.addEventListener('change', function(evt){
            file = this.files[0];
            form.ajaxForm({
                url: action,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                beforeSend: function(){
                    tabElement.find('input[type="submit"]').hide();
                    tabElement.find('img.desactive').show();
                },
                success: function(data){
                    tabElement.find('input[type="submit"]').show();
                    tabElement.find('img.desactive').hide();
                    form.find('#img-reader').show();
                    tabElement.find('input[name="uploaded_image"]').val('1');
                },
                resetForm: true,
                dataType: 'Json'
            }).submit();
            //Fazendo upload da imagem para o navegador

            if(window.FileReader){
                if(file.type.indexOf('image') >= 0){
                    var reader = new FileReader();
                    reader.onprogress = function(evt){
                    };
                    reader.onloadend = function(e){
                        form.find('#visualizar').find('#img-reader').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        }, false);
    }

    sendImg(
        '#btn_img_analise_postural_anterior',
        '#send_img_analise_postural_anterior',
        '#tab_analise_postural_anterior'
    );
    sendImg(
        '#btn_img_analise_postural_lateral_esquerda',
        '#send_img_analise_postural_lateral_esquerda',
        '#tab_analise_postural_lateral_esquerda'
    );
    sendImg(
        '#btn_img_analise_postural_lateral_direita',
        '#send_img_analise_postural_lateral_direita',
        '#tab_analise_postural_lateral_direita'
    );
    sendImg(
        '#btn_img_analise_postural_posterior',
        '#send_img_analise_postural_posterior',
        '#tab_analise_postural_posterior'
    );


    /*var el = document.getElementById('save-frequencia-cardiaca-maxima');
    if(el != undefined || el != null) {
        el.addEventListener('submit', function (e) {
            e.preventDefault();
            var data = serialize(this);
            var action = document.querySelector('#' + this.getAttribute('id')).getAttribute('action');
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
        }, false);
    }*/


});
