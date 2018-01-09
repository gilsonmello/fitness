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