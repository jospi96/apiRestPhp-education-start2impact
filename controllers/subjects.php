<?php

$dbi = new database();
$dbi->connect();
$db = $dbi->getDb();
$subjects = new subjects( $db );


switch ( $method ) {
    case 'GET' : require_once("api/subjects/read.php");
    break;
    case 'POST' : require_once("api/subjects/create.php");
    break;
    case 'DELETE' : require_once("api/subjects/delete.php");
    break;
    case 'PUT' : require_once("api/subjects/update.php");
    break;

}