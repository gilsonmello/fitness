<template>
	<div class="container">
		<div class="row" v-show="login_load">
			<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
				<load></load>
			</div>
		</div>
		<div class="row" v-show="!login_load">
			<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6" >
				<h1 class="page-header">Fazer login</h1>
				<form action="/login" method="POST" @submit.prevent="handleLoginFormSubmit()">
					<div class="alert alert-danger" v-if="errors.credentials">
						<label>{{ errors.credentials }}</label>
					</div>
					<div class="form-group">
					    <label for="email">E-mail</label>
					    <input v-model="login.email" required="required" type="email" class="form-control" id="email" placeholder="E-mail">
				  	</div>
				  	<div class="form-group">
					    <label for="password">Senha</label>
					    <input v-model="login.password" required="required" minlength="6" type="password" class="form-control" id="password" placeholder="Senha">
				  	</div>
				  	<div class="form-group row">
				      	<div class="offset-sm-2 col-sm-10">
				        	<button type="submit" class="btn btn-primary">Login</button>
				      	</div>
				    </div>
				</form>
			</div>
			<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6" style="border-left: 1px solid #ccc">
				<h1 class="page-header">Cadastre-se</h1>
				<form method="POST" v-on:submit.prevent="create()">
					<div class="row">
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						  	<div class="form-group">
							    <label for="name">Nome</label>
							    <input type="text" required="required" class="form-control" id="name" v-model="name" placeholder="Nome">
							    <div class="alert alert-danger" v-if="errors.name">
								  	<label v-for="name in errors.name" >{{name}}</label>
								</div>
						  	</div>
					  	</div>
					  	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
					  		<div class="form-group">
							    <label for="email">E-mail</label>
							    <input @blur="verifyEmail()" type="email" required="required" class="form-control" id="email" v-model="email" placeholder="E-mail">
									<div class="alert alert-danger" v-if="errors.email">
								  	<label v-for="email in errors.email" >{{ email }}</label>
								</div>
						  	</div>
					  	</div>
				    </div>
				    <div class="row">
				    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					  		<div class="form-group">
							    <label for="password">Senha</label>
							    <input type="password" required="required" class="form-control" id="password" v-model="password" placeholder="Senha">
							    <div class="alert alert-danger" v-if="errors.password">
								  	<label v-for="password in errors.password" >{{password}}</label>
								</div>
						  	</div>
					  	</div>
					  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					  		<div class="form-group">
							    <label for="password">Confirme a senha</label>
							    <input type="password" required="required" class="form-control" id="confirm_password" v-model="confirm_password" placeholder="Confirme a senha">
							    <div class="alert alert-danger" v-if="errors.confirm_password">
								  	<label v-for="confirm_password in errors.confirm_password" >
							  	 		{{ confirm_password }}
							  	 	</label>
								</div>
						  	</div>
					  	</div>
				    </div>
				    <div class="row">
				    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				    		<div class="form-group">
							    <label for="birth_date">Data de Nascimento</label>
							    <input-mask required="required" placeholder="Data de Nascimento" mask="99/99/9999" v-model="birth_date"></input-mask>
							    <div class="alert alert-danger" v-if="errors.birth_date">
								  	<div v-for="birth_date in errors.birth_date">{{birth_date}}</div>
								</div>
						  	</div>
				    	</div>

				    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				    		<div class="form-group">
							    <label for="birth_date">Academia</label>
							    <select2 :options="gym" v-model="selected"></select2>
							    <div class="alert alert-danger" v-if="errors.supplier_id">
								  	<div v-for="supplier in errors.supplier_id">
								  		{{supplier}}
								  	</div>
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
			</div>
		</div>
	</div>
</template>
<script>

	import {loginUrl, getHeader, userUrl, rt} from '../../config'
	import {mapState} from 'vuex'
	import Load from '../Load'
	
	export default {
		name: 'login',
		computed: {
            ...mapState({
                User: state => state.Users
            })
        },
        beforeRouteEnter: function(from, to, next){
        	next();
        },
        watch: {
        	'$route' (to, from) {
		      	this.login_load = false;
		    }
        },
        mounted: function(){
        	var vm = this;
			//$(vm.$el).find('#birth_date').inputmask('99/99/9999');
			var url = '/suppliers';
			axios.get(url, {}).then(response => {
				if(response.status === 200){
					response.data.unshift({
						id: 0,
						text: 'Selecione a academia'
					})
					this.gym = response.data;
				}
			});
        },
		methods: {
			verifyEmail: function(){
				axios.get(baseUrl+ '/users/verify_email', {}).then(response => {

				})
			},
			handleLoginFormSubmit: function(){
				const data = {
		            grant_type: 'password',
		            client_id: 2,
		            client_secret: 'VnB0XbwyxgmzZHGWO6Z88cJ1MB6kbYffvtEKqopV',
		            username: this.login.email,
		            password: this.login.password,
		            scope: '',
		        };
		        
		        axios.interceptors.request.use(config => {
		        	this.login_load = true;
				  	return config;
				});

				axios.post(loginUrl, qs.stringify(data)).then(response => {
					
					if(response.status === 200){
						const authUser = {};
              			authUser.access_token = response.data.access_token
              			authUser.refresh_token = response.data.refresh_token
						window.localStorage.setItem('authUser', JSON.stringify(authUser))

						//Fazendo busca do usuário logado, para setar na estrutura de dados
						axios.get(userUrl, {headers: getHeader()}).then(response => {
							this.login_load = false;
		                  	authUser.email = response.data.email
		                  	authUser.name = response.data.name
		                  	window.localStorage.setItem('authUser', JSON.stringify(authUser))
		                  	this.$store.dispatch('setUserObject', authUser)
		                  	//window.location.href = "/painel"
		                  	this.$router.push({name: 'home'});
		                })
					}

				}).catch((error) => {
					this.login_load = false;
					this.errors = {
						credentials: 'Usuário ou Senha inválidos'
					};
				});
				this.login_load = false;
			},
			create: function(){

				axios.interceptors.request.use(config => {
		        	this.login_load = true;
				  	return config;
				});
				
				//Fazendo requisição para criar o usuário
				axios.post(rt.users.create, qs.stringify({
					name: this.name,
					email: this.email,
					password: this.password,
					confirm_password: this.confirm_password,
					birth_date: this.birth_date,
					supplier_id: this.selected
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
							this.login_load = false;
		                  	authUser.email = response.data.email;
		                  	authUser.name = response.data.name;
		                  	window.localStorage.setItem('authUser', JSON.stringify(authUser))
		                  	this.$store.dispatch('setUserObject', authUser)
		                  	this.$router.push({name: 'dashboard'})
							toastr.success('Cadastrado com sucesso');
		                })
					}
				}).catch(error => {			
					this.login_load = false;
					this.errors = error.response.data.errors;
				})
			}
		},
		data: function(){
			return {
				login: {
					email: '',
					password: ''
				},
				name: '',
				email: '',
				password: '',
				confirm_password: '',
				birth_date: '',
				errors: [],
				login_load: false,
				gym: [],
				selected: null
			}
		},
		components: {
			Load
		}
	}
	
</script>