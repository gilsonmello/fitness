export default{
	setUserObject: ({commit}, userObj) => {
		commit('SET_AUTH_USER', userObj)
	},
	clearAuthUser: ({commit}) => {
		commit('CLEAR_AUTH_USER')
	} 
}