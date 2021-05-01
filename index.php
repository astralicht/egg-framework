<?php

// Turn line below into a comment to enable PHP error reporting.
error_reporting(0);

include_once 'config.php';
include_once 'routes.php';

$original_URI = $_SERVER['REQUEST_URI'];
$exploded_URI = explode("/", $original_URI);
$json_string = file_get_contents("php://input");
$URI_offset = 2;

if ($ENVIRONMENT === "LOCAL") {
	foreach (range(0, $URI_offset - 1) as $i) {
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
		$controller = $exploded_URI[0];
		$function = $exploded_URI[1];
		$data = $exploded_URI[2];

		$controller[0] = strtoupper($controller[0]);
		$controller .= "Controller";

		$instance = new $controller();

		$obj = json_decode($json_string, true);

		if (isset($ROUTE[$final_URI])) {
			if ($obj) {
				$response = $instance->$function($obj);
				echo json_encode($response);
			} else {
				$response = $instance->$function($data);
			}
		}

		if ($response !== null) {
			include_once $response;
		}
	}
} else if ($ENVIRONMENT === "PRODUCTION") {
	$URI_offset = 1;

	foreach (range(0, $URI_offset - 1) as $i) {
		array_shift($exploded_URI);
	}

	$final_URI = implode("/", $exploded_URI);
	$URI_length = 0;
}

function showErrorPage()
{
	$instance = new Error404Controller();
	include_once $instance->index();
	die;
}
