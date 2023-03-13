<?php
header ( 'Access-Control-Allow-Methods: PUT' ) ;
//header ( 'Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With' );

$data = json_decode ( file_get_contents ( 'php://input' ), true ) ;
$data_error=[];
$response_code=204;
$error="";


if(empty($data)){
    $response= new response("400",[]);
}else{

for ( $i = 0; $i<count( $data );$i++ ) {
    // var_dump( ( $data[ $i ] ) );
    $courses->name = isset($data[ $i ][ 'name' ])?
        $data[ $i ][ 'name' ]:"";
        $courses->posti_disponibili = 
        isset($data[ $i ][ 'posti_disponibili' ])?
        $data[ $i ][ 'posti_disponibili' ]: "";

        $courses->materie = isset($data[ $i ][ 'subjects' ])?
        $data[ $i ][ 'subjects' ]: "";
    $courses->id = isset($data[ $i ][ 'id' ])?$data[ $i ][ 'id' ]:"";
   

    If( empty( $courses->name ) || empty( $courses->posti_disponibili )
    || empty( $courses->materie ) || empty( $courses->id ) ) {
        array_push( $data_error,$data[ $i ]);
        $response_code=422;
       

    }else{

   /* $query = "UPDATE ".$corsi->table_name."
    SET name = '".$corsi->name."' posti_disponibili = ".$corsi->posti_disponibili."
     WHERE id=".$corsi->id;*/

     $query="UPDATE courses set courses.name=:courses_name ,
     posti_disponibili=:posti_disponibili where  id=:id";
     //EXISTS(SELECT ID FROM CORSI WHERE
     

     $stmt = $courses->get_conn()->prepare( $query );
     $stmt->bindParam( ':courses_name', $courses->name );
     $stmt->bindParam( ':posti_disponibili', $courses->posti_disponibili );
     $stmt->bindParam( ':id', $courses->id );

    $a = $stmt->execute() ;
    
    if($stmt->rowCount()==0){      
        $response_code=400;
$error= 'this records has not been modified, or does not exist';
        array_push( $data_error, $data[$i]);
    }

    if ( !$a ) {
        $data_send= empty($data_error)? $data :$data_error;
        $response = new response( $response_code, $data );

        die();

    } else {
        if(
           ! upadeMaterie( $courses->id, $courses->materie,
             $courses, $data[ $i ] )){
                $response = new response( 422, $data );
                die();
             }
    }

   
}

}
$data_send= empty($data_error)? $data :$data_error;
$response = new response( $response_code, $data_send ,$error);
}


?>