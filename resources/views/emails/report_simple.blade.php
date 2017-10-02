<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<style type="text/css">
			body{
				font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
			}
			h1{
				text-transform: uppercase;
			}
			h2{
				text-transform: uppercase;
			}
			h3{
				text-transform: uppercase;
			}
			h4{
				text-transform: uppercase;
			}
			h5{
				text-transform: uppercase;
			}
			table{
				vertical-align: middle;
				font-size: 10px;
			}
			.text-center{
				text-align: center;
			}
			p{
				text-transform: uppercase;
				padding-left: 5px;
			}
		</style>
	</head>
	<body>
		<?php 
			$age = !is_null($evaluation->user->birth_date) ? 
					age($evaluation->user->birth_date) : 
					'Não Informado'; 

			$gender = !is_null($evaluation->user->gender) ? $evaluation->user->gender : NULL; 
		?>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
		            <td style="width: 20%;">
		                <img src="{{public_path().'/logo.jpg'}}" width="150" style="border-radius: 10px;" height="150">
		            </td>
					<td style="width: 10%">
						<p></p>
					</td>
		            <td style="width: 70%">
		                <h2><strong>CLÍNICA ESPECIALIZADA EM AVALIAÇÃO FÍSICA</strong></h2>
		            	<h3>Profissional Técnico Responsável: <strong>Gabriele Miranda</strong></h3>
				        <h3><strong>Telefone: 71 3601-4189/99739-8123/9714- 3703</strong></h3>
				    </td>
		        </tr>	        
	        </tbody>
    	</table>
    	<br>
    	<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
		<br>
		<?php $supplier = actualSupplier($evaluation->user->id);?>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<thead>
				<tr>
					<td><p class="text-center"><strong>{{ trans('strings.name') }}</strong></p></td>
					<td><p class="text-center"><strong>{{ trans('strings.email') }}</strong></p></td>
					<td><p class="text-center"><strong>{{ trans('strings.age') }}</strong></p></td>
					<td><p class="text-center"><strong>{{ trans('strings.gym') }}</strong></p></td>
					<td><p class="text-center"><strong>{{ trans('strings.cell_phone') }}</strong></p></td>
				</tr>
			</thead>
    		<tbody>
	        	<tr>
	        		<td>
	        			<p class="text-center">
	        				{!! $evaluation->user->name !!}</p>
	        			</td>
					<td>
						<p class="text-center">
							{!! $evaluation->user->email !!}
						</p>
					</td>
	        		<td>
        				<p class="text-center">
	        				{!! $age !!}
	        			</p>
        			</td>
					<td>
						<p class="text-center">{!! $supplier->suppliers_name !!}</p>
					</td>
					<td>
						<p class="text-center">
							{{ !is_null($evaluation->user->cell_phone) ? $evaluation->user->cell_phone : 'Não informado' }}
						</p>
					</td>
	        	</tr>
    		</tbody>
    	</table>
		<br>
		<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
		<br>
		<p><strong>DADOS DA AVALIAÇÃO</strong></p>
		<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<td><p class="text-center"><strong>DATA DA AVALIAÇÃO</strong></p></td>
					<td><p class="text-center"><strong>DATA DE REAVALIAÇÃO</strong></p></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<p class="text-center">{{ format($evaluation->created_at, 'd/m/Y') }}</p>
					</td>
					<td>
						<p class="text-center">
							{{ addDaysToDate($evaluation->validity, 1, 'd/m/Y') }}
						</p>
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
    				<td><p class="text-center"><strong>COMPOSIÇÃO CORPORAL</strong></p></td>
    				<td><p class="text-center"><strong>RESULTADO</strong></p></td>
    				<td><p class="text-center"><strong>Classificações</strong></p></td>
    			</tr>
    		</thead>
    		<tbody>
    			@if(!is_null($evaluation->anthropometry->osseous_weight))
	        	<tr>
	        		<td><p>{{ trans('strings.osseous_weight') }}</p></td>
	        		<td colspan="2"><p class="text-center">{{ !is_null($evaluation->bioempedancia->osseous_weight) ? $evaluation->bioempedancia->osseous_weight : 'Não informado'}}</p></td>
	        	</tr>
	        	@endif
	        	@if(!is_null($evaluation->bioempedancia->imc))
	        	<tr>
	        		<td><p>{{ trans('strings.imc') }}</p></td>
	        		<td><p class="text-center">{{ !is_null($evaluation->bioempedancia->imc) ? $evaluation->bioempedancia->imc : 'Não informado'}}</p></td>
	        		<td>
	        			@if($evaluation->bioempedancia->imc < 18.5)
	        				<p>Abaixo do peso ideal</p>
        				@elseif($evaluation->bioempedancia->imc >= 18.6 && $evaluation->bioempedancia->imc <= 24.9)
        					<p>Peso ideal</p>
    					@elseif($evaluation->bioempedancia->imc >= 25.0 && $evaluation->bioempedancia->imc <= 29.9)
        					<p>Levemente acima do peso</p>
	        			@elseif($evaluation->bioempedancia->imc >= 30.0 && $evaluation->bioempedancia->imc <= 34.9)
	        				<p>Obesidade grau I</p>
        				@elseif($evaluation->bioempedancia->imc >= 35.0 && $evaluation->bioempedancia->imc <= 39.9)
	        				<p>Obesidade grau II</p>
        				@elseif($evaluation->bioempedancia->imc >= 40.0)
	        				<p>Obesidade grau III</p>
	        			@endif
	        		</td>
	        	</tr>
	        	@endif
	        	@if(!is_null($evaluation->bioempedancia->fat))
	        	<tr>
	        		<td>
	        			<p>{{ trans('strings.fat') }}</p>
	        		</td>
	        		<td>
						<p class="text-center">{{ $evaluation->bioempedancia->fat }}%</p>
	        		</td>
	        		<td>
						@if($gender == 0)

							{{-- Lógica para homens --}}
							@if($age >= 15 && $age <= 29)
								@if($evaluation->bioempedancia->fat < 11.0)
									<p>ATLETA</p>
								@elseif($evaluation->bioempedancia->fat >= 11.0 && $evaluation->bioempedancia->fat <= 13.9)
									<p>BOM</p>
								@elseif($evaluation->bioempedancia->fat >= 14.0 && $evaluation->bioempedancia->fat <= 20.9)
									<p>NORMAL</p>
								@elseif($evaluation->bioempedancia->fat >= 21.0 && $evaluation->bioempedancia->fat <= 23.9)
									<p>Elevado</p>
								@else
									<p>Muito elevado</p>
								@endif
							@elseif($age >= 30 && $age <= 39)
								@if($evaluation->bioempedancia->fat < 12.0)
									<p>ATLETA</p>
								@elseif($evaluation->bioempedancia->fat >= 12.0 && $evaluation->bioempedancia->fat <= 14.9)
									<p>BOM</p>
								@elseif($evaluation->bioempedancia->fat >= 15.0 && $evaluation->bioempedancia->fat <= 21.9)
									<p>NORMAL</p>
								@elseif($evaluation->bioempedancia->fat >= 22.0 && $evaluation->bioempedancia->fat <= 24.9)
									<p>Elevado</p>
								@else
									<p>Muito elevado</p>
								@endif
							@elseif($age >= 40 && $age <= 49)
								@if($evaluation->bioempedancia->fat < 14.0)
									<p>ATLETA</p>
								@elseif($evaluation->bioempedancia->fat >= 14.0 && $evaluation->bioempedancia->fat <= 16.9)
									<p>BOM</p>
								@elseif($evaluation->bioempedancia->fat >= 17.0 && $evaluation->bioempedancia->fat <= 23.9)
									<p>NORMAL</p>
								@elseif($evaluation->bioempedancia->fat >= 24.0 && $evaluation->bioempedancia->fat <= 26.9)
									<p>Elevado</p>
								@else
									<p>Muito elevado</p>
								@endif
							@elseif($age >= 50 && $age <= 59)
								@if($evaluation->bioempedancia->fat < 15)
									<p>ATLETA</p>
								@elseif($evaluation->bioempedancia->fat >= 15.0 && $evaluation->bioempedancia->fat <= 17.9)
									<p>BOM</p>
								@elseif($evaluation->bioempedancia->fat >= 18.0 && $evaluation->bioempedancia->fat <= 24.9)
									<p>NORMAL</p>
								@elseif($evaluation->bioempedancia->fat >= 25.0 && $evaluation->bioempedancia->fat <= 27.9)
									<p>Elevado</p>
								@else
									<p>Muito elevado</p>
								@endif
							@endif

						@else

							{{-- Lógica para mulheres --}}
							@if($age >= 15 && $age <= 29)
								@if($evaluation->bioempedancia->fat < 16.0)
									<p>ATLETA</p>
								@elseif($evaluation->bioempedancia->fat >= 16.0 && $evaluation->bioempedancia->fat <= 19.9)
									<p>BOM</p>
								@elseif($evaluation->bioempedancia->fat >= 20.0 && $evaluation->bioempedancia->fat <= 28.9)
									<p>NORMAL</p>
								@elseif($evaluation->bioempedancia->fat >= 29.0 && $evaluation->bioempedancia->fat <= 31.9)
									<p>Elevado</p>
								@else
									<p>Muito elevado</p>
								@endif
							@elseif($age >= 30 && $age <= 39)
								@if($evaluation->bioempedancia->fat < 17.0)
									<p>ATLETA</p>
								@elseif($evaluation->bioempedancia->fat >= 17.0 && $evaluation->bioempedancia->fat <= 20.9)
									<p>BOM</p>
								@elseif($evaluation->bioempedancia->fat >= 21.0 && $evaluation->bioempedancia->fat <= 29.9)
									<p>NORMAL</p>
								@elseif($evaluation->bioempedancia->fat >= 30.0 && $evaluation->bioempedancia->fat <= 32.9)
									<p>Elevado</p>
								@else
									<p>Muito elevado</p>
								@endif
							@elseif($age >= 40 && $age <= 49)
								@if($evaluation->bioempedancia->fat < 18.0)
									<p>ATLETA</p>
								@elseif($evaluation->bioempedancia->fat >= 18.0 && $evaluation->bioempedancia->fat <= 21.9)
									<p>BOM</p>
								@elseif($evaluation->bioempedancia->fat >= 22.0 && $evaluation->bioempedancia->fat <= 30.9)
									<p>NORMAL</p>
								@elseif($evaluation->bioempedancia->fat >= 31.0 && $evaluation->bioempedancia->fat <= 33.9)
									<p>Elevado</p>
								@else
									<p>Muito elevado</p>
								@endif
							@elseif($age >= 50 && $age <= 59)
								@if($evaluation->bioempedancia->fat < 19)
									<p>ATLETA</p>
								@elseif($evaluation->bioempedancia->fat >= 19.0 && $evaluation->bioempedancia->fat <= 22.9)
									<p>BOM</p>
								@elseif($evaluation->bioempedancia->fat >= 23.0 && $evaluation->bioempedancia->fat <= 31.9)
									<p>NORMAL</p>
								@elseif($evaluation->bioempedancia->fat >= 32.0 && $evaluation->bioempedancia->fat <= 34.9)
									<p>Elevado</p>
								@else
									<p>Muito elevado</p>
								@endif
							@endif

						@endif
	        		</td>
	        	</tr>
	        	@endif
	        	@if(!is_null($evaluation->bioempedancia->muscle_mass))
	        	<tr>
	        		<td>
	        			<p>{{ trans('strings.muscle_mass') }}</p>
	        		</td>
	        		<td>
	        			<p class="text-center">{{!is_null($evaluation->bioempedancia->muscle_mass) ? $evaluation->bioempedancia->muscle_mass.'%' : '----'}}</p>
	        		</td>
	        		<td>
						@if($gender == 0)
							@if($evaluation->bioempedancia->muscle_mass >= 3.0 && $evaluation->bioempedancia->muscle_mass <= 8.0)
								<p>Ultra definida</p>
							@elseif($evaluation->bioempedancia->muscle_mass >= 9.0 && $evaluation->bioempedancia->muscle_mass <= 9.9)
								<p>Muito Definida</p>
							@elseif($evaluation->bioempedancia->muscle_mass >= 10.0 && $evaluation->bioempedancia->muscle_mass <= 14.9)
								<p>Definida</p>
							@elseif($evaluation->bioempedancia->muscle_mass >= 15.0 && $evaluation->bioempedancia->muscle_mass <= 19.9)
								<p>Regular</p>
							@elseif($evaluation->bioempedancia->muscle_mass >= 20.0 && $evaluation->bioempedancia->muscle_mass <= 25.9)
								<p>Melhoria necessária</p>
							@else
								<p>Necessário melhorar muito</p>
							@endif
						@else
							@if($evaluation->bioempedancia->muscle_mass >= 8.0 && $evaluation->bioempedancia->muscle_mass <= 14.9)
								<p>Ultra definida</p>
							@elseif($evaluation->bioempedancia->muscle_mass >= 15.0 && $evaluation->bioempedancia->muscle_mass <= 15.9)
								<p>Muito Definida</p>
							@elseif($evaluation->bioempedancia->muscle_mass >= 16.0 && $evaluation->bioempedancia->muscle_mass <= 20.9)
								<p>Definida</p>
							@elseif($evaluation->bioempedancia->muscle_mass >= 21.0 && $evaluation->bioempedancia->muscle_mass <= 25.9)
								<p>Regular</p>
							@elseif($evaluation->bioempedancia->muscle_mass >= 26.0 && $evaluation->bioempedancia->muscle_mass <= 30.9)
								<p>Melhoria necessária</p>
							@else
								<p>Necessário melhorar muito</p>
							@endif
						@endif
	        		</td>
	        	</tr>
	        	@endif
	        	@if(!is_null($evaluation->bioempedancia->body_water))
	        	<tr>
	        		<td>
						<p>{{ trans('strings.body_water') }}</p>
	        		</td>
	        		<td colspan="2">
	        			<p class="text-center">{{!is_null($evaluation->bioempedancia->body_water) ? $evaluation->bioempedancia->body_water.'%' : '----'}}</p>
	        		</td>
	        	</tr>
	        	@endif
	        	@if(!is_null($evaluation->anthropometry->weight))
	        	<tr>
	        		<td colspan="2">
						<p>{{ trans('strings.weight') }}</p>
	        		</td>
	        		<td>
	        			<p class="text-center">{{!is_null($evaluation->anthropometry->weight) ? $evaluation->anthropometry->weight.'KG' : '----'}}</p>
	        		</td>
	        	</tr>
	        	@endif
	        	<tr>
	        		<td colspan="3">
	        			<p class="text-center">
	        				<em>NOTA: ESTIMADA ATRAVÉS DA BALANÇA DE BIOEMPEDANCIA RS-47BLACK.</em>
	        			</p>
	        		</td>
	        	</tr>
    		</tbody>
    	</table>

    	{{-- Verificando se há algum atributo diferente de NULL, se houver mostro --}}
    	<?php 
			$analisePosturalAnterior = $evaluation->analisePosturalAnterior->toArray();
    		$exists = NULL;
    		if(is_array($analisePosturalAnterior)){
	 			unset($analisePosturalAnterior['id']);
	 			unset($analisePosturalAnterior['evaluation_id']);
	 			unset($analisePosturalAnterior['img']);
	 			unset($analisePosturalAnterior['tmp_img']);
	 			unset($analisePosturalAnterior['created_at']);
	 			unset($analisePosturalAnterior['updated_at']);
	 			unset($analisePosturalAnterior['deleted_at']);
	 		}

    		foreach($analisePosturalAnterior as $key => $value){
    			if(!is_null($value)){
    				$exists = 1;
    				continue;
    			}
    		}
    	?>

		@if(!is_null($exists))
			<br>
			<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
			<br>
			<p><strong>Analise Postural Anterior</strong></p>
			<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
				<tbody>
				<tr>
					<td><p class="text-center"><strong>VARIÁVEIS</strong></p></td>
					<td><p class="text-center"><strong>{{ trans('strings.result') }}</strong></p></td>
				</tr>
				@if($evaluation->analisePosturalAnterior->arlcd == 1)
				<tr>
					<td>
						<p>
							Rotação Lateral Cervical Dir.
						</p>
					</td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->arlcd) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->arlce == 1)
				<tr>
					<td>
						<p>
							Rotação Lateral Cervical Esq.
						</p>
					</td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->arlce) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->ailcd == 1)
				<tr>
					<td>
						<p>
							Inclinação Lateral Cervical Dir.
						</p>
					</td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->ailcd) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->ailce == 1)
				<tr>
					<td>
						<p>
							Inclinação Lateral Cervical Esq.
						</p>
					</td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->ailce) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->aeod == 1)
				<tr>
					<td><p>Elevação do Ombro Dir.</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->aeod) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->aeoe == 1)
				<tr>
					<td>
						<p>
							Elevação do Ombro Esq.
						</p>
					</td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->aeoe) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->armpd == 1)
				<tr>
					<td>
						<p>
							Rotação Medial do Punho Dir.
						</p>
					</td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->armpd) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->armpe == 1)
				<tr>
					<td><p>Rotação Medial do Punho Esq.</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->armpe) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->admp == 1)
				<tr>
					<td><p>Desalinhamento de Mamilos e Peitoral.</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->admp) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->adq)
				<tr>
					<td><p>Desequilíbrio de Quadril</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->adq) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->aami == 1)
				<tr>
					<td><p>Assimetría de Membro Inferior</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->aami) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->ajvaro == 1)
				<tr>
					<td><p>Joelho Varo</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->ajvaro) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->ajvalgo == 1)
				<tr>
					<td><p>Joelho Valgo</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->ajvalgo) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->arijde == 1)
				<tr>
					<td><p>Rotação Interna de Joelho Dir/Esq.</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->arijde) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->apede == 1)
				<tr>
					<td><p>Pé em Eversão Dir/Esq.</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->apede) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->apide == 1)
				<tr>
					<td><p>Pé em Inversão Dir/Esq.</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->apide) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->apadutode == 1)
				<tr>
					<td><p>Pé Aduto Dir/Esq.</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->apadutode) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->apabdutode)
				<tr>
					<td><p>Pé Abduto Dir/Esq.</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->apabdutode) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->admi == 1)
				<tr>
					<td><p>Desalinhamento dos Maléolos Int.</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->admi) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->ape == 1)
				<tr>
					<td><p>Pé Equino</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->ape) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->aas == 1)
				<tr>
					<td><p>Aparentemente Saudável</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalAnterior->aas) !!}</p>
					</td>
				</tr>
				@endif

				@if($evaluation->analisePosturalAnterior->obs == 1)
				<tr>
					<td><p><strong>{{ trans('strings.obs') }}</strong></p></td>
					<td>{!! !is_null($evaluation->analisePosturalAnterior->obs) ? $evaluation->analisePosturalAnterior->obs : '<p>----</p>' !!}</td>
				</tr>
				@endif

				</tbody>
			</table>

		@endif

		{{-- Verificando se há algum atributo diferente de NULL, se houver mostro --}}
    	<?php 
			$analisePosturalLateralEsquerda = $evaluation->analisePosturalLateralEsquerda->toArray();
    		$exists = NULL;
    		if(is_array($analisePosturalLateralEsquerda)){
	 			unset($analisePosturalLateralEsquerda['id']);
	 			unset($analisePosturalLateralEsquerda['evaluation_id']);
	 			unset($analisePosturalLateralEsquerda['img']);
	 			unset($analisePosturalLateralEsquerda['tmp_img']);
	 			unset($analisePosturalLateralEsquerda['created_at']);
	 			unset($analisePosturalLateralEsquerda['updated_at']);
	 			unset($analisePosturalLateralEsquerda['deleted_at']);
	 		} 
    		foreach($analisePosturalLateralEsquerda as $key => $value){
    			if(!is_null($value)){
    				$exists = 1;
    				continue;
    			}
    		}
    	?>

		@if(!is_null($exists))
			<br>
			<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
			<br>
			<p><strong>Analise Postural Lateral Esquerda</strong></p>
			<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
				<tbody>
				<tr>
					<td><p class="text-center"><strong>VARIÁVEIS</strong></p></td>
					<td><p class="text-center"><strong>{{ trans('strings.result') }}</strong></p></td>
				</tr>
				@if($analisePosturalLateralEsquerda->lehc == 1)
				<tr>
					<td>
						<p>
							Hiperlordose Cervical
						</p>
					</td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralEsquerda->lehc) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralEsquerda->leht == 1)
				<tr>
					<td><p>Hiperlordose Torácica</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralEsquerda->leht) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralEsquerda->lehl == 1)
				<tr>
					<td><p>Hiperlordose Lombar</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralEsquerda->lehl) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralEsquerda->lecp == 1)
				<tr>
					<td><p>Costa Plana</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralEsquerda->lecp) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralEsquerda->legr == 1)
				<tr>
					<td><p>Geno Recurvato</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralEsquerda->legr) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralEsquerda->legf == 1)
				<tr>
					<td><p>Geno Flexo</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralEsquerda->legf) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralEsquerda->leact == 1)
				<tr>
					<td><p>Atitude Citófica Torácica</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralEsquerda->leact) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralEsquerda->lell == 1)
				<tr>
					<td><p>Lordose Lombar</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralEsquerda->lell) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralEsquerda->leas == 1)
				<tr>
					<td><p>Aparentemente Saudável</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralEsquerda->leas) !!}</p>
					</td>
				</tr>
				@endif
				@if(!is_null($analisePosturalLateralEsquerda->obs))
				<tr>
					<td><p><strong>{{ trans('strings.obs') }}</strong></p></td>
					<td>{!! hasObs($analisePosturalLateralEsquerda->obs) !!}</td>
				</tr>
				@endif
				</tbody>
			</table>
		@endif

		{{-- Verificando se há algum atributo diferente de NULL, se houver mostro --}}
    	<?php 
			$analisePosturalLateralDireita = $evaluation->analisePosturalLateralDireita->toArray();
    		$exists = NULL; 
    		if(is_array($analisePosturalLateralDireita)){
	 			unset($analisePosturalLateralDireita['id']);
	 			unset($analisePosturalLateralDireita['evaluation_id']);
	 			unset($analisePosturalLateralDireita['img']);
	 			unset($analisePosturalLateralDireita['tmp_img']);
	 			unset($analisePosturalLateralDireita['created_at']);
	 			unset($analisePosturalLateralDireita['updated_at']);
	 			unset($analisePosturalLateralDireita['deleted_at']);
	 		} 
    		foreach($analisePosturalLateralDireita as $key => $value){
    			if(!is_null($value)){
    				$exists = 1;
    				continue;
    			}
    		}
    	?>

		@if(!is_null($exists))
			<br>
			<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
			<br>
			<p><strong>Analise Postural Lateral Direita</strong></p>
			<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
				<tbody>
				<tr>
					<td><p class="text-center"><strong>VARIÁVEIS</strong></p></td>
					<td><p class="text-center"><strong>{{ trans('strings.result') }}</strong></p></td>
				</tr>
				@if($analisePosturalLateralDireita->ldhc == 1)
				<tr>
					<td><p>Hiperlordose Cervical</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalLateralDireita->ldhc) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralDireita->ldht == 1)
				<tr>
					<td><p>Hiperlordose Torácica</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralDireita->ldht) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralDireita->ldhl == 1)
				<tr>
					<td><p>Hiperlordose Lombar</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralDireita->ldhl) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralDireita->ldcp == 1)
				<tr>
					<td><p>Costa Plana</p></td>
					<td>
						<p>{!! yesOrNo($evaluation->analisePosturalLateralDireita->ldcp) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralDireita->ldgr == 1)
				<tr>
					<td><p>Geno Recurvato</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralDireita->ldgr) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralDireita->ldgf == 1)
				<tr>
					<td><p>Geno Flexo</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralDireita->ldgf) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralDireita->ldact == 1)
				<tr>
					<td><p>Atitude Citófica Torácica</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralDireita->ldact) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralDireita->ldll == 1)
				<tr>
					<td><p>Lordose Lombar</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralDireita->ldll) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalLateralDireita->ldas == 1)
				<tr>
					<td><p>Aparentemente Saudável</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalLateralDireita->ldas) !!}</p>
					</td>
				</tr>
				@endif
				@if(!is_null($analisePosturalLateralDireita->obs))
				<tr>
					<td><p><strong>{{ trans('strings.obs') }}</strong></p></td>
					<td>{!! hasObs($analisePosturalLateralDireita->obs) !!}</td>
				</tr>
				@endif
				</tbody>
			</table>
		@endif


		{{-- Verificando se há algum atributo diferente de NULL, se houver mostro --}}
    	<?php 
			$analisePosturalPosterior = $evaluation->analisePosturalPosterior->toArray();
    		$exists = NULL; 
    		if(is_array($analisePosturalPosterior)){
	 			unset($analisePosturalPosterior['id']);
	 			unset($analisePosturalPosterior['evaluation_id']);
	 			unset($analisePosturalPosterior['img']);
	 			unset($analisePosturalPosterior['tmp_img']);
	 			unset($analisePosturalPosterior['created_at']);
	 			unset($analisePosturalPosterior['updated_at']);
	 			unset($analisePosturalPosterior['deleted_at']);
	 		} 
    		foreach($analisePosturalPosterior as $key => $value){
    			if(!is_null($value)){
    				$exists = 1;
    				continue;
    			}
    		}
    	?>
		@if(!is_null($exists))
			<br>
			<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
			<br>
			<p><strong>Analise Postural Posterior</strong></p>
			<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
				<tbody>
				<tr>
					<td><p class="text-center"><strong>VARIÁVEIS</strong></p></td>
					<td><p class="text-center"><strong>{{ trans('strings.result') }}</strong></p></td>
				</tr>
				@if($analisePosturalPosterior->pec == 1)
				<tr>
					<td><p>Escoliose Cervical</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalPosterior->pec) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalPosterior->pet == 1)
				<tr>
					<td><p>Escoliose Torácica</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalPosterior->pet) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalPosterior->pel ==1)
				<tr>
					<td><p>Escoliose Lombar</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalPosterior->pel) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalPosterior->pde == 1)
				<tr>
					<td><p>Desalinhamento de Escápulas</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalPosterior->pde) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalPosterior->peabduzidas == 1)
				<tr>
					<td><p>Escápulas Abduzidas</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalPosterior->peabduzidas) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalPosterior->peaduzidas == 1)
				<tr>
					<td><p>Escápulas Aduzidas</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalPosterior->peaduzidas) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalPosterior->pdda == 1)
				<tr>
					<td><p>Desalinhamento de Dobra Axilar</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalPosterior->pdda) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalPosterior->pdq == 1)
				<tr>
					<td><p>Desalinhamento de Quadril</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalPosterior->pdq) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalPosterior->pdpd == 1)
				<tr>
					<td><p>Dobra Poplítea Desalinhada</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalPosterior->pdpd) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalPosterior->prmp == 1)
				<tr>
					<td><p>Rotação Medial de Punhos</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalPosterior->prmp) !!}</p>
					</td>
				</tr>
				@endif
				@if($analisePosturalPosterior->pas == 1)
				<tr>
					<td><p>Aparentemente Saudável</p></td>
					<td>
						<p>{!! yesOrNo($analisePosturalPosterior->pas) !!}</p>
					</td>
				</tr>
				@endif
				@if(!is_null($analisePosturalPosterior->obs))
				<tr>
					<td><p><strong>{{ trans('strings.obs') }}</strong></p></td>
					<td>{!! hasObs($analisePosturalPosterior->obs) !!}</td>
				</tr>
				@endif
				</tbody>
			</table>
		@endif

		@if(count($evaluation->test->maximumHeartRate) > 0)
			<br>
			<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
			<br>
			<p><strong>Análises Físicas (Frequência Cardíaca Máxima)</strong></p>
			<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<td><p><strong>{{ trans('strings.protocol') }}</strong></p></td>
						<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
						<td><p><strong>{{ trans('strings.obs') }}</strong></p></td>
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
							<td>
								{!! hasObs($value->obs) !!}
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="3">
								<p>Não possui registros</p>
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		@endif

		@if(count($evaluation->test->minimumHeartRate) > 0)
			<br>
			<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
			<br>
			<p><strong>Análises Físicas (Frequência Cardíaca Repouso)</strong></p>
			<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<td><p><strong>{{ trans('strings.protocol') }}</strong></p></td>
						<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
						<td><p><strong>{{ trans('strings.obs') }}</strong></p></td>
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
							<td>
								{!! hasObs($value->obs) !!}
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="3">
								<p>Não possui registros</p>
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		@endif

		@if(count($evaluation->test->reserveHeartRate) > 0)
			<br>
			<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
			<br>
			<p><strong>Análises Físicas (Frequência Cardíaca Reserva)</strong></p>
			<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<td><p><strong>{{ trans('strings.protocol') }}</strong></p></td>
						<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
						<td><p><strong>{{ trans('strings.obs') }}</strong></p></td>
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
							<td>
								{!! hasObs($value->obs) !!}
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="3">
								<p>Não possui registros</p>
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		@endif

		@if(count($evaluation->test->maximumVo2) > 0)
			<br>
			<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
			<br>
			<p><strong>Analises físicas (VO2 Máximo)</strong></p>
			<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<td><p><strong>{{ trans('strings.protocol') }}</strong></p></td>
						<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
						<td><p><strong>{{ trans('strings.obs') }}</strong></p></td>
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
							<td>
								{!! hasObs($value->obs) !!}
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="3">
								<p>Não possui registros</p>
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		@endif

		@if(count($evaluation->test->trainingVo2) > 0)
			<br>
			<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
			<br>

			<p><strong>Analises físicas (VO2 Treino)</strong></p>
			<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<td><p><strong>{{ trans('strings.protocol') }}</strong></p></td>
						<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
						<td><p><strong>{{ trans('strings.obs') }}</strong></p></td>
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
							<td>
								{!! hasObs($value->obs) !!}
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="3">
								<p>Não possui registros</p>
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		@endif

		@if(count($evaluation->test->targetZone) > 0)
		<br>
		<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
		<br>

    	<p><strong>ZONA ALVO</strong></p>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<thead>
    			<tr>
    				<td><p><strong>{{ trans('strings.protocol') }}</strong></p></td>
    				<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
    				<td><p><strong>{{ trans('strings.obs') }}</strong></p></td>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($evaluation->test->targetZone as $value)
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
							{!! hasObs($value->obs) !!}
		        		</td>
		        	</tr>
	        	@empty
	        		<tr>
						<td colspan="3">
							<p>Não possui registros</p>
						</td>
	        		</tr>
	        	@endforelse	        	
    		</tbody>
    	</table>
		@endif


		<?php $supine = findSupine($evaluation->test->id); $squat = findSquat($evaluation->test->id); ?>
		@if($supine || $squat)
		<br>
		<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
		<br>
    	<p><strong>TESTE DE RM(REPETIÇÃO MÁXIMA)</strong></p>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<td><p>variáveis</p></td>
					<td><p><strong>{{ trans('strings.result') }}</strong></p></td>
					<td><p><strong>{{ trans('strings.obs') }}</strong></p></td>
				</tr>
			</thead>
    		<tbody>
				@if($supine)
    			<tr>
	        		<td>
        				<p>
        					Teste RM supino
        				</p>
	        		</td>
	        		<td>
        				<p>
        					{{ $supine->maximum_repeat }} KG
        				</p>
	        		</td>
					<td>
						{!! hasObs($supine->obs) !!}
					</td>
	        	</tr>
				@endif
				@if($squat)
	        	<tr>
	        		<td>
        				<p>
        					Teste RM Agachamento 
        				</p>
	        		</td>
	        		<td>
        				<p>
        					{{ $squat->maximum_repeat }} KG
        				</p>
	        		</td>
					<td>
						{!! hasObs($squat->obs) !!}
					</td>
	        	</tr>
				@endif
    		</tbody>
    	</table>
		@endif

	 	<?php 
	 		$flexitest = !is_null($evaluation->test->flexitest) ? $evaluation->test->flexitest->toArray() : NULL; 
	 		if(is_array($flexitest)){
	 			unset($flexitest['id']);
	 			unset($flexitest['test_id']);
	 			unset($flexitest['type_test_id']);
	 			unset($flexitest['created_at']);
	 			unset($flexitest['updated_at']);
	 			unset($flexitest['deleted_at']);
	 		}
	 	?>
    	@if(!is_null($flexitest))
		<br>
		<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
		<br>
    	<p><strong>Analises de Flexibilidade </strong></p>
    	<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    		<tbody>
    			<tr>
					<td><p class="text-center"><strong>VARIÁVEIS</strong></p></td>
					<td><p class="text-center"><strong>{{ trans('strings.result') }}</strong></p></td>
				</tr>
    			@foreach($flexitest as $key => $value)
    				@if(!is_null($value))
    				<tr>
    					<td><p>{{ trans('strings.'.$key) }}</p></td>
    					<td><p>{!! referencesFlexitest($value) !!}</p></td>
    				</tr>
    				@endif
    			@endforeach
				{{-- <tr>
	        		<td><p>{{ trans('strings.abduction_shoulders') }}</p></td>
	        		<td><p>{{ referencesFlexitest($evaluation->test->flexitest->abduction_shoulders) }}</p></td>
	        	</tr>  
	        	<tr>
	        		<td><p>{{ trans('strings.lateral_trunk_flexion') }}</p></td>
	        		<td><p>{{ referencesFlexitest($evaluation->test->flexitest->lateral_trunk_flexion) }}</p></td>
	        	</tr>
				<tr>
					<td><p>{{ trans('strings.leg_hyperextension') }}</p></td>
					<td><p>{{ referencesFlexitest($evaluation->test->flexitest->leg_hyperextension) }}</p></td>
				</tr>
				<tr>
					<td><p>{{ trans('strings.elbow_flexion') }}</p></td>
					<td><p>{{ referencesFlexitest($evaluation->test->flexitest->elbow_flexion) }}</p></td>
				</tr>
				<tr>
					<td><p>{{ trans('strings.elbow_hyperextension') }}</p></td>
					<td><p>{{ referencesFlexitest($evaluation->test->flexitest->elbow_hyperextension) }}</p></td>
				</tr>
				<tr>
					<td><p>{{ trans('strings.fist_flexion') }}</p></td>
					<td><p>{{ referencesFlexitest($evaluation->test->flexitest->fist_flexion) }}</p></td>
				</tr>
				<tr>
					<td><p>{{ trans('strings.fist_extension') }}</p></td>
					<td><p>{{ referencesFlexitest($evaluation->test->flexitest->fist_extension) }}</p></td>
				</tr>
				<tr>
					<td><p>{{ trans('strings.horizontal_shoulder_abduction') }}</p></td>
					<td><p>{{ referencesFlexitest($evaluation->test->flexitest->horizontal_shoulder_abduction) }}</p></td>
				</tr>
				<tr>
					<td><p>{{ trans('strings.hip_flexion') }}</p></td>
					<td><p>{{ referencesFlexitest($evaluation->test->flexitest->hip_flexion) }}</p></td>
				</tr>
				<tr>
					<td><p>{{ trans('strings.trunk_hyperextension') }}</p></td>
					<td><p>{{ referencesFlexitest($evaluation->test->flexitest->trunk_hyperextension) }}</p></td>
				</tr>
				<tr>
					<td><p>{{ trans('strings.haunch_flexion') }}</p></td>
					<td><p>{{ referencesFlexitest($evaluation->test->flexitest->haunch_flexion) }}</p></td>
				</tr>
				<tr>
					<td><p>{{ trans('strings.haunch_extension') }}</p></td>
					<td><p>{{ referencesFlexitest($evaluation->test->flexitest->haunch_extension) }}</p></td>
				</tr>
				<tr>
					<td><p>{{ trans('strings.leg_flexion') }}</p></td>
					<td><p>{{ referencesFlexitest($evaluation->test->flexitest->leg_flexion) }}</p></td>
				</tr>
				<tr>
					<td><p>{{ trans('strings.plantar_dorsiflexion') }}</p></td>
					<td><p>{{ referencesFlexitest($evaluation->test->flexitest->plantar_dorsiflexion) }}</p></td>
				</tr>
				<tr>
					<td><p>{{ trans('strings.plantar_flexion') }}</p></td>
					<td><p>{{ referencesFlexitest($evaluation->test->flexitest->plantar_flexion) }}</p></td>
				</tr>
				<tr>
					<td><p><strong>{{trans('strings.obs')}}</strong></p></td>
					<td>{!! hasObs($evaluation->test->flexitest->obs) !!}</td>
				</tr> --}}
    		</tbody>
    	</table>
		@endif

		<?php 
			$wellsBank = !is_null($evaluation->test->wellsBank) ? $evaluation->test->wellsBank : NULL; 
		?>
		@if(!is_null($wellsBank))
			<br>
			<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px"></p>
			<br>
			<p><strong>Banco de Wells</strong></p>
			<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th><p>VARIÁVEIS</p></th>
						<th><p>{{ trans('strings.result') }}</p></th>
					</tr>
				</thead>
				<tbody>
					@if(!is_null($wellsBank->right_leg))
					<tr>
						<td><p>{{ trans('strings.right_leg') }}</p></td>
						<td><p>{{ $wellsBank->right_leg.'CM' }}</p></td>
					</tr>
					@endif
					@if(!is_null($wellsBank->trunk))
					<tr>
						<td><p>{{ trans('strings.trunk') }}</p></td>
						<td><p>{{ $wellsBank->trunk.'CM' }}</p></td>
					</tr>
					@endif
					@if(!is_null($wellsBank->obs))
					<tr>
						<td><p><strong>{{ trans('strings.obs') }}</strong></p></td>
						<td>{!! hasObs($wellsBank->obs) !!} </td>
					</tr>
					@endif
				</tbody>
			</table>
		@endif


		@if($evaluation->parq)
			<br>
			<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px;"></p>
			<br>
			<p><strong>PAR'Q</strong></p>
			<table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td><p class="text-center"><strong>VARIÁVEIS</strong></p></td>
						<td><p class="text-center"><strong>{{ trans('strings.result') }}</strong></p></td>
					</tr>
					<tr>
						<td><p>1) Alguma vez seu médico disse que você possui algum problema de coração e recomendou que você só praticasse atividade física sob prescrição médica?</p></td>
						<td><p>{!! $evaluation->parq->question_1 == 1 ? $evaluation->parq->option_1 : 'Não'!!} </p></td>
					</tr>
					<tr>
						<td><p>2) Você sente dor no peito causada pela prática de atividade física?</p></td>
						<td><p>{!! $evaluation->parq->question_2 == 1 ? $evaluation->parq->option_2 : 'Não'!!} </p></td>
					</tr>
					<tr>
						<td><p>3) Você sentiu dor no peito no último mês?</p></td>
						<td><p>{!! $evaluation->parq->question_3 == 1 ? $evaluation->parq->option_3 : 'Não'!!} </p></td>
					</tr>
					<tr>
						<td><p>4) Você tende a perder a consciência ou cair como resultado do treinamento?</p></td>
						<td><p>{!! $evaluation->parq->question_4 == 1 ? $evaluation->parq->option_4 : 'Não'!!} </p></td>
					</tr>
					<tr>
						<td><p>5) Você tem algum problema ósseo ou muscular que poderia ser agravado com a prática de atividades físicas?</p></td>
						<td><p>{!! $evaluation->parq->question_5 == 1 ? $evaluation->parq->option_5 : 'Não'!!} </p></td>
					</tr>
					<tr>
						<td><p>6) Seu médico já recomendou o uso de medicamentos para controle de sua pressão arterial ou condição cardiovascular?</p></td>
						<td><p>{!! $evaluation->parq->question_6 == 1 ? $evaluation->parq->option_6 : 'Não'!!} </p></td>
					</tr>
					<tr>
						<td><p>7) Você tem consciência, através de sua própria experiência e/ou de aconselhamento médico, de alguma outra razão física que impeça a realização de atividades físicas?</p></td>
						<td><p>{!! $evaluation->parq->question_7 == 1 ? $evaluation->parq->option_7 : 'Não'!!} </p></td>
					</tr>
					<tr>
						<td><p>Gostaria de comentar algum outro problema de saúde seja de ordem física ou psicológica que impeça a sua participação na atividade proposta?</p></td>
						<td>
							<p>
								{!! $evaluation->parq->question_8 == 1 ? $evaluation->parq->option_8 : 'Não'!!} </p>
						</td>
					</tr>
				</tbody>
			</table>
		@endif

		@if(!is_null($evaluation->final_consideration))
			<br>
			<p style="margin: 0; border: 4px solid black; padding-top: 4px; padding-bottom: 4px;"></p>
			<br>
			<h1 class="text-center">Considerações finais</h1>
			{!! $evaluation->final_consideration !!}
		@endif

	</body>
</html>