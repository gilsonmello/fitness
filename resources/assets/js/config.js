import {access_token, url} from './bootstrap'
export const protocol = "http://"
export const apiDomain = url
export const loginUrl = url+'/oauth/token'
export const userUrl = url+'/api/user'

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
		create: protocol+apiDomain+'/users',
		edit: protocol+apiDomain+'/{id}/user',
		logged: protocol+apiDomain+'/users/logged',
		logout: protocol+apiDomain+'/users/logout'
	}
};
