export const enviroment = "local";
export const host = enviroment == "production" ? "http://pi.mirandafitness.com.br" : "http://localhost:8000";
window.urlPainel = enviroment == "production" ? "http://www.painel.mirandafitness.com.br" : "http://localhost:8080";

//Evento para escutar se foi excluído o localstorage
window.addEventListener('storage',function(e){
    if(event.key == "authUser" && e.newValue == null){
   		window.location.href = host;
    }
});
function getParamsUrl() {
    var s1 = location.search.substring(1, location.search.length).split('&'),
        r = {}, s2, i;
    for (i = 0; i < s1.length; i += 1) {
        s2 = s1[i].split('=');
        r[decodeURIComponent(s2[0]).toLowerCase()] = decodeURIComponent(s2[1]);
    }
    return r;
};

window.QueryString = getParamsUrl();

window._ = require('lodash');

window.qs = require('qs');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap-sass');
    require('jquery.inputmask/dist/jquery.inputmask.bundle.js');
    require('bootstrap-datepicker');
    require('bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css');
    //require('bootstrap-datepicker');
    window.toastr = require('toastr');
    require('select2');
    require('select2/dist/css/select2.css');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

var token = document.head.querySelector('meta[name="_token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.getCookie = function(name){
	var cookies = window.document.cookie;
	var prefix = name + "=";
    var begin = cookies.indexOf("; " + prefix);
	if (begin == -1) {
 		begin = cookies.indexOf(prefix);         
        if (begin != 0) {
            return null;
        }
 
    } else {
        begin += 2;
    }
    var end = cookies.indexOf(";", begin);
    if (end == -1) {
        end = cookies.length;                        
    }
    return unescape(cookies.substring(begin + prefix.length, end));
};

window.deleteCookie = function(name) {
   	if (getCookie(name)) {
      	document.cookie = name + "=" + "; expires=Thu, 01-Jan-70 00:00:01 GMT";
      	return true;
   	}
   	return false;
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
