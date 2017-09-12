/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./includes');

import Vue from 'vue'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'
import PainelComponent from './components/Painel/PainelComponent.vue'
import DashboardComponent from './components/Painel/DashboardComponent.vue'
import EvaluationComponent from './components/Painel/Report/EvaluationComponent.vue'
import store from './store'

Vue.use(VueRouter)
Vue.use(VueResource)

Vue.component('painel', PainelComponent)


const routesPainel = [
	{ path: '/painel', name: 'painel', meta: { requiresAuth: true } },
	{ path: '/painel/user/profile', name: 'profile', component: DashboardComponent, meta: { requiresAuth: true } },
    { path: '/painel/evaluations', name: 'report_evaluations', component: EvaluationComponent, meta: { requiresAuth: true } }
]

const routerPainel = new VueRouter({
    mode: 'history',
    routes: routesPainel
})

routerPainel.beforeEach((to, from, next) => {
    if(to.meta.requiresAuth == true){
        const authUser = JSON.parse(window.localStorage.getItem('authUser'))
        if(authUser){
            next()
        }else{
            window.location.href = '/login'
        }
    }
    next()
})


const pn = new Vue({
	el: '#dash',
	store,
    router: routerPainel,
    created: function(){
        console.log('painel')
    },
    render: h => h(PainelComponent)
})