const date = new Date();
const month = ((date.getMonth() + 1) < 10) ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1)
export default{
	purchase: {
		items: [],
		count: 0,
		total: 0.00,
		created_at: date.getFullYear() + 
			'/' + month + 
			'/' + date.getDate() +
			' ' + date.getHours() +
			':' + date.getMinutes() +
			':' + date.getSeconds(),
		updated_at: date.getFullYear() + 
			'/' + month + 
			'/' + date.getDate() +
			' ' + date.getHours() +
			':' + date.getMinutes() +
			':' + date.getSeconds()
	}
}