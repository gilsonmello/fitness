PagSeguroDirectPayment.setSessionId(document.querySelector("[name='session_id']").value);

var items = Payment.getItems();
var auth = Payment.getAuth();
auth = JSON.parse(auth);
items = JSON.parse(items);

$.ajax({
	method: 'POST',
	url: '/pagseguro/generate_order',
	headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    },
    /*data: {
		user_id: 1,
		year: '2017',
		month: '11',
		day: '14',
		hour: '22',
		minute: '10',
		second: '00',
        package_id: 1
	},*/
	data: {
		user_id: auth.id,
		year: items.year,
		month: items.month,
		day: items.day,
		hour: items.hour,
		minute: items.minute,
		second: items.second,
        package_id: items.package.id
	},
	success: function (data) {
		$('[name="order_id"]').val(data.order_id);
		$('[name="item_id"]').val(data.items.id);
		$('[name="user_id"]').val(1);
    },
	error: function (errors) {
    }
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

	$('.card_birth_date').inputmask('99/99/9999');

	$('#card_personal_id').inputmask("999.999.999-99");

	$('#card_year').inputmask("9999");

	$('#cel').inputmask("(99) 99999-9999");

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

	function executePayment(){
		$.ajax({
        	method: 'POST',
        	async: false,
        	url: $('#payment-pagseguro').attr('action'),
        	data: $('#payment-pagseguro').serialize(),
        	headers: {
		        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		    },
		    beforeSend: function(){
		    },
        	success: function(data){
        		//$('body').append(data);
        		
        		swal({
				  	title: "Pedido Efeituado!",
			     	text: "Em breve você será redirecionado",
			     	type: "success",
			     	timer: 3000
				}, function(inputValue){
				  	Payment.redirect();
				});

        		
				/*var xmlDOM = new DOMParser().parseFromString(data, 'text/xml');
        		data = xmlToJson(xmlDOM);
        		$.ajax({
        			method: 'POST',
		        	url: '/pagseguro/notifications',
		        	data: {content: data},
					headers: {
				        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				    },
				    success: function(val){

				    },
				    error: function(val){

				    }
        		});*/
        	},
        	error: function(errors){

        	}
        });
	}


    $('#payment-pagseguro').on('submit', function (event) {
        event.preventDefault();
        document.querySelector('[name="method"]').setAttribute('value', 'creditCard');
        var isValid = $("#payment-pagseguro").valid();
		
		$('body').append('isValid '+isValid);

        if(isValid){
        	if(!validateCPF($('#card_personal_id').val())) {
				swal("Oops...", "CPF Inválido!", "error");
        	}else{
	        	setCardToken();
		        setSenderHash();
		        setTimeout(function () {
			        swal({
		                title: "Deseja continuar?",
		                type: "info",
		                cancelButtonText: "Cancelar",
		                showCancelButton: true,
		                confirmButtonColor: "#00a65a",
		                confirmButtonText: "Continuar",
		                closeOnConfirm: false,
		                showLoaderOnConfirm: true,
			            },function(){
        					$('[type="submit"]').attr('disabled', 'disabled');
		            	 	executePayment();
		            	});
		    	}, 3000);
		    }
    	}
		

    });

	$('#payment-pagseguro').validate({
		rules: {
			card_name: {
				required: true
			},
			card_personal_id: {
				required: true/*,
				isCPF: true*/
			},
			card_birth_date:{
				required: true
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
			},
			number: {
				required: true
			},
			cel: {
				required: true
			},
			address: {
				required: true
			},
			city: {
				required: true
			},
			district: {
				required: true
			},
			state: {
				required: true
			},
			zip: {
				required: true
			}
		},
		messages: {
			card_name: {
				required: 'Campo obrigatório'
			},
			card_personal_id: {
				required: 'Campo obrigatório'/*,
				isCPF: 'CPF Inválido'*/
			},
			card_birth_date:{
				required: 'Campo obrigatório'
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
			},
			number: {
				required: 'Campo obrigatório'
			},
			cel: {
				required: 'Campo obrigatório'
			},
			address: {
				required: 'Campo obrigatório'
			},
			city: {
				required: 'Campo obrigatório'
			},
			district: {
				required: 'Campo obrigatório'
			},
			state: {
				required: 'Campo obrigatório'
			},
			zip: {
				required: 'Campo obrigatório'
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