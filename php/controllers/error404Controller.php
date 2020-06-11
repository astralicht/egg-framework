<?php

include_once "Controller.php";

use Controller\Controller;

class Error404 {

	public function index() {
		return Controller::view('error404/index');
	}

}
