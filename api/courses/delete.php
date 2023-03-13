<?php
header("Access-Control-Allow-Methods: DELETE");
//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


    $data = json_decode ( file_get_contents ( 'php://input' ), true ) ;
 
    $data_error=[];
    $response_code=204;
    if(empty($data)){
        $response= new response("400",[]);
    }else{

    for ( $i = 0; $i<count( $data );$i++ ) {
       // var_dump( ( $data[ $i ] ) );
       if(!isset( $data[ $i ][ 'id' ])){
        $response_code=422;
        array_push( $data_error,$data[ $i ]);
        
      
       }else{
        $courses->id = $data[ $i ][ 'id' ];
       

        $query = "Delete from
						" . $courses->table_name . "
					where
						id=:id";

        $stmt = $courses->get_conn()->prepare( $query );

        // binding
        $stmt->bindParam( ':id', $courses->id );



        // execute query
        $a = $stmt->execute() ;
        
       // var_dump( $ultimo_id );
        if ( !$a ) {

             //503 servizio non disponibile
        $response=new response("500",[]);
       
        die();

        }
    }
}

        $response=new response( $response_code,  $data_error);
       
    }



    


?>