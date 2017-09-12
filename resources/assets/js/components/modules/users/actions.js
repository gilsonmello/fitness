export default{
	setUserObject(): ({commit}, userObj) => {
		commit('SET_AUTH_USER', userObj)
	}
}