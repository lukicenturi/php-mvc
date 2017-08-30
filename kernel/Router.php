<?php

namespace Kernel;

class Router{
	private $routes;
	public function get($url, $action){
		$this->add('GET', $url, $action);
	}
	public function post($url, $action){
		$this->add('POST', $url, $action);
	}
	public function add($method, $url, $action){
		$action = explode("@", $action);
		$controller = $action[0];
		$function = $action[1];
		$url = "/". ltrim($url, "/");

		$key = $method . "@" . $url;
		$this->routes[$key] = [
			'method'=>$method,
			'controller'=>$controller,
			'function'=>$function
		];
	}
	public function init(){
		$prefix = ACTIVE_ROUTE;
		$method = REQUEST_METHOD;
		$key = $method . '@' . $prefix;
		if(array_key_exists($key, $this->routes)){
			$data = $this->routes[$key];
			$controllerName = $data['controller'];
			$controller = "\App\\Controllers\\".$controllerName;
			if(class_exists($controller)){
				$controller = new $controller();
				$function = $data['function'];
				if(method_exists($controller, $function)){
					$controller->$function();
				}else{
					error("Method ". $function . " not found in controller ". $controllerName);
				}
			}else{
				error("Class ". $controllerName . " not found");
			}
		}else{
			error("Route not found");
		}
	}
}