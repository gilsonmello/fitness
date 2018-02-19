export default{
	SET_ITEM(state, item){
		state.cart.items.push(item)
		state.cart.count = state.cart.items.length
		state.cart.total += item.value
	}
}