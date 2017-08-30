<?php

namespace Kernel;

class App{
	private $router;
	public function init(){
		session_start();

		$router = include_once("routes/web.php");
		$this->router = $router;
		$this->router->init();
	}
}