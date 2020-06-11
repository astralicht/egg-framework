<?php

include_once "Controller.php";

use Controller\Controller;

class Welcome {

	public function index() {
		return Controller::view('welcome/index');
	}

}