<?php

// Turn line below into a comment to enable PHP error reporting.
error_reporting(0);

include_once 'ChromePhp.php';

include_once 'config.php';
include_once 'routes.php';

$original_URI = $_SERVER['REQUEST_URI'];
$exploded_URI = explode("/", $original_URI);
$json_string = file_get_contents("php://input");

if ($ENVIRONMENT === "LOCAL") {
	$temp = array_shift($exploded_URI);
	$temp = array_shift($exploded_URI);
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

		$controller[0] = strtoupper($controller[0]);
		$controller .= "Controller";

		$instance = new $controller();

		$obj = json_decode($json_string, true);

		if (empty($obj)) {
			if (isset($ROUTE[$final_URI])) {
				$response = $instance->$function();
			} else {
				showErrorPage();
			}
		} else {
			$request_function = $obj['function'];
			$id = $exploded_URI[1];
			$data = array(
				"id" => $id,
				"obj" => $obj,
			);
			$response = $instance->$request_function($data);
			echo json_encode($response);
		}

		if ($response !== null) {
			include_once $response;
		}
	}
} else if ($ENVIRONMENT === "PRODUCTION") {
	// enter code here
}

function showErrorPage()
{
	$instance = new Error404Controller();
	include_once $instance->index();
	die;
}
