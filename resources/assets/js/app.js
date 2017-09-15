/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'
import store from './store'

import App from './App.vue'
/*window.Vue = require('vue');
window.axios = require('axios')
window.VueAxios = require('vue-axios');
window.VueMaterial = require('vue-material');*/
/*Vue.use(VueMaterial)*/
Vue.use(VueRouter)
Vue.use(VueResource)


Vue.component('app', App)

const routes = [
    { path: '/', component: require('./components/Home/HomeComponent.vue'), name: 'home' },
    { path: '/users/create', component: require('./components/Users/Create.vue') },
    { path: '/login', component: require('./components/Login/Login.vue')}
]

const router = new VueRouter({
    routes
})

router.beforeEach((to, from, next) => {
    if(to.meta.requiresAuth == true){
        const authUser = JSON.parse(window.localStorage.getItem('authUser'))
        if(authUser){
            next()
        }else{
            next({
                name: 'home'
            })
        }
    }
    next()
})

/*Vue.material.registerTheme('default', {
  primary: 'blue',
  accent: 'red',
  warn: 'red',
  background: 'grey'
})*/




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//Vue.component('app', require('./App.vue'));
/*Vue.component('example', require('./components/Example.vue'));
Vue.component('users', require('./components/Users.vue'));*/
/*
Vue.component('my-component', {
  template: '<span>{{ message }}</span>',
  data: {
    message: 'hello'
  }
});*/

new Vue({
    router,
    store,
    data: function(){
        return {
        }
    },
    created: function(){
        window.console.log(window.location.host)
        /*const data = {
            grant_type: 'password',
            client_id: 2,
            client_secret: 'p2NErCSjWHnT3OhqE83JaEttG0PWQxJLFuvEo1bE',
            username: 'junnyorr.sirnandes@gmail.com',
            password: '123',
            scope: ''
        };
        axios.post('oauth/token', qs.stringify(data)).then((response) => {
            window.console.log(response);

            const header = {
                'Accept': 'appliaction/json',
                'Authorization': 'Bearer '+ response.data.access_token
            };

            axios.get('api/user', {headers: header}).then((response) => {
                window.console.log(response);
            });
        });*/


/*
var authOptions = {
            method: 'POST',
            url: '/api/test',
            data: {name: 'gilson'},
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            json: true
        };
        axios(authOptions).then(function(response){
            console.log(response.data);
        })
        .catch(function(error){
            console.log(error);
        });*/
        /*$.ajax({
            url: 'api/test',
            type: 'post',
            data: {
                grant_type: 'password',
                client_id: 2,
                client_secret: 'p2NErCSjWHnT3OhqE83JaEttG0PWQxJLFuvEo1bE',
                username: 'junnyorr.sirnandes@gmail.com',
                password: '123',
                scope: ''
            },
            success: function(data){
                window.console.log(data);
            }
        });*/
    }
}).$mount('#app');



/*new Vue({
    el: '#crud',
    created: function(){
        this.getUsers();
    },
    data: {
        allUsers: []
    },
    methods: {
        getUsers: function(){
            var url = '/users';
            axios.get(url).then(response => {
                this.allUsers = response.data
            });
        },
        deleteUser: function(user){
            var url = '/users/'+user.id;
            axios.delete(url).then(response => {
                this.getUsers();
                toastr.success('Deleted Success');
            });
        }
    }
});*/

/*var urlUsers = '/api/users';
new Vue({
    el: '#main',
    created: function() {
        this.getUsers();
    },
    data: {
        lists: []
    },
    methods: {
        getUsers: function() {
            axios.get(urlUsers).then(response => {
                this.lists = response.data
            });
        }
    }
});*/
