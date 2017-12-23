<template>
	<div class="content" id="box">		
		<div class="container" v-show="home_load">
			<load></load>	
		</div>
		
		<div class="container" v-show="!home_load">
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
				home_load: true
			}
		},
		watch: {
			$route: function(to, from){
				this.home_load = false;
			}
		},
		beforeRouteUpdate: function(to, from, next) {
		    
	  	},
		components: {
            SliderComponent,
            Load
        },
        mounted: function(){
        	this.home_load = false;
        }
	}
</script>