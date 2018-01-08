<template>
	
	<main v-if="loading">
		<load-component style=" position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></load-component>
	</main>

	<main v-else>
		<header-component></header-component>
        <transition name="fade" mode="out-in" appea>
            <keep-alive>
                <router-view :key="key"></router-view>
            </keep-alive>
        </transition>
		<newsletter-component></newsletter-component>
		<footer-component></footer-component>
	</main>

</template>


<script>
	import {loginUrl, getHeader, userUrl} from './config'
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
	    mounted() {
	        //window.console.log('Component mounted.')
	        router.beforeEach((to, from, next) => {
	        	if (to.matched.some(record => record.meta.reuse === false)) {
				    this.key = to.path
			  	} else {
				    this.key = null
			  	}
	        	this.loading = true
                next()

                // $('.body').addClass('fade-enter-active');
                // $('.body').removeClass('fade-leave-active');

            })
            router.afterEach((to, from) => {
            	this.loading = false
			})
			this.loading = false
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
</style>