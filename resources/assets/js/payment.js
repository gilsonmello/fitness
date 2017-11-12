PagSeguroDirectPayment.setSessionId(document.querySelector("[name='session_id']").value);

var items = Payment.getItems();
var auth = Payment.getAuth();
auth = JSON.parse(auth);
items = JSON.parse(items);

$('body').append(items);

$(function(){

	$.ajax({
		method: 'POST',
		url: 'http://10.0.0.104:8000/pagseguro/generate_order',
		headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
		data: {
			user_id: user.id,
			year: items.year,
			month: items.month,
			day: items.day,
			hour: items.hour,
			minute: items.minute,
			second: items.second,
            package_id: items.package.id
		},
		success: function (data) {
			$('[name="order_id"]').val(data);
			$('body').append(data);
        },
		error: function (errors) {
			$('body').append(errors);
        }
	});
});


function setSenderHash() {
    var form = document.querySelector('#payment-pagseguro');
    var hash = PagSeguroDirectPayment.getSenderHash();

    if (document.querySelector("input[name=sender_hash]") == null) {
        var senderHash = document.createElement('input');
        senderHash.setAttribute('name', "sender_hash");
        senderHash.setAttribute('type', "hidden");
        senderHash.setAttribute('value', hash);
        form.appendChild(senderHash);
    }
}

function setCardToken() {
    var parametros = {
        cardNumber: document.getElementById('card_number').value,
        brand: document.querySelector("input[name=card_brand]").value,
        cvv: document.querySelector("input[name=card_cvv]").value,
        expirationMonth: document.querySelector('input[name=card_month]').value,
        expirationYear: document.querySelector('input[name=card_year]').value,
        success: function (data) {

            window.console.log(data);

            var form = document.querySelector('#payment-pagseguro');
            var token = JSON.stringify(data.card.token).replace(/"/g, '');
            if (document.querySelector("input[name=card_token]") == null) {
                var cardToken = document.createElement('input');
                cardToken.setAttribute('name', "card_token");
                cardToken.setAttribute('type', "hidden");
                cardToken.setAttribute('value', token);
                form.appendChild(cardToken);
            } else {
                document.querySelector("input[name=card_token]").value = token;
            }
        },
        error: function (data) {
//            console.log('Ocorreu um erro na validação do cartão');
//            console.log(JSON.stringify(data));
        }
    };
    PagSeguroDirectPayment.createCardToken(parametros);
}

$(function(){
	
	var sessionId = $('[name="session_id"]').val();

	var form_payment_pagseguro = $('#payment-pagseguro');
	var input_card_number = $('#card_number');
	var input_card_cvv = $('#card_cvv');
	var input_card_year = $('#card_year');
	var input_card_month = $('#card_month');


    $(".select2").select2();

	$('#card_month').inputmask("99");

	$('#card_personal_id').inputmask("999.999.999-99");

	$('#card_year').inputmask("9999");

    $('.zip')
        .inputmask("99999-999")
        .blur(function(event){
            var value = $(this).val().replace('-', '');
            $.ajax({
                method: 'GET',
                url: 'https://viacep.com.br/ws/'+value+'/json/',
                data: {},
                success: function (data) {
                    $('[name="address"]').val(data.logradouro);
                    $('[name="city"]').val(data.localidade);
                    $('[name="state"]').val(data.uf);
                    $('[name="district"]').val(data.bairro);
                },
                error: function (errors) {

                }
            });
        });

	$('#card_cvv').inputmask({
		mask: 9, 
		repeat: 5,
		greedy: false,
		rightAlign: false
	});

	$('#card_number').inputmask({ 
		mask: 9, 
		repeat: 20,
		greedy: false,
		rightAlign: false
	});

	$('#card_number').blur(function(event){
        var cardNumber = $(this).val();
		if(cardNumber != ''){
			PagSeguroDirectPayment.getBrand({
                cardBin: cardNumber.replace(/ /g, ''),
                success: function (data) {
                    var brand = JSON.stringify(data.brand.name).replace(/"/g, '');
                    if (document.querySelector("input[name=card_brand]") == null) {
                        var cardBrand = document.createElement('input');
                        cardBrand.setAttribute('name', "card_brand");
                        cardBrand.setAttribute('type', "hidden");
                        cardBrand.setAttribute('value', brand);
                        form_payment_pagseguro.append(cardBrand);
                        //setInstallmentAmount();
                    } else {
                        document.querySelector("input[name=card_brand]").value = brand;
                    }
                    $(".fa-credit-card-alt").removeClass('fa-credit-card-alt').addClass('fa-cc-' + brand);
                    
                },
                error: function (data, error, other) {
                    
                }
            });

		}
	});


    $('#payment-pagseguro').on('submit', function (event) {
        event.preventDefault();
        document.querySelector('[name="method"]').setAttribute('value', 'creditCard');
        var isValid = $("#payment-pagseguro").valid();
		if(isValid){
            setCardToken();
        }
    });

	$('#payment-pagseguro').validate({
		rules: {
			card_name: {
				required: true
			},
			card_personal_id: {
				required: true,
				isCPF: true
			},
			card_number: {
				required: true
			},
			card_month: {
				required: true,
				minlength: 2,
				maxlength: 2,
			},
			card_year: {
				required: true,
				minlength: 4
			},
			card_cvv: {
				required: true,
				minlength: 3
			}
		},
		messages: {
			card_name: {
				required: 'Campo obrigatório'
			},
			card_personal_id: {
				required: 'Campo obrigatório',
				isCPF: 'CPF Inválido'
			},
			card_number: {
				required: 'Campo obrigatório'
			},
			card_month: {
				required: 'Campo obrigatório',
				minlength: 'Tamanho mínimo de 2 digitos'
			},
			card_year: {
				required: 'Campo obrigatório',
				minlength: 'Tamanho mínimo de 4 digitos'
			},
			card_cvv: {
				required: 'Campo obrigatório',
				minlength: 'Tamanho mínimo de 3 digitos'
			}
		}
	});

	
	/*PagSeguroDirectPayment.setSessionId(sessionId);
	
	PagSeguroDirectPayment.createCardToken({
	    cardNumber: '4271671604887028',
	    cvv: '063',
	    expirationMonth: '09',
	    expirationYear: '2021',
	    success: function(response){
	    	
	    },
	    error: function(response){
	    	
	    },
	    complete: function(response){
	    	
		}
	});*/
});