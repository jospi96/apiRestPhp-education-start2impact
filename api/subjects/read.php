<?php
header ( 'Access-Control-Allow-Methods: GET' ) ;

// select all
$query = "SELECT * FROM subjects " ;

$stmt = $subjects->get_conn()->prepare( $query );

// execute query
if ( $stmt->execute() ) {
    $stmt->setFetchMode( PDO::FETCH_ASSOC );
    $data = $stmt->fetchAll();
    
    http_response_code( 200 );

    $response = new response( '200', $data );
    

} else {

    http_response_code( 200 );

    $response = new response( '404', [] );
    


}
