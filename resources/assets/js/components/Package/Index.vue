<template>
	<div class="container">
		<div class="content" v-if="loading">
			<load></load>	
		</div>		
		<div class="content" v-else>
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
				loading: true
			}
		},
		components: {
			Load
		},
		methods: {

		},
		beforeRouteUpdate: function(to, from, next) {
		    const params = to.params;
            next();
	  	},
	  	afterRouteUpdate: function(to, from, next){
	  		next();
	  	},
		created: function(){
		},
		props: [],
		mounted: function(){
            var url = '/packages';
            axios.get(url, {}).then(response => {
                if(response.status === 200){
				    this.packages = response.data;
                    this.loading = false;
                }
            });
		}
	}
</script>