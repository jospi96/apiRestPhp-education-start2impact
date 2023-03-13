<?php
header ( 'Access-Control-Allow-Methods: POST' ) ;
$data_error=[];
$response_code=204;
$error="";


    $data = json_decode ( file_get_contents ( 'php://input' ), true ) ;
   
if(empty($data)){
    $response_code=400;
    $response= new response($response_code,[]);
    
}else{
    for ( $i = 0; $i<count( $data );$i++ ) {
       // var_dump( ( $data[ $i ] ) );
        $courses->name = isset($data[ $i ][ 'name' ])?
        $data[ $i ][ 'name' ]:"";
        $courses->posti_disponibili =isset($data[ $i ][ 'posti_disponibili' ])?
        $data[ $i ][ 'posti_disponibili' ]: "";

        $courses->materie = isset($data[ $i ][ 'subjects' ])?
        $data[ $i ][ 'subjects' ]: "";

        If( empty( $courses->name ) || empty( $courses->posti_disponibili )
        || empty( $courses->materie ) ) {
            
            $response_code="422";
            array_push($data_error,$data[ $i ]);

        }

        $query = "INSERT INTO
						" . $courses->table_name . "
					SET
						name=:name, posti_disponibili=:posti_disponibili";

        $stmt = $courses->get_conn()->prepare( $query );

        // binding
        $stmt->bindParam( ':name', $courses->name );

        $stmt->bindParam( ':posti_disponibili', $courses->posti_disponibili );

        // execute query
        $a = $stmt->execute() ;
        $ultimo_id = $courses->get_conn()->lastInsertId();
       // var_dump( $ultimo_id );
       if($stmt->rowCount()==0){      
        $response_code=400;
        $error= 'this records has not been modified, or does not exist';
        array_push( $data_error, $data[$i]);
    }
        if ( !$a ) {

        $response= new response("500",[]);
    
        die();
        }else{
            insertMaterie( $ultimo_id, $courses->materie ,$courses,$data[$i]);
             }
    }
    if(empty($data_error)){
    $response=new response($response_code,$data);
    }else{
        $response_code=422;
        $error="the following courses have not been created";
        $response=new response($response_code,$data_error,$error);
    }
   
   
}


?>