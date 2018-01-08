import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

export default new Router({
  	routes: [
	    { 
	        path: '/', 
	        component: require('../components/Home/HomeComponent.vue'), 
	        name: 'home',
	        meta: { reuse: false },
	    },
	    { 
	        name: 'users.create',
	        path: '/register', 
	        component: require('../components/Users/Create.vue'),
	        meta: { reuse: false },
	    },
	    { 
	        path: '/login', 
	        name: 'login',
	        //meta: { requiresAuth: true },
	        meta: { reuse: false },
	        component: require('../components/Login/Login.vue')
	    },
	    {   path: '/categories',
	        name: 'categories.index', 
	        component: require('../components/Categorie/Index.vue')
	    },    
	    {   path: '/categories/:slug',
	        name: 'categories.show', 
	        props: true,
	        component: require('../components/Categorie/Show.vue')
	    }, 
	    {   path: '/packages',
	        name: 'packages.index', 
	        component: require('../components/Package/Index.vue')
	    },
	    {
	        name: 'packages.show',
	        path: '/packages/:slug',
	        props: true,
	        component: require('../components/Package/Show.vue')
	    },
	    {
	        name: 'aboutus',
	        path: '/sobre',
	        props: true,
	        component: require('../components/AboutUs.vue')
	    },
	    {
	        name: 'contactus',
	        path: '/contactus',
	        props: true,
	        component: require('../components/ContactUs.vue')
	    }
  	],
    linkExactActiveClass: 'active'
})
