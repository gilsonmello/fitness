<?php 

if(!function_exists('access')) {
	/**
	 * Access (lol) the Access:: facade as a simple function
	 */
	function access() {
	    return app('App\Services\Access\Access');
	}

}

if (!function_exists('getValueSession')) {

	/**
	 * @param $request
	 * @param string $name
	 * @param string $test
	 * @param string $submit
	 * @param string $default
	 * @return array
	 */
	function getValueSession($request, $name, $test, $submit, $default) {

		$value = $request->input($name, $test);

		if (($submit != '1') && ($value === $test)) {
			$value = $request->session()->get($name, $test);
		}
		if ($value === '') {
			$value = $default;
		}

		$request->session()->put($name, $value);
		
		return $value;
	}
}

if(!function_exists('active')){
	function active($condition){
		$url = isset($_SERVER['REQUEST_URI']) && !empty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "";
		if(strpos($url, $condition, 0) >= 0 && strpos($url, $condition, 0) != FALSE){
			return "active";
		}
		return "";
	}
}

if (!function_exists('format_datebr')) {
	/**
	 * Helper to return a Carbon object from a date timestamp
	 *
	 * @param $date
	 * @return mixed
	 */
	function format_datebr($date) {
		if ($date == null)
			return "";
		else
			return Carbon\Carbon::parse($date)->format('d/m/Y');
	}
}

if (!function_exists('format_datetimebr')) {

	/**
	 * Helper to return a Carbon object from a datetime timestamp
	 *
	 * @param $datetime
	 * @return mixed
	 */
	function format_datetimebr($datetime) {
		if ($datetime == null)
			return "";
		else
			return Carbon\Carbon::parse($datetime)->format('d/m/Y H:i');
	}

}