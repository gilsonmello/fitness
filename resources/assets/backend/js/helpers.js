/**
 * Created by Junnyor on 09/07/2017.
 */

Number.prototype.format = function(n, x) {
    var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
};

//Função para validar CPF
function validateCPF(cpf){

    var numbers, digits, sum, i, result, equal_digits;
    equal_digits = 1;
    cpf = cpf.replace(/\.|\-/g, '');
    if (cpf.length < 11) {
        return false;
    }
    for (i = 0; i < cpf.length - 1; i++)
        if (cpf.charAt(i) != cpf.charAt(i + 1))
        {
            equal_digits = 0;
            break;
        }
    if (!equal_digits)
    {
        numbers = cpf.substring(0,9);
        digits = cpf.substring(9);
        sum = 0;
        for (i = 10; i > 1; i--)
            sum += numbers.charAt(10 - i) * i;
        result = sum % 11 < 2 ? 0 : 11 - sum % 11;
        if (result != digits.charAt(0))
            return false;
        numbers = cpf.substring(0,10);
        sum = 0;
        for (i = 11; i > 1; i--)
            sum += numbers.charAt(11 - i) * i;
        result = sum % 11 < 2 ? 0 : 11 - sum % 11;
        if (result != digits.charAt(1))
            return false;
        return true;
    }
    else
        return false;
}

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

function validateForm(params){
    var el = params.el;
    var input = params.input;
    var validate = params.validate != undefined ? 0 : 1;

    el.validate({
        submitHandler: function(frm){
            var data = el.serialize();
            var action = el.attr('action');
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

    if(validate == 1) {
        //Implementando validações para os inputs do formulário
        input.each(function (item) {
            $(this).rules("add", {
                required: true,
                number: true,
                minlength: 3,
                min: 0,
                messages: {
                    required: "Este campo é obrigatório",
                    number: "Informe somente números",
                    minlength: "Informe no mínimo 2 números com 1 casa decimal"
                }
            });
        });
    }
}

function tests(param){

    var name = param.name != undefined ? param.name : '';
    var form = param.form;
    var btn = param.btn;
    var inputSelect = param.inputSelect;
    var classInputText = param.classInputText;
    var inputText = param.inputText;
    var row = param.row;
    var routeDestroy = param.route.destroy;
    var routeFind = param.route.find != undefined ? param.route.find : 'find_protocol';

    //Código para seleção de procolos
    inputSelect.select2().on('select2:select', function (e) {
        window.console.log(param);
        var args = e.params.data;
        $.ajax({
            method: 'GET',
            url: '/admin/tests/'+test_id+'/protocols/'+args.id+'/'+routeFind,
            success: function(data){

                    var result = '';
                    if (data.result != '') {
                        result = data.result;
                    }
                    var html = '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 calculated" id="' + args.text.replace(' ', '_') + '" style="display: none;">';
                    html += '<div class="form-group">';
                    html += '<label for="protocol_' + name+'_'+data.id + '[result]">' + data.name + '.: ' + data.formula + '</label>';
                    html += '<input type="hidden" name="protocol_' + data.id + '[id]" value="' + data.id + '">';
                    html += '<div class="input-group">';
                        html += '<input id="protocol_' + name+'_'+data.id + '[result]" value="' + result + '" name="protocol_' + data.id + '[result]" type="text" class="number ' + classInputText + ' form-control">';
                        html += '<span class="input-group-addon" id="">'+data.measure+'</span>';
                    html += '</div>';

                    html += '</div>';
                    html += '</div>';
                    html = $(html);
                    html.hide();

                    btn.fadeIn('slow').removeClass('desactive');

                    row.append(html);


                    $('.number').inputmask("decimal");

                    html.fadeIn('slow');

                    html.find('.' + classInputText).rules("add", {
                        required: true,
                        number: true,
                        minlength: true,
                        messages: {
                            required: "Este campo é obrigatório",
                            number: "Informe somente números",
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
            url: '/admin/tests/'+test_id+'/protocols/'+args.id+'/'+routeDestroy,
            success: function(data) {
                if(data == 'true'){
                    swal("Removido!", "", "success");
                }
                form.find('#'+args.text.replace(' ', '_')).fadeOut('slow').promise().done(function(){
                    $(this).remove();
                    var rows = form.find('.calculated').length;
                    if(rows == 0){
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

    //Validação do formulário
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
    inputText.each(function (item) {
        $(this).rules("add", {
            required: true,
            number: true,
            minlength: 1,
            messages: {
                required: "Este campo é obrigatório",
                number: "Informe somente números",
                minlength: "Informe no mínimo 1 número"
            }
        });

        $(this).inputmask("decimal", {
            "placeholder": ""
        });
    });

}

/*function executeAjax(params){
    var url = params.url;
    var dataType = params.dataType != undefined ? params.dataType : '';
    var headers = params.headers;
    var method = params.method;
    var callbackSuccess = params.success;

    $.ajax({
        url: url,
        dataType: dataType,
        data: $(this).serialize(),
        success: callbackSuccess,
        method: method,
        headers: headers
    });
}*/

function openModalWithFields(params){
    var routeBlade = params.routeBlade;
    var inputClass = params.inputClass;
    //Ativo o modal ajax
    $('#ajaxLoader').modal('toggle');
    //Requisição para retornar a blade
    $.ajax({
        url: routeBlade,
        method: 'GET',
        success: function (data) {
            //Escondo o modal ajax
            $('#ajaxLoader').modal('hide');
            //Transformando a blade em objeto jquery
            data = $(data);
            //Adicionando o modal ao body
            $("body").append(data);
            //Ativando o modal
            $(data).modal('toggle');
            //Formulário do modal
            var form = data.find('form');
            //Validação do formulário
            form.validate({
                submitHandler: function(frm){
                    var data = form.serialize();
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

            //Evento disparado ao esconder o modal
            $(data).on('hidden.bs.modal', function (e) {
                $(this).remove();
                form.unbind("submit");
            });

            //Adicionando validações e máscaras aos fields do formulário
            form.find('.'+inputClass).each(function(){
                $(this).rules("add", {
                    required: true,
                    number: true,
                    minlength: 1,
                    messages: {
                        required: "Este campo é obrigatório",
                        number: "Informe somente números",
                        minlength: "Informe no mínimo 1"
                    }
                });

                $(this).inputmask("decimal", {
                    "placeholder": ""
                });
            });

        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
}

$(function () {

    //Método para validar o CPF
    $.validator.addMethod("isCPF", function(value, element) {
        return validateCPF(value);
    });

    //Desabilitando todos os elementos com a classe desactive
    $('.desactive').hide();

    /*$('.number2').inputmask("regex", {
        regex: "/\-|\d/"
    });*/

    $('.number').inputmask("decimal");


    $('.decimal').inputmask("decimal");

    $('.textarea').css({
        'width': '100%'
    });

    //Initialize Select2 Elements
    $(".select2").select2();

    $(".textarea").wysihtml5({
        toolbar: {
            html: true,
        }
    });

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});


    $(".rg").inputmask("99.999.999-99", {"placeholder": ""});
    $(".cpf").inputmask("999.999.999-99", {"placeholder": ""});



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

    $.fn.datepicker.dates['pt-br'] = {
        days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
        daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
        daysMin: ["Do", "Se", "Te", "Qua", "Qui", "Se", "Sa"],
        months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        today: "Hoje",
        clear: "Limpar",
        format: "dd/mm/yyyy",
        titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
        weekStart: 0
    };

    //Date picker
    $('.datepicker').datepicker({
        language: 'pt-br'
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


    $.fn.dataTable.ext.errMode = 'none';

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
        scrollCollapse: true
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

    /**
     * Created by Junnyor on 03/08/2017.
     */



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
