<?php

class Controller {
	
	public function view($view_path) {
		return 'modules/'.$view_path.'.html';
	}

	public function with_value($value_name, $value) {
		$_SESSION[$value_name] = $value; // replace this process with a more direct approach to reduce vulnerability
	}

	public function run_service($service, $function) {
		$service[0] = strtoupper($service[0]);
		$service .= "Service";
		
		$instance = new $service();

		return $instance->$function();
	}
	
}