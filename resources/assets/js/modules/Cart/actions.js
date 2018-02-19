export default {
	setItem: ({commit}, item) => {
		commit('SET_ITEM', item)
	},
	clearItem: ({commit}, item) => {
		commit('CLEAR_ITEM', item)
	}
}