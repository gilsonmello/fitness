<template>
	<main class="container">
		<header-component></header-component>
		<hr>
		<slider-component></slider-component>
		<hr>
		<transition name="fade">
		  	<keep-alive>
				<router-view></router-view>
		  	</keep-alive>
		</transition>
		<hr>
		<newsletter-component></newsletter-component>
		<hr>
		<footer-component></footer-component>
	</main>
</template>


<script>
	import {loginUrl, getHeader, userUrl} from './config'
	import HeaderComponent from './components/HeaderComponent.vue'
	import SliderComponent from './components/SliderComponent.vue'
	import NewsletterComponent from './components/NewsletterComponent.vue'
	import FooterComponent from './components/FooterComponent.vue'
	import {mapState} from 'vuex'

	export default {
		name: 'Miranda',
		data(){
			return {
				login: {
					email: '',
					password: ''
				}
			}
		},
		components: {
			HeaderComponent,
			NewsletterComponent,
			SliderComponent,
			FooterComponent
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
	  		const userObj = JSON.parse(window.localStorage.getItem('authUser'))
	  		this.$store.dispatch('setUserObject', userObj)
	  	},
	    mounted() {
	        window.console.log('Component mounted.')
	    }
	}
	
</script>