<?php

$router = new \Kernel\Router();

$router->get("/", "PlaceController@index");
$router->get("place", "PlaceController@all");

return $router;

?>