<template>
	<div class="content">		
		<div class="container" v-if="loading">
			<load></load>	
		</div>
		
		<div class="container" v-else>
        	<slider-component></slider-component>
        </div>
	</div>
</template>
<script>
    import SliderComponent from '../SliderComponent.vue'
    import Load from '../Load'
	export default{
		data: function(){
			return {
				loading: true
			}
		},
		beforeRouteUpdate: function(to, from, next) {
		    
	  	},
		components: {
            SliderComponent,
            Load
        },
        mounted: function(){
        	this.loading = false;
        }
	}
</script>