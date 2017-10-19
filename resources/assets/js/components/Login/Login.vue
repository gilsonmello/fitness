<template>
	<div class="container">
		<form action="/login" method="POST" @submit.prevent="handleLoginFormSubmit()">
		  	<div class="form-group">
			    <label for="email">E-mail</label>
			    <input v-model="login.email" type="email" class="form-control" id="email" placeholder="E-mail">
			  </div>
		  	<div class="form-group">
			    <label for="password">Senha</label>
			    <input v-model="login.password" type="password" class="form-control" id="password" placeholder="Senha">
		  	</div>
		  	<div class="form-group row">
		      	<div class="offset-sm-2 col-sm-10">
		        	<button type="submit" class="btn btn-primary">Login</button>
		      	</div>
		    </div>
		</form>
	</div>
</template>
<script>

	import {loginUrl, getHeader, userUrl, rt} from '../../config'
	import {mapState} from 'vuex'
	
	export default {
		name: 'login',
		computed: {
            ...mapState({
                User: state => state.Users
            })
        },
		methods: {
			handleLoginFormSubmit: function(){
				const data = {
		            grant_type: 'password',
		            client_id: 2,
		            client_secret: 'LGbti3QiyHEv3RURLckseKR1laX6v2zDCqpkr6LG',
		            username: this.login.email,
		            password: this.login.password,
		            scope: '',
		        };
				axios.post(loginUrl, qs.stringify(data)).then(response => {
					if(response.status === 200){
						const authUser = {};
              			authUser.access_token = response.data.access_token
              			authUser.refresh_token = response.data.refresh_token
						window.localStorage.setItem('authUser', JSON.stringify(authUser))

						//Fazendo busca do usuário logado, para setar na estrutura de dados
						axios.get(userUrl, {headers: getHeader()}).then(response => {
		                  	/*authUser.email = response.data.email
		                  	authUser.name = response.data.name
		                  	window.localStorage.setItem('authUser', JSON.stringify(authUser))
		                  	this.$store.dispatch('setUserObject', authUser)
		                  	window.location.href = "/painel"*/
		                })
					}
				});
			}
		},
		data: function(){
			return {
				login: {
					email: '',
					password: ''
				}
			}
		},
		components: {
		}
	}
	
</script>