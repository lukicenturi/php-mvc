<?php

include_once("bootstrap/app.php");
include_once("bootstrap/helper.php");
include_once("bootstrap/autoload.php");

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:X-Requested-With, Authorization, Content-Type");

$app = new \Kernel\App();
$app->init();