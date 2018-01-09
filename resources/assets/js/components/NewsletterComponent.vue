<template>
	<div class="container">
		<div class="content">
			<form method="POST" v-on:submit.prevent="handleSubmitForm()">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
						<h1 class="page-header">Inscreva-se na nossa newsltter para novas notícias</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
						    <label for="newsletter_name">Nome</label>
						    <input v-model="name" id="newsletter_name" type="text" required class="form-control" placeholder="Nome">
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
						    <label for="newsletter_email">E-mail</label>
						    <input v-model="email" id="newsletter_email" type="email" required class="form-control" placeholder="E-mail">
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
	
    export default {
        data: function(){
        	return {
        		email: '',
        		name: '',
  				errors: []
        	}
        },
        methods: {
        	handleSubmitForm: function(){

        		axios.interceptors.request.use(config => {
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
        				toastr.success('Cadastrado com sucesso');
        			}
				}).catch((error) => {
					this.errors = error.response.data;
				});
				
        	}
        },
        mounted: function(){

        },
        components: {
        	
        }
    }
</script>