<template>
	<input type="text" class="form-control">
</template>

<script>
	export default {
		watch: {
			
		},
		data(){
			return {
				
			}
		},
		props: ['options'],
		mounted: function(){
			var vm = this
			$.fn.datepicker.dates['pt-br'] = {
		        days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
		        daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
		        daysMin: ["Do", "Se", "Te", "Qua", "Qui", "Se", "Sa"],
		        months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
		        monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
		        today: "Hoje",
		        clear: "Limpar",
		        format: "dd/mm/yyyy",
		        titleFormat: "MM yyyy",
		        weekStart: 0
		    };
		    this.options['language'] = 'pt-br'
			$(this.$el).datepicker(this.options).on("change", function(event) {
			    vm.$emit('input', event.target.value);
			});
		},
		methods: {

		}
	}
</script>

<style scoped>
	
</style>