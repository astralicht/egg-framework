<?php

include_once 'config.php';
include_once 'routes.php';

if($CONFIG['environment'] == "local"){
	$URI = explode("/", $_SERVER['REQUEST_URI']);
	if($URI[2] == "") {
		$route = $ROUTE['/'];
		$route = explode("/", $route);
		$route[0][0] = strtoupper($route[0][0]);
		$controller = $route[0];
		$function = $route[1];
		if(null !== $controller::$function()){
			include_once $controller::$function();
		}
	}
	else if(count($URI) == 4) {
		$uri = "";
		for($count = 2; $count < count($URI); $count++) {
			$uri .= $URI[$count].'/';
		}

		if(isset($ROUTE[$uri])) {
			$route = explode("/", $ROUTE[$uri]);
			$route[0][0] = strtoupper($route[0][0]);
			$controller = $route[0];
			$function = $route[1];
			if(null !== $controller::$function()){
				include_once $controller::$function();
			}
		}
		else {
			showErrorPage();
			die();
		}
	}
}
else if($CONFIG['environment'] == "production"){
	$URI = explode("/", $_SERVER['REQUEST_URI']);
	if($URI[2] == "") {
		$route = $ROUTE['/'];
		$route = explode("/", $route);
		$route[0][0] = strtoupper($route[0][0]);
		$controller = $route[0];
		$function = $route[1];
		if(null !== $controller::$function()){
			include_once $controller::$function();
		}
	}
	else if(count($URI) == 3) {
		$uri = "";
		for($count = 1; $count < count($URI); $count++) {
			$uri .= $URI[$count].'/';
		}

		if(isset($ROUTE[$uri])) {
			$route = explode("/", $ROUTE[$uri]);
			$route[0][0] = strtoupper($route[0][0]);
			$controller = $route[0];
			$function = $route[1];
			if(null !== $controller::$function()){
				include_once $controller::$function();
			}
		}
		else {
			showErrorPage();
			die();
		}
	}
}

function showErrorPage() {
	include_once Error404::index();
}
