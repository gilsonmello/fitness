<template>
	<div class="container" id="box">
		<div class="content">
			<p v-if="package != null">
				{{ package.name }}
			</p>
		</div>
	</div>
</template>

<script>
	
	export default {
		data: function(){
			return {
				package: null
			}
		},
		components: {
			
		},
		methods: {

		},
		watch: {
			$route: function(to, from){
				
			}
		},
		beforeRouteUpdate: function(to, from, next) {
			const params = to.params.slug;
			axios.interceptors.request.use(config => {
	        	return config;
			});
			axios.get('/packages/'+ params, {}).then(response => {
                if(response.status === 200){
                    this.package = response.data;
                }
            });
            next();
	  	},
		created: function(){

		},
		props: ['slug', 'category'],
		mounted: function(){
			

		},
		activated: function(){
			const params = this.slug;
			axios.interceptors.request.use(config => {
	        	return config;
			});
			axios.get('/packages/'+ params, {}).then(response => {
                if(response.status === 200){
                    this.package = response.data;
                }                
            });
        }
	}
</script>