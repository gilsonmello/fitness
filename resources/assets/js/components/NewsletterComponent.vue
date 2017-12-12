<template>
	<div class="container">
		<div class="content" v-if="loading">
			<load></load>
		</div>
		<div class="content" v-else>
			<form method="POST" v-on:submit.prevent="handleSubmitForm()">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Inscreva-se na nossa newsltter para novas notícias</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
						    <label for="name">Nome</label>
						    <input v-model="name" id="name" type="text" required class="form-control" placeholder="Nome">
						    <div class="alert alert-danger" v-if="errors.name">
							  	<div v-for="name in errors.name" >
							  		{{ name }}
							  	</div>
							</div>
				  		</div>
			      	</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
						    <label for="email">E-mail</label>
						    <input v-model="email" id="email" type="email" required class="form-control" placeholder="E-mail">
						    <div class="alert alert-danger" v-if="errors.email">
							  	<div v-for="email in errors.email" >
							  		{{ email }}
							  	</div>
							</div>
				  		</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
			        	<button class="btn btn-success" type="submit">Salvar</button>
				    </div>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
	import Load from './Load'
    export default {
        data: function(){
        	return {
        		email: '',
        		name: '',
  				loading: false,
  				errors: []
        	}
        },
        methods: {
        	handleSubmitForm: function(){

        		axios.interceptors.request.use(config => {
		        	this.loading = true;
				  	return config;
				});

        		var url = '/newsletters/';
        		axios.post(url, qs.stringify({
					email: this.email,
					name: this.name
				})).then((response) => {
					this.email = '';
					this.name = '';
					this.errors = [];
        			if(response.status === 200){
        				this.loading = false;
        				toastr.success('Cadastrado com sucesso');
        			}
				}).catch((error) => {
					this.loading = false;
					this.errors = error.response.data;
				});
				this.loading = false;
        	}
        },
        mounted: function(){

        },
        components: {
        	Load
        }
    }
</script>