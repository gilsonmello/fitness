<template>
	<div class="container" id="box">
		<form method="POST" v-on:submit.prevent="create()">
			<h1 class="page-header">Cadastre-se</h1>
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
					    <input @blur="verifyEmail()" type="email" class="form-control" id="email" v-model="email" placeholder="E-mail">
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
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="container_birth_date">
		    		<div class="form-group">
					    <label for="birth_date">Data de Nascimento</label>
					    <!-- <input-mask placeholder="Data de Nascimento" mask="99/99/9999" v-model="birth_date"></input-mask> -->
					    <!-- <input type="text" class="form-control datepicker" name="birth_date"> -->
					    <datepicker id="birth_date" placeholder="Data de Nascimento" :options="datepicker_options" v-model="birth_date" class="form-control"></datepicker>
					    <div class="alert alert-danger" v-if="errors.birth_date">
						  	<div v-for="birth_date in errors.birth_date">{{ birth_date }}</div>
						</div>
				  	</div>
		    	</div>
		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    		<div class="form-group">
					    <label for="birth_date">Academia</label>
					    <select2 :options="options" v-model="selected"></select2>
					    <div class="alert alert-danger" v-if="errors.supplier_id">
						  	<div v-for="supplier_id in errors.supplier_id">{{ supplier_id }}</div>
						</div>
				  	</div>
		    	</div>
		    </div>
		    <div class="row"> 
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				  	<div class="form-group">
				  		<button class="hide btn btn-default pull-right" type="load">
			      			<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
			      		</button>
			        	<button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
				    </div>
			    </div>
		    </div>
		</form>
	</div>
</template>

<script>
	import {loginUrl, getHeader, userUrl, rt} from '../../config'
	import {mapState} from 'vuex'
	import Load from '../Load'
	export default {
		name: 'users-create',
		computed: {
            ...mapState({
                User: state => state.Users
            })
        },
        watch: {
        	$route: function (to, from) {
		      	
		    }
        },
		data: function(){
			return {
				name: '',
				email: '',
				password: '',
				confirm_password: '',
				birth_date: '',
				selected: '',
			    options: [
			      
			    ],
				selectedGym: 3,
				errors: [],
				user_load_create: null,
				datepicker_options: {
					container:'#container_birth_date'
				}
			}
		},
		beforeRouteEnter: function(from, to, next){
			next();
        },
		methods: {
			verifyEmail: function(){
				window.console.log('aqui');
			},
			create: function(){
				axios.interceptors.request.use(config => {
		        	$(this.$el).find('[type="load"]').removeClass('hide');
		        	$(this.$el).find('[type="submit"]').addClass('hide');
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
						this.$router.push({name: 'home'})
						toastr.options.timeOut = 10000;
						toastr.options.newestOnTop = true
						toastr.options.positionClass = 'toast-top-full-width'
						toastr.success(
							'Verifique sua caixa de e-mail', 
							'Enviamos e-mail de confirmação'
						);
						/*const authUser = {};
              			authUser.access_token = response.data
						window.localStorage.setItem('authUser', JSON.stringify(authUser))
						//Fazendo busca do usuário logado, para setar na estrutura de dados authUser
						axios.get(rt.users.logged, {headers: getHeader()}).then(response => {
							this.name = '';
							this.email = '';
							this.password = '';
							this.confirm_password = '';
							this.birth_date = '';
							this.errors = [];
							this.user_load_create = false;
		                  	authUser.email = response.data.email
		                  	authUser.name = response.data.name
		                  	window.localStorage.setItem('authUser', JSON.stringify(authUser))
		                  	this.$store.dispatch('setUserObject', authUser)
		                  	//this.$router.push({name: 'dashboard'})
							toastr.success('Cadastrado com sucesso');
		                })*/
					}
				}).catch(error => {
					$(this.$el).find('[type="load"]').addClass('hide');
		        	$(this.$el).find('[type="submit"]').removeClass('hide');
					this.errors = error.response.data.errors
				})
			}
		},
		created: function(){

		},
		activated: function(){
	    	var vm = this;
	    	
			/*$(vm.$el).find('#birth_date').inputmask({
				mask: '99/99/9999',
				onBeforeWrite: function(event, buffer, caretPos, opts){
					if(event.target != undefined){
						vm.birth_date = event.target.value;
					}
				}
			});*/
			var url = '/suppliers';
			axios.get(url, {}).then(response => {
				if(response.status === 200){
					response.data.unshift({
						id: 0,
						text: 'Selecione a academia',
						disabled: 'disabled'
					});
					this.options = response.data;
				}
			});
	    },
		mounted: function(){
			
		},
		components: {
			Load
		}
	}
</script>