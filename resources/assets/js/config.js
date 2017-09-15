export const apiDomain = window.location.host
export const loginUrl = '/oauth/token'
export const userUrl = '/api/user'

export const getHeader = function () {
  	const tokenData = JSON.parse(window.localStorage.getItem('authUser'))
 	const headers = {
	    'Accept': 'application/json',
	    'Authorization': 'Bearer ' + tokenData.access_token
  	}
  return headers
}

export const rt = {
	users: {
		create: '/api/users',
		edit: '/api/{id}/user',
		logged: '/api/user'
	}
};
