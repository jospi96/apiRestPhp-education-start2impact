<?php
header('Access-Control-Allow-Origin:*');
header("Access-Control-Allow-Headers:*");
header ( 'Content-Type: application/json ;charset=UTF-8' ) ;

include 'database/database.php';
include 'models/courses.php';
include 'models/subjects.php';
include 'models/response.php';
include 'function/function.php';
$method=$_SERVER['REQUEST_METHOD'];
$url=$_SERVER['REQUEST_URI'];
$urs=explode("?",$url);



switch ($urs[0]){
    case "/api/course" : require_once "api/controlers/Controler_corsi.php";
    break;
    case "/api/subject":require_once "api/controlers/Controler_subjects.php";
    break;
    default :echo"404 not found";
    http_response_code(404 );
    
   
}




?>