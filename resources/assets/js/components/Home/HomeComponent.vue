<template>
	<div class="content" id="box">			
		<div class="container">
        	<slider-component></slider-component>
        </div>
	</div>
</template>
<script>
    import SliderComponent from '../SliderComponent.vue'
    import router from '../../router'
    export default{
		data: function(){
			return {
				
			}
		},
		watch: {
			$route: function(to, from){
			
			}
		},
		beforeRouteUpdate: function(to, from, next) {
		    
	  	},
		components: {
            SliderComponent
        },
        mounted: function(){
	       
        },
        activated: function(){
        	
        },
        destroyed () {
		    console.log('destroyed pending')
	  	},
	}
</script>