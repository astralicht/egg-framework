<?php

include_once 'config.php';
include_once 'routes.php';

$original_URI = $_SERVER['REQUEST_URI'];
$exploded_URI = explode("/", $original_URI);

if($ENVIRONMENT === "LOCAL"){
	$temp = array_shift($exploded_URI);
	$temp = array_shift($exploded_URI);
	$final_URI = implode("/", $exploded_URI);
	$URI_length = 0;

	if(implode("", $exploded_URI) !== "") {
		$URI_length = count($exploded_URI);
	}

	if($URI_length === 0) {
		$route = $ROUTE['/'];
		$route = explode('/', $route);
		$controller = $route[0];
		$function = $route[1];

		header("Location: $controller/$function");
	}
	else {
		if(isset($ROUTE[$final_URI])) {
			$controller = $exploded_URI[0];
			$function = $exploded_URI[1];

			$controller[0] = strtoupper($controller[0]);
			$controller .= "Controller";

			$instance = new $controller();
			$response = $instance->$function();

			if($response !== null) {
				include_once $response;
			}
		}
		else {
			showErrorPage();
		}
	}
}
else if($ENVIRONMENT === "PRODUCTION") {
	// enter code here
}

function showErrorPage() {
	$controller = new Error404Controller();
	include_once $controller->index();
	die;
}
