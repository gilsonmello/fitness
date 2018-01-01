export const protocol = "http://"
export const apiDomain = window.location.host
export const loginUrl = '/oauth/token'
export const userUrl = '/api/user'

export const getHeader = function () {
  	const tokenData = JSON.parse(window.localStorage.getItem('authUser'));
  	const token = (typeof tokenData.access_token == 'object') ? tokenData.access_token.token : tokenData.access_token;
 	const headers = {
	    'Accept': 'application/json',
	    'Authorization': 'Bearer ' + token
  	}
  return headers
}

export const rt = {
	users: {
		create: '/users',
		edit: '/{id}/user',
		logged: '/users/logged',
		logout: protocol+apiDomain+'/users/logout'
	}
};
