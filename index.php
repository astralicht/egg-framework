<?php

// Turn line below into a comment to enable PHP error reporting.
error_reporting(0);

include_once 'config.php';
include_once 'routes.php';

function showErrorPage()
{
	$instance = new Error404Controller();
	include_once $instance->index();
	die;
}

$original_URI = $_SERVER['REQUEST_URI'];
$exploded_URI = explode("/", $original_URI);
$json_string = file_get_contents("php://input");
$URI_offset = ['LOCAL' => 1, 'PRODUCTION' => 2];
$offset = $URI_offset[$ENVIRONMENT];

foreach (range(0, $offset - 1) as $i) {
	array_shift($exploded_URI);
}

$final_URI = implode("/", $exploded_URI);
$URI_length = 0;

if (implode("", $exploded_URI) !== "") {
	$URI_length = count($exploded_URI);
}

if ($URI_length === 0) {
	$route = $ROUTE['/'];
	$route = explode('/', $route);
	$controller = $route[0];
	$function = $route[1];

	header("Location: $controller/$function");
} else {
	$obj = json_decode($json_string, true);
	$URI_route = $ROUTE[$final_URI];
	if (isset($URI_route)) {
		$URI_route = explode('/', $URI_route);
		$controller = $URI_route[0];
		$function = $URI_route[1];
		$data = $exploded_URI[2];

		$controller[0] = strtoupper($controller[0]);
		$controller .= "Controller";
		$instance = new $controller();

		if ($obj) {
			$response = $instance->$function($obj);
			echo json_encode($response);
		} else {
			$response = $instance->$function($data);
		}
	}

	if ($response !== null) {
		include_once $response;
	} else {
		showErrorPage();
	}
}