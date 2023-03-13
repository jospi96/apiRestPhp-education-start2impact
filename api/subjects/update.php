<?php
header ( 'Access-Control-Allow-Methods: PUT' ) ;

$data = json_decode ( file_get_contents ( 'php://input' ), true ) ;
$data_error = [];
$response_code = 204;
$error = '';

if ( empty( $data ) ) {
    $response = new response( '400', [] );
} else {

    for ( $i = 0; $i<count( $data );
    $i++ ) {
        // var_dump( ( $data[ $i ] ) );
        $subjects->name = $data[ $i ][ 'name' ];
        $subjects->id = $data[ $i ][ 'id' ];

        If( empty( $subjects->name ) ||  empty( $subjects->id ) ) {
            array_push( $data_error, $data[ $i ] );
            $response_code = 422;
            die();
        } else {

            $query = "
     UPDATE ".$subjects->table_name." 
     set name_materia=:name where id=:id";

            $stmt = $subjects->get_conn()->prepare( $query );
            $stmt->bindParam( ':name', $subjects->name );
            $stmt->bindParam( ':id', $subjects->id );
            $a = $stmt->execute() ;
            if ( !$a ) {
                $data_send = empty( $data_error )? $data :$data_error;
                $response = new response( $response_code, $data );
                die();
            }
        }
        $data_send = empty( $data_error )? $data :$data_error;
        $response = new response( $response_code, $data_send, $error );
    }
}
?>