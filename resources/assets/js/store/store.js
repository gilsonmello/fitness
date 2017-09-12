import Vue from 'vue'
import Vuex from 'vuex'


import Users from './modules/users/main'

Vue.use(Vuex)
const debug = process.env.NODE_ENV ==! 'production'

export default new Vuex.Store({
	/*UsersStore*/
	modules: {
		Users
	}
})