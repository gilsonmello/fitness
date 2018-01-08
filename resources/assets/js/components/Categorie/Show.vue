<template>
	<div class="container" id="box">
		<div class="content">
			<div class="row">
				<div class="col-lg-12">
					{{ categorie.name }}
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default{
		data: function(){
			return {
				categorie_load_show: true,
				categorie: {}
			}
		},
		components: {
			
		},
		watch: {
			'$route': function(to, from){
				
			}
		},
		props: ['slug'],
		beforeRouteUpdate: function(to, from, next) {
			axios.interceptors.request.use(config => {
	        	this.categorie_load_show = true;
			  	return config;
			});
			const params = to.params.slug;
			axios.get('/categories/'+ params, {}).then(response => {
                if(response.status === 200){
                	this.categorie = response.data;
                }
                this.categorie_load_show = false;
            }).catch((error) => {

            });
            next();
	  	},
	  	mounted: function(){
			const params = this.slug;
			axios.get('/categories/'+ params, {}).then(response => {
                if(response.status === 200){
                    this.categorie = response.data;
                }
                this.categorie_load_show = false;
            }).catch((error) => {

            });
	  	}
	}
	
</script>