PagSeguroDirectPayment.setSessionId(document.querySelector("[name='session_id']").value);

function setSenderHash() {
    var form = document.querySelector('#pay');
    var hash = PagSeguroDirectPayment.getSenderHash();

    if (document.querySelector("input[name=senderHash]") == null) {
        var senderHash = document.createElement('input');
        senderHash.setAttribute('name', "senderHash");
        senderHash.setAttribute('type', "hidden");
        senderHash.setAttribute('value', hash);
        form.appendChild(senderHash);
    }
}

function validateCPF(cpf){
    var numbers, digits, sum, i, result, equal_digits;
    equal_digits = 1;
    if (cpf.length < 11)
        return false;
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

$(function(){
	
	var sessionId = $('[name="session_id"]').val();

	var form_payment_pagseguro = $('#payment-pagseguro');
	var input_card_number = $('#card_number');
	var input_card_cvv = $('#card_cvv');
	var input_card_year = $('#card_year');
	var input_card_month = $('#card_month');

	$('#card_month').inputmask("99");

	$('#card_year').inputmask("9999");

	$('#card_cvv').inputmask("999");

	$('#card_number').blur(function(event){
        var cardNumber = $(this).val();
        window.console.log(cardNumber);
		if(cardNumber != ''){
			PagSeguroDirectPayment.getBrand({
                cardBin: cardNumber.replace(/ /g, ''),
                success: function (data) {
                	input_card_number.val(data.brand.name);
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

	$('#payment-pagseguro').validate({
		submitHandler: function(frm){
			//frm.submit();
		},
		rules: {
			card_name: {
				required: true
			},
			card_personal_id: {
				required: true
			},
			card_number: {
				required: true
			},
			card_month: {
				required: true,
				minlength: 2
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