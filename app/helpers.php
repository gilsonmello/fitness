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