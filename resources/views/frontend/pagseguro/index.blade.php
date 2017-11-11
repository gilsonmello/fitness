<!DOCTYPE html>
<html>
<head>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ mix('backend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ mix('css/payment.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container">
		{!! Form::open(['route' => 'frontend.payment.pagseguro', 'id' => 'payment-pagseguro', 'method' => 'post']) !!}

		<h4>Pagamento via Pagseguro</h4>
		<div class="row">
			<div class="col-lg-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('card_name', trans('strings.card_name'), []) !!}
					{{ Form::text('card_name', null, ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-xs-12">
				<div class="form-group">
					{!! Form::label('card_personal_id', trans('strings.card_personal_id'), []) !!}
					{{ Form::text('card_personal_id', null, ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-xs-12">
				<div class="form-group">
					{!! Form::hidden('card_brand', null) !!}
					{!! Form::label('card_number', trans('strings.card_number'), []) !!}
					<div class="input-group">
                   	 	{{ Form::text('card_number', null, ['class' => 'form-control']) }}
                    	<span class="input-group-addon fa fa-credit-card-alt"></span>
                	</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<div class="form-group">
					{!! Form::label('card_month', trans('strings.card_month'), []) !!}
					<div class="input-group">
                   	 	{{ Form::text('card_month', null, ['placeholder' => 'Mês', 'id' => 'card_month', 'class' => 'form-control']) }}
                    	<span class="input-group-addon fa fa-calendar"></span>
                	</div>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="form-group">
					{!! Form::label('card_year', trans('strings.card_year'), []) !!}
					<div class="input-group">
                   	 	{{ Form::text('card_year', null, ['class' => 'form-control']) }}
                    	<span class="input-group-addon fa fa-calendar"></span>
                	</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<div class="form-group">
					{!! Form::label('card_cvv', trans('strings.card_cvv'), []) !!}
					{{ Form::text('card_cvv', null, ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<button type="submit" class="btn btn-md btn-success pull-right">{{ trans('strings.finalize_payment') }}</button>
			</div>
		</div>

			{!! Form::hidden('session_id', $session_id) !!}
		{!! Form::close() !!}
	</div>











	<!-- jQuery 2.1.3 -->
    <script src="{{ mix ('backend/js/jquery.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ mix ('backend/js/bootstrap.js') }}" type="text/javascript"></script>


	<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
	</script>

	<script src="{{ mix ('js/payment.js') }}" type="text/javascript"></script>
</body>
</html>