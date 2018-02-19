export default {
	setItem(): ({commit}, item) => {
		commit('SET_ITEM', item)
	}
}