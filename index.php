<?php
header( 'Access-Control-Allow-Origin:*' );
header( 'Access-Control-Allow-Headers:*' );
header ( 'Content-Type: application/json ;charset=UTF-8' ) ;
require 'vendor/autoload.php';
require 'core/bootstrap.php';

Router::load( 'routes.php' )->direct( Request::uri(), Request::method() );

?>