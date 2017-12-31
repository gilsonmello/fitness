<template>
	<main id="app">
		<header-component></header-component>
        <transition name="fade">
            <keep-alive>
                <router-view></router-view>
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
	  		const userObj = JSON.parse(window.localStorage.getItem('authUser'));
	  		this.$store.dispatch('setUserObject', userObj);
	  	},
	    mounted() {
	        //window.console.log('Component mounted.')
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