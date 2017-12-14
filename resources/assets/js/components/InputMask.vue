<template>
	<input type="text" class="form-control">
</template>

<script>
	export default {
		watch: {
			mask: function (value) {
				
			},
			ph: function(value){
				
			}
		},
		data(){
			return {
				placeholder: ''
			}
		},
		props: ['mask', 'ph'],
		mounted: function(){
			this.placeholder = this.ph
			var vm = this
			$(this.$el).inputmask({ 
		    	mask: vm.mask,
		    	onBeforeWrite: function(event, buffer, caretPos, opts){
					if(event.target != undefined){
						vm.$emit('input', event.target.value);
					}
				}
		    })
		},
		methods: {

		}
	}
</script>