import {access_token, host} from './bootstrap'
export const protocol = "http://"
export const apiDomain = host
export const loginUrl = host+'/oauth/token'
export const userUrl = host+'/api/user'

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
		create: host+'/users',
		edit: host+'/{id}/user',
		logged: host+'/users/logged',
		logout: host+'/users/logout'
	}
};
