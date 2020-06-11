<?php

namespace Controller;

include 'config.php';

class Controller {
	public function view($view_path) {
		return 'resources/views/'.$view_path.'.html';
	}

	public function get_service_path($service_name){
		return 'php/service/'.$service_name.'Service.php';
	}

	public function with_value($value_name, $value) {
		$_SESSION[$value_name] = $value;
	}
}