<template>
	<div class="container" id="box">

		<div class="content" v-show="categorie_load_show">
			<load></load>	
		</div>

		<div class="content" v-show="!categorie_load_show">
			<div class="row">
				<div class="col-lg-12">
					{{ categorie.name }}
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Load from '../Load'
	export default{
		data: function(){
			return {
				categorie_load_show: true,
				categorie: {}
			}
		},
		components: {
			Load
		},
		watch: {
			'$route': function(to, from){
				this.categorie_load_show = false;
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