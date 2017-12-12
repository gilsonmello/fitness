<template>
	<div class="container">
		<div class="content" v-show="package_load_show">
			<load></load>	
		</div>
		<div class="content" v-show="!package_load_show">
			<p v-if="package != null">
				{{ package.name }}
			</p>
		</div>
	</div>
</template>

<script>
	import Load from '../Load'
	export default {
		data: function(){
			return {
				package_load_show: false,
				package: null
			}
		},
		components: {
			Load
		},
		methods: {

		},
		beforeRouteUpdate: function(to, from, next) {
			const params = to.params.slug;
			axios.interceptors.request.use(config => {
	        	this.package_load_show = true;
			  	return config;
			});
			axios.get('/packages/'+ params, {}).then(response => {
                if(response.status === 200){
                    this.package = response.data;
                }
                this.package_load_show = false;
            });
            next();
	  	},
		created: function(){

		},
		props: ['slug'],
		mounted: function(){
			const params = this.slug;
			axios.interceptors.request.use(config => {
	        	this.package_load_show = true;
			  	return config;
			});
			axios.get('/packages/'+ params, {}).then(response => {
                if(response.status === 200){
                    this.package = response.data;
                    this.package_load_show = false;
                }                
                this.package_load_show = false;
            });
            this.package_load_show = false;

		}
	}
</script>