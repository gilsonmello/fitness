<template>
	<div class="container" id="box">	
		<div class="content">
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
	export default {
		data: function(){
			return {
				packages: [],
				errors: []
			}
		},
		components: {
			
		},
		watch: {
        	$route: function(to, from) {
		      	
		    }
        },
		methods: {

		},
		created: function(){
		},
		props: [],
		mounted: function(){
            
		},
		activated: function(){
			var url = '/packages';
            axios.interceptors.request.use(config => {
	        	return config;
			});
            axios.get(url, {}).then(response => {
                if(response.status === 200){
				    this.packages = response.data;
                }
            }).catch((error) => {
            	this.errors = error.response.data
			});
        }
	}
</script>