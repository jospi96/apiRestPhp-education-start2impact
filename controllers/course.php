<?php
include 'api/courses/function/function.php';
$dbi = new database();
$dbi->connect();
$db = $dbi->getDb();
$courses = new courses( $db );


switch ( $method ) {
    case 'GET' : require_once("api/courses/read.php");
    break;
    case 'POST' : require_once("api/courses/create.php");
    break;
    case 'DELETE' : require_once("api/courses/delete.php");
    break;
    case 'PUT' : require_once("api/courses/update.php");
    break;

}


/*
function CreatePosts( $corsi ) {

    $data = $corsi->create();
    if ( $data ) {
        echo $data;
    }
}*/

?>