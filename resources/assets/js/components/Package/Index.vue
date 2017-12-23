<template>
	<div class="container" id="box">
		<div class="content" v-show="package_load_show">
			<load></load>	
		</div>		
		<div class="content" v-show="!package_load_show">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Pacotes</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" v-if="packages.length > 0" v-for="value in packages">
					<h2>{{ value.name }}</h2>
					{{ value.description }}
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Load from '../Load'
	export default {
		data: function(){
			return {
				packages: [],
				package_load_show: false,
				errors: []
			}
		},
		components: {
			Load
		},
		watch: {
        	'$route' (to, from) {
		      	this.package_load_show = false;
		    }
        },
		methods: {

		},
		created: function(){
		},
		props: [],
		mounted: function(){
            var url = '/packages';
            axios.interceptors.request.use(config => {
	        	this.package_load_show = true;
			  	return config;
			});
            axios.get(url, {}).then(response => {
                if(response.status === 200){
				    this.packages = response.data;
                    this.package_load_show = false;
                }
            }).catch((error) => {
            	this.errors = error.response.data
				this.package_load_show = false;
            });
		}
	}
</script>