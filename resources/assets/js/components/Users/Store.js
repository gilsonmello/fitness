const state = {
	authUser: null
}

const mutations = {
	SET_AUTH_USER: function(state, userObj){
		state.authUser = userObj
	}
}

const actions = {
	setUserObject: ({commit}, userObj) => {
		commit('SET_AUTH_USER', userObj)
	}
}

export default {
	state, 
	mutations, 
	actions,
	getters: {
	    auth : state => {
	      	return state.authUser
	    }
  	}
}