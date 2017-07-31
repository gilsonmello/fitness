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



if (!function_exists('imageurl')) {

	/**
	 * @param $entity
	 * @param $id
	 * @param $photo
	 * @param int $size
	 * @param string $alternate
	 * @return mixed|string
	 * @throws Exception
	 */
	function imageurl($entity, $photo, $size = 0, $square = false) {
		
		if(is_null($photo)){
			return "";
		}
		if ($size === 0) {
			$size = '';
		} else {
			if ($square) {
				$size = '_square' . $size;
			} else {
				$size = '_size' . $size;
			}
		}

		if(!empty($size)){
			$photo = explode(';', $photo);
			foreach($photo as $value){
				if(strpos($value, $size)){
					$photo = $value;
					continue;
				}
			}
		}else{
			$photo = explode(';', $photo)[0];
		}

		$photo = '/uploads/images/' . $entity  . '/' . $photo;

		//O getimagesize funciona melhor que o file_exists nesse caso. O @ � usado para a fun��o retornar false ao inv�s
		//de atirar um erro.
		if(file_exists(public_path().''.$photo)){
			return $photo;
		}
		return "";
	}

}

if (!function_exists('img_sizes')) {

	/**
	 * @param $path
	 * @param $img
	 * @return array
	 */
	function img_sizes($path, $img) {
		if (!preg_match('/\.(gif|jpg|jpeg|tiff|png)$/', $img))
			return NULL;

		list($img_name, $img_extension) = explode('.', $img);

		$dimensions = Config::get('imageupload.dimensions');

		$sources = [];
		$sources['original'] = $path . '/' . $img;
		foreach ($dimensions as $key => $dimension) {
			$sources[$key] = $path . '/' . $img_name . '_' . $key . '.' . $img_extension;
		}

		return $sources;
	}

}