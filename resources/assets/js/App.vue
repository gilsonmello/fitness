<template>
	
	<main>
		<header-component></header-component>
        
        <transition name="fade" mode="out-in">
            <keep-alive>
                <router-view v-if="!loading"></router-view>
				<load-component v-else style=" position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></load-component>
            </keep-alive>
        </transition>
        
		<newsletter-component></newsletter-component>
		<footer-component></footer-component>
	</main>


</template>


<script>
	import {loginUrl, getHeader, userUrl, rt} from './config'
	import {host} from './bootstrap'
	import HeaderComponent from './components/HeaderComponent.vue'
	import NewsletterComponent from './components/NewsletterComponent.vue'
	import FooterComponent from './components/FooterComponent.vue'
	import LoadComponent from './components/Load.vue'
	import {mapState} from 'vuex'
	import router from './router'

	export default {
		name: 'Miranda',
		data(){
			return {
				login: {
					email: '',
					password: ''
				},
				loading: true,
				key: null,
			}
		},
		watch: {
			$route: function(to, from){
				const authUser = JSON.parse(window.localStorage.getItem('authUser'));
				if(authUser){
					$('#access_painel').attr('href', window.urlPainel+"?access_token="+authUser.access_token);
				}

			},
			loading: function(newValue, oldValue) {
				
			}
		},	
		components: {
			HeaderComponent,
			NewsletterComponent,
			FooterComponent,
			LoadComponent
		},
		props: ['path'],
		computed: {
			...mapState({
				User: state => state.Users
			})
		},
	  	methods: {

	  	},
	  	created: function(){
	  		const userObj = JSON.parse(window.localStorage.getItem('authUser'));
	  		this.$store.dispatch('setUserObject', userObj);
	  	},
	    mounted: function() {
			router.onReady(() => {
				if(QueryString.access_token){
				    axios.get(host+'/users/logged', {
				        headers: {
				            'Accept': 'application/json',
				            'Authorization': 'Bearer ' + QueryString.access_token
				        }
				    }).then(response => {
				        const authUser = {};
				        authUser.access_token = QueryString.access_token
				        authUser.email = response.data.email
				        authUser.name = response.data.name
				        this.$store.dispatch('setUserObject', authUser);
				        window.localStorage.setItem('authUser', JSON.stringify(authUser))
				        window.history.pushState({url: "/"}, '', '/#/');
				    })
				}
				this.loading = false
	    	})

	        //window.console.log('Component mounted.')
	        router.beforeEach((to, from, next) => {
	        	this.loading = true
	        	//setTimeout(() => {
					const authUser = JSON.parse(window.localStorage.getItem('authUser'));
				    if(to.meta.requiresAuth == true){
				        if(authUser){
				            next()
				        }else{
				            next({
				                name: 'home'
				            })
				        }
				    }
				    if(to.name == 'login' && authUser){
				        toastr.info('Você já está logado.');
				        next({
				            name: 'home'
				        });
				    }else{
				        next();
				    }

			    //}, 500)

                // $('.body').addClass('fade-enter-active');
                // $('.body').removeClass('fade-leave-active');

            })
            router.afterEach((to, from) => {
            	//setTimeout(() => {
            		this.loading = false
            	//}, 100);
			})
			
	    },
        updated: function(createElement){
    	 	
        }
	}
	
</script>

<style>
	body{
		background-color: #fff;
		color: #000;
	}
	.page-header{
		color: #000;
	}
	.fade-enter-active, .fade-leave-active {
	  	transition-property: opacity;
	  	transition-duration: .25s;
	}

	.fade-enter-active {
	  	transition-delay: .25s;
	}

	#box{
		margin-top: 70px
	}

	.fade-enter, .fade-leave-active {
	  	opacity: 0
	}
	.flexBox{
		display: flex; 
		flex-flow: row wrap; 
		justify-content: center;
	}
	.vdp-datepicker input{
		width: 100%;
	}
	[v-cloak] {
	  	display: none;
	}

	.datepicker{
		background-color: #fff !important;
	}	

	.glyphicon-refresh-animate {
	    -animation: spin .7s infinite linear;
	    -ms-animation: spin .7s infinite linear;
	    -webkit-animation: spinw .7s infinite linear;
	    -moz-animation: spinm .7s infinite linear;
	}

	@keyframes spin {
	    from { 
	    	transform: scale(1) rotate(0deg);
	    }
	    to { 
	    	transform: scale(1) rotate(360deg);
	    }
	}
	  
	@-webkit-keyframes spinw {
	    from { 
	    	-webkit-transform: rotate(0deg);
	    }
	    to { 
	    	-webkit-transform: rotate(360deg);
	    }
	}

	@-moz-keyframes spinm {
	    from { 
	    	-moz-transform: rotate(0deg);
	    }
	    to { 
	    	-moz-transform: rotate(360deg);
	    }
	}
</style>