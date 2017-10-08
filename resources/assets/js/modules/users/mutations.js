export default{
	SET_AUTH_USER(state, userObj){
		state.authUser = userObj
	},
	CLEAR_AUTH_USER(state){
		state.authUser = null
	}
}