<?php
header('Access-Control-Allow-Origin:*');
header("Access-Control-Allow-Headers:*");
header ( 'Content-Type: application/json ;charset=UTF-8' ) ;

include 'core/bootstrap.php';

$method=$_SERVER['REQUEST_METHOD'];
$url=$_SERVER['REQUEST_URI'];
$urs=explode("?",$url);

$router= new Router;
require "routes.php";

require $router->direct($urs[0]);





?>