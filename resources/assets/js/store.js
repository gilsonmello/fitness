import Vue from 'vue'
import Vuex from 'vuex'


import Users from './modules/users/main'
import Cart from './modules/Cart/main'

Vue.use(Vuex)
const debug = process.env.NODE_ENV ==! 'production'


export default new Vuex.Store({
	modules: {
		Users,
		Cart
	},
	strict: debug
})