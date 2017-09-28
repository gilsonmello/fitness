<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<style type="text/css">
			body{
				font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
				font-size: 12px;
			}
			p{
				text-transform: uppercase;
				padding: 5px;
			}
		</style>
	</head>
	<body>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tbody>
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
	        </tbody>
    	</table>
    	<br>
    	<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
	    <br>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<thead>
				<tr>
					<td><p><strong>NOME</strong></p></td>
					<td><p><strong>E-MAIl</strong></p></td>
					<td><p><strong>IDADE</strong></p></td>
				</tr>
			</thead>
    		<tbody>
	        	<tr>
	        		<td><p>{{$evaluation->user->name}}</p></td>
	        		<td>
	        			<p>{{ !is_null($evaluation->user->birth_date) ? age($evaluation->user->birth_date) : 'Não informado'}}
	        			</p>
	        		</td>
	        		<td><p>{{$evaluation->user->email}}</p></td>
	        	</tr>
    		</tbody>
    	</table>
    	<br>
		<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
		<br>

    	<p><strong>COMPOSIÇÃO CORPORAL</strong></p>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<thead>
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
	        	<tr>
	        		<td colspan="4">
	        			<p><em>NOTA: ESTIMADA ATRAVÉS DA BALANÇA DE BIOEMPEDANCIA RS-47BLACK.</em></p>
	        		</td>
	        	</tr>
    		</tbody>
    	</table>

    	<p><strong>Análises Físicas (Frequência Cardíaca Máxima)</strong></p>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<thead>
    			<tr>
    				<td><p><strong>{{ trans('strings.protocol') }}</strong></p></td>
    				<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($evaluation->test->maximumHeartRate as $value)
		        	<tr>
		        		<td>
	        				<p>
	        					{{ $value->protocol->name }}
	        				</p>
		        		</td>
		        		<td>
	        				<p>
        						{{ $value->result }} {{ $value->protocol->measure->initials }}
	        				</p>
		        		</td>
		        	</tr>
	        	@empty
	        		<tr>
	        			<td>Não possui registros</td>
	        		</tr>
	        	@endforelse
	        </tbody>
    	</table>

    	<p><strong>Análises Físicas (Frequência Cardíaca Repouso)</strong></p>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<thead>
    			<tr>
    				<td><p><strong>{{ trans('strings.protocol') }}</strong></p></td>
    				<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($evaluation->test->minimumHeartRate as $value)
		        	<tr>
		        		<td>
	        				<p>
	        					{{ $value->protocol->name }}
	        				</p>
		        		</td>
		        		<td>
	        				<p>
	        					{{ $value->result }} {{$value->protocol->measure->initials}}
	        				</p>
		        		</td>
		        	</tr>
	        	@empty
	        		<tr>
	        			<td>Não possui registros</td>
	        		</tr>
	        	@endforelse
    		</tbody>
    	</table>

    	<p><strong>Análises Físicas (Frequência Cardíaca Reserva)</strong></p>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<thead>
    			<tr>
    				<td><p><strong>{{ trans('strings.protocol') }}</strong></p></td>
    				<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($evaluation->test->reserveHeartRate as $value)
		        	<tr>
		        		<td>
	        				<p>
	        					{{ $value->protocol->name }}
	        				</p>
		        		</td>
		        		<td>
	        				<p>
	        					{{ $value->result }} {{$value->protocol->measure->initials}}
	        				</p>
		        		</td>
		        	</tr>
	        	@empty
	        		<tr>
	        			<td>Não possui registros</td>
	        		</tr>
	        	@endforelse
	        </tbody>
    	</table>

    	<p><strong>Analises físicas (VO2 Máximo)</strong></p>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<thead>
    			<tr>
    				<td><p><strong>{{ trans('strings.protocol') }}</strong></p></td>
    				<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($evaluation->test->maximumVo2 as $value)
		        	<tr>
		        		<td>
	        				<p>
	        					{{$value->protocol->name}}
	        				</p>
		        		</td>
		        		<td>
	        				<p>
	        					{{ $value->result }} {{$value->protocol->measure->initials}}
	        				</p>
		        		</td>
		        	</tr>
	        	@empty
	        		<tr>
	        			<td>Não possui registros</td>
	        		</tr>
	        	@endforelse
    		</tbody>
    	</table>

    	<p><strong>Analises físicas (VO2 Treino)</strong></p>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<thead>
    			<tr>
    				<td><p><strong>{{ trans('strings.protocol') }}</strong></p></td>
    				<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($evaluation->test->trainingVo2 as $value)
		        	<tr>
		        		<td>
	        				<p>
	        					{{$value->protocol->name}}
	        				</p>
		        		</td>
		        		<td>
	        				<p>
	        					{{ $value->result }} {{$value->protocol->measure->initials}}
	        				</p>
		        		</td>
		        	</tr>
	        	@empty
	        		<tr>
	        			<td>Não possui registros</td>
	        		</tr>
	        	@endforelse	        	
    		</tbody>
    	</table>

    	<p><strong>ZONA ALVO</strong></p>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<thead>
    			<tr>
    				<td><p><strong>{{ trans('strings.protocol') }}</strong></p></td>
    				<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
    				<td><p><strong>{{ trans('strings.objetive') }}</strong></p></td>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($evaluation->test->trainingVo2 as $value)
		        	<tr>
		        		<td>
	        				<p>
	        					{{ $value->protocol->name }}
	        				</p>
		        		</td>
		        		<td>
	        				<p>
	        					{{ $value->result }} {{ $value->protocol->measure->initials }}
	        				</p>
		        		</td>
		        		<td>
	        				<p>
	        					DEFINIÇÃO
	        				</p>
		        		</td>
		        	</tr>
	        	@empty
	        		<tr>
	        			<td>Não possui registros</td>
	        		</tr>
	        	@endforelse	        	
    		</tbody>
    	</table>

    	<br>
    	<p><strong>TESTE DE RM</strong></p>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<?php $supine = findSupine($evaluation->test->id); $squat = findSquat($evaluation->test->id); ?>
    		<tbody>
    			<tr>
	        		<td>
        				<p>
        					Teste Rm supino
        				</p>
	        		</td>
	        		<td>
        				<p>
        					{{ $supine->maximum_repeat }} KG
        				</p>
	        		</td>
	        	</tr>  
	        	<tr>
	        		<td>
        				<p>
        					Teste Rm Agachamento 
        				</p>
	        		</td>
	        		<td>
        				<p>
        					{{ $squat->maximum_repeat }} KG
        				</p>
	        		</td>
	        	</tr> 
	        	<tr>
	        		<td colspan="2"><p><em>NOTA: Teste de rm obtido através de 5(cinco) tentativas, respeitando 1’ de descanso.</em></p></td>
	        	</tr>       	
    		</tbody>
    	</table>
    	
    	@if($evaluation->test->flexitest)
    	<br>
    	<p><strong>Analises de Flexibilidade </strong></p>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<thead>
    			<tr>
    				<th>VARIÁVEIS</th>
    				<th>{{ trans('strings.result') }}</th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
	        		<td>
        				<p>
        					Perna esquerda
        				</p>
	        		</td>
	        		<td>
        				<p>
        					{{ $evaluation->test->flexitest->leg_hyperextension }}
        				</p>
	        		</td>
	        	</tr>  
	        	<tr>
	        		<td>
        				<p>
        					Pena Direita
        				</p>
	        		</td>
	        		<td>
        				<p>
        					{{ $evaluation->test->flexitest->leg_hyperextension }}
        				</p>
	        		</td>
	        	</tr> 
	        	<tr>
	        		<td colspan="2"><p><em>NOTA: protocolo banco de weels.</em></p></td>
	        	</tr>       	
    		</tbody>
    	</table>
		@endif


		@if($evaluation->analisePosturalAnterior)
    	<br>
    	<p><strong>Analises de Flexibilidade </strong></p>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<thead>
    			<tr>
    				<td><p><strong>VARIÁVEIS</strong></p></td>
    				<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
	        		<td>
        				<p>
        					FRONTAL
        				</p>
	        		</td>
	        		<td>
        				{!! $evaluation->analisePosturalAnterior->obs !!}
	        		</td>
	        	</tr>  
	        	<tr>
	        		<td>
        				<p>
        					POSTERIOR
        				</p>
	        		</td>
	        		<td>
        				<p>
        					{!! $evaluation->analisePosturalPosterior->obs !!}
        				</p>
	        		</td>
	        	</tr>   
	        	<tr>
	        		<td>
        				<p>
        					LATERAL-DIREITA
        				</p>
	        		</td>
	        		<td>
        				<p>
        					{!! $evaluation->analisePosturalLateralDireita->obs !!}
        				</p>
	        		</td>
	        	</tr>   
	        	<tr>
	        		<td>
        				<p>
        					LATERAL-ESQUERDA
        				</p>
	        		</td>
	        		<td>
        				<p>
        					{!! $evaluation->analisePosturalLateralEsquerda->obs !!}
        				</p>
	        		</td>
	        	</tr>   	
    		</tbody>
    	</table>

    	@endif




	</body>
</html>