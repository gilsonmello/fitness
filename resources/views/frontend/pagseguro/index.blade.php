<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <meta name="_token" content="{{ csrf_token() }}" />
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
                   	 	{{ Form::text('card_number', null, ['dir' => "rtl",'class' => 'form-control']) }}
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
                   	 	{!! Form::text('card_year', null, ['class' => 'form-control']) !!}
                    	<span class="input-group-addon fa fa-calendar"></span>
                	</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<div class="form-group">
					{!! Form::label('card_cvv', trans('strings.card_cvv'), []) !!}
					{!! Form::text('card_cvv', null, ['class' => 'form-control']) !!}
				</div>
			</div>
			<div class="col-xs-6">
				<div class="form-group">
					{!! Form::label('card_parcels', trans('strings.card_parcels'), []) !!}
					{!! Form::select('card_parcels', [1, 2], null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<div class="form-group">
					{!! Form::label('zip', trans('strings.zip'), []) !!}
					{!! Form::text('zip', null, ['class' => 'zip form-control']) !!}
				</div>
			</div>
			<div class="col-xs-6">
				<div class="form-group">
					{!! Form::label('number', trans('strings.number'), []) !!}
					{!! Form::text('number', null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					{!! Form::label('address_complement', trans('strings.address_complement'), []) !!}
					{!! Form::text('address_complement', null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					{!! Form::label('cel', trans('strings.cel'), []) !!}
					{!! Form::text('cel', null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					{!! Form::label('address', trans('strings.address'), []) !!}
					{!! Form::text('address', null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					{!! Form::label('city', trans('strings.city'), []) !!}
					{!! Form::text('city', null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					{!! Form::label('district', trans('strings.district'), []) !!}
					{!! Form::text('district', null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					{!! Form::label('state', trans('strings.state'), []) !!}
					{!! Form::text('state', null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-xs-12">
				<button type="submit" class="btn btn-md btn-success pull-right">
					{{ trans('strings.finalize_payment') }}
				</button>
			</div>
		</div>

			{!! Form::hidden('session_id', $session_id) !!}
			<input type="hidden" id="method" name="method" value="">
			<input type="hidden" id="amount" name="amount" value="">
			{!! Form::hidden('order_id', null) !!}
		{!! Form::close() !!}
	</div>











	<!-- jQuery 2.1.3 -->
    <script src="{{ mix ('backend/js/jquery.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ mix ('backend/js/bootstrap.js') }}" type="text/javascript"></script>

    <script src="{{ mix ('backend/js/app.js') }}" type="text/javascript"></script>


	<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
	</script>

	<script src="{{ mix ('js/payment.js') }}" type="text/javascript"></script>
</body>
</html>