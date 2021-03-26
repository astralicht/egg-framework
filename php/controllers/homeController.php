<?php

class HomeController {

	public function index() {
		$controller = new Controller();
		return $controller->view('home/index');
	}

}
