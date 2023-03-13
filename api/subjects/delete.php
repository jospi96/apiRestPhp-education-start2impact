<?php
header( 'Access-Control-Allow-Methods: DELETE' );

$data = json_decode ( file_get_contents ( 'php://input' ), true ) ;

$data_error = [];
$response_code = 204;
if ( empty( $data ) ) {
    $response = new response( '400', [] );
} else {

    for ( $i = 0; $i<count( $data );
    $i++ ) {
        // var_dump( ( $data[ $i ] ) );
        if ( !isset( $data[ $i ][ 'id' ] ) ) {
            $response_code = 422;
            array_push( $data_error, $data[ $i ] );

        } else {
            $subjects->id = $data[ $i ][ 'id' ];
            $query = "Delete from
						" . $subjects->table_name . "
					where
						id=:id";

            $stmt = $subjects->get_conn()->prepare( $query );
            $stmt->bindParam( ':id', $subjects->id );
            $a = $stmt->execute() ;

            if ( !$a ) {

                $response = new response( '500', [] );

                die();

            }
        }
    }

    $response = new response( $response_code,  $data_error );

}