/**
 * Created by Junnyor on 22/08/2017.
 */
$(function(){
    $('#backend-auth-store').validate({
        submitHandler: function(form) {
            form.submit();
        },
        rules: {
            /*cpf: {
                required: true,
                isCPF: true
            },*/
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
            /*cpf: {
                required: 'Campo Obrigatório',
                isCPF: 'Informe um CPF válido'
            },*/
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
