<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<style type="text/css">
			body{
				font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
				font-size: 12px;
			}
		</style>
	</head>
	<body>
		<table style="width: 100%;">
			<tr>
	            <td style="width: 20%;">
	                <img src="{{public_path().'/logo.jpg'}}" width="150" style="border-radius: 10px;" height="150">
	            </td>
	            <td style="width: 80%">
	                <p><strong>CLÍNICA ESPECIALIZADA EM AVALIAÇÃO FÍSICA</strong></p>
	                <br>
	            	<p>Profissional Técnico Responsável: <strong>Gabriele Miranda</strong></p>
			        <p><strong>Telefone: 71 3601-4189/99739-8123/9714- 3703</strong></p>
			    </td>
	        </tr>	        
    	</table>
    	<br>
    	<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
	    <br>
    	<table style="width: 100%; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; border-top: 1px solid black;" 
    	cellspacing="1" cellpadding="1">
    		<thead>
    			<tr>
    				<td colspan="2"> <p><strong>DADOS DO AVALIADO</strong></p></td>
    			</tr>
    		</thead>
    		<tbody>
	        	<tr>
	        		<td><p>NOME: {{$evaluation->user->name}}</p></td>
	        		<td><p>IDADE: {{ !is_null($evaluation->user->birth_date) ? age($evaluation->user->birth_date) : 'Não informado'}}</p></td>
	        	</tr>
	        	<tr>
	        		<td colspan="2">
	        			<p><strong>E-MAIL: {{$evaluation->user->email}}</strong></p>
	        		</td>
	        	</tr>
    		</tbody>
    	</table>
    	<br>
		<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
		<br>
    	<p><strong>COMPOSIÇÃO CORPORAL</strong></p>
    	<br>

    	<table style="width: 100%; line-height: 1" cellspacing="0" cellpadding="0">
    		<thead style="border-top: 1px solid black; border-bottom: 1px solid black;">
    			<tr>
    				<td><p><strong>VARIÁVEIS</strong></p></td>
    				<td><p><strong>RESULTADO</strong></p></td>
    				<td><p><strong>Valores Referência</strong></p></td>
    				<td><p><strong>Classificações</strong></p></td>
    			</tr>
    		</thead>
    		<tbody>
	        	<tr>
	        		<td><p>Peso Osseo</p></td>
	        		<td><p>{{ !is_null($evaluation->bioempedancia->osseous_weight) ? $evaluation->bioempedancia->osseous_weight : 'Não informado'}}</p></td>
	        		<td><p>-----</p></td>
	        		<td><p></p></td>
	        	</tr>
	        	<tr>
	        		<td><p>Imc</p></td>
	        		<td><p>{{ !is_null($evaluation->bioempedancia->imc) ? $evaluation->bioempedancia->imc : 'Não informado'}}</p></td>
	        		<td><p>>30 – 35</p></td>
	        		<td>
	        			@if($evaluation->bioempedancia->imc < 18.50)
	        				<p>Abaixo do peso ideal</p>
        				@elseif($evaluation->bioempedancia->imc >= 18.6 && $evaluation->bioempedancia->imc <= 24.90)
        					<p>Peso ideal</p>
    					@elseif($evaluation->bioempedancia->imc >= 25.0 && $evaluation->bioempedancia->imc <= 29.90)
        					<p>Levemente acima do peso</p>
	        			@elseif($evaluation->bioempedancia->imc >= 30.00 && $evaluation->bioempedancia->imc <= 34.90)
	        				<p>Obesidade grau I</p>
        				@elseif($evaluation->bioempedancia->imc >= 35.00 && $evaluation->bioempedancia->imc <= 39.90)
	        				<p>Obesidade grau II</p>
        				@elseif($evaluation->bioempedancia->imc >= 40.00)
	        				<p>Obesidade grau III</p>
	        			@endif
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<p>Gordura</p>
	        		</td>
	        		<td>
	        			<p>{{!is_null($evaluation->bioempedancia->fat) ? $evaluation->bioempedancia->fat : 'Não informado'}}</p>
	        		</td>
	        		<td>
	        			<p>20,0 - 24,9</p>
	        		</td>
	        		<td>
	        			<p>Alto</p>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<p>Massa muscular</p>
	        		</td>
	        		<td>
	        			<p>{{!is_null($evaluation->bioempedancia->muscle_mass) ? $evaluation->bioempedancia->muscle_mass : 'Não informado'}}</p>
	        		</td>
	        		<td>
	        			<p>>35</p>
	        		</td>
	        		<td>
	        			<p></p>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<p>Água</p>
	        		</td>
	        		<td>
	        			<p>{{!is_null($evaluation->bioempedancia->body_water) ? $evaluation->bioempedancia->body_water : 'Não informado'}}</p>
	        		</td>
	        		<td>
	        			<p>47,7 lt</p>
	        		</td>
	        		<td>
	        			<p>Alto(bom)</p>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<p>Peso total</p>
	        		</td>
	        		<td>
	        			<p>{{!is_null($evaluation->anthropometry->weight) ? $evaluation->anthropometry->weight : 'Não informado'}}</p>
	        		</td>
	        		<td>
	        			<p>47,7 lt</p>
	        		</td>
	        		<td>
	        			<p>Alto(bom)</p>
	        		</td>
	        	</tr>
    		</tbody>
    	</table>
	</body>
</html>