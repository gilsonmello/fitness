<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
		</script>
		<script
	  	src="https://code.jquery.com/jquery-3.2.1.min.js"
	  	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  	crossorigin="anonymous"></script>
	</head>
	<body>

		<script type="text/javascript">
			PagSeguroDirectPayment.createCardToken({
			    cardNumber: Android.getCardNumber(),
			    cvv: Android.getCvv(),
			    expirationMonth: Android.getMonth(),
			    expirationYear: Android.getYear(),
			    success: function(response){
			    	Android.setToken(response.card.token);
			    },
			    error: function(response){
			    	Android.setError(response);
			    },
			    complete: function(response){

			    }
			});
		</script>
	</body>
</html>