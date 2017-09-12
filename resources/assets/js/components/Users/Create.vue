<template>
	<form method="POST" v-on:submit.prevent="create()">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			  	<div class="form-group">
				    <label for="name">Nome</label>
				    <input type="text" class="form-control" id="name" v-model="name" placeholder="Nome">
				    <div class="alert alert-danger" v-if="errors.name">
					  	<div v-for="name in errors.name" >{{name}}</div>
					</div>
			  	</div>
		  	</div>
		  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		  		<div class="form-group">
				    <label for="email">E-mail</label>
				    <input type="email" class="form-control" id="email" v-model="email" placeholder="E-mail">
						<div class="alert alert-danger" v-if="errors.email">
					  	<div v-for="email in errors.email" >{{email}}</div>
					</div>
			  	</div>
		  	</div>
	    </div>
	    <div class="row">
	    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		  		<div class="form-group">
				    <label for="password">Senha</label>
				    <input type="password" class="form-control" id="password" v-model="password" placeholder="Senha">
				    <div class="alert alert-danger" v-if="errors.password">
					  	<div v-for="password in errors.password" >{{password}}</div>
					</div>
			  	</div>
		  	</div>
		  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		  		<div class="form-group">
				    <label for="password">Confirme a senha</label>
				    <input type="password" class="form-control" id="confirm_password" v-model="confirm_password" placeholder="Confirme a senha">
				    <div class="alert alert-danger" v-if="errors.confirm_password">
					  	<div v-for="confirm_password in errors.confirm_password" >{{confirm_password}}</div>
					</div>
			  	</div>
		  	</div>
	    </div>
	    <div class="row">
	    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	    		<div class="form-group">
				    <label for="birth_date">Data de Nascimento</label>
				    <input type="text" class="datepicker birth_date form-control" id="birth_date" v-model="birth_date" placeholder="Data de Nascimento">
				    <div class="alert alert-danger" v-if="errors.birth_date">
					  	<div v-for="birth_date in errors.birth_date">{{birth_date}}</div>
					</div>
			  	</div>
	    	</div>
	    </div>
	    <div class="row"> 
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			  	<div class="form-group">
		        	<button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
			    </div>
		    </div>
	    </div>
	</form>
</template>

<script>
	import {loginUrl, getHeader, userUrl, rt} from '../../config'
	import {mapState} from 'vuex'
	export default {
		name: 'users-create',
		computed: {
            ...mapState({
                User: state => state.Users
            })
        },
		data: function(){
			return {
				name: '',
				email: '',
				password: '',
				confirm_password: '',
				birth_date: '',
				errors: []
			}
		},
		methods: {
			create: function(){
				//Fazendo requisição para criar o usuário
				axios.post(rt.users.create, qs.stringify({
					name: this.name,
					email: this.email,
					password: this.password,
					confirm_password: this.confirm_password,
					birth_date: this.birth_date
				})).then((response) => {
					if(response.status === 200){
						const authUser = {};
              			authUser.access_token = response.data
						window.localStorage.setItem('authUser', JSON.stringify(authUser))
						this.name = '';
						this.email = '';
						this.password = '';
						this.confirm_password = '';
						this.birth_date = '';
						this.errors = [];
						//Fazendo busca do usuário logado, para setar na estrutura de dados authUser
						axios.get(rt.users.logged, {headers: getHeader()}).then(response => {
		                  	authUser.email = response.data.email
		                  	authUser.name = response.data.name
		                  	window.localStorage.setItem('authUser', JSON.stringify(authUser))
		                  	this.$store.dispatch('setUserObject', authUser)
		                  	this.$router.push({name: 'dashboard'})
							toastr.success('Cadastrado com sucesso');
		                })
					}
				}).catch(error => {
					this.errors = error.response.data
				})
			}
		}
	}
</script>