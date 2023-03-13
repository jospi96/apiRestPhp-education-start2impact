<?php
header ( 'Access-Control-Allow-Methods: POST' ) ;
$data = json_decode ( file_get_contents ( 'php://input' ), true ) ;

if(empty($data)){
    $response= new response("400",[]);
}else{
    for ( $i = 0; $i<count( $data );$i++ ) {
    $subjects->name=$data[$i]['name'];
    if(empty($subjects->name)){

    $response= new response("400",[ $data[ $i ]]);
    
    die( );
        }
        $query = "INSERT INTO
        " . $subjects->table_name . "
    SET
        name_materia=:name";

$stmt = $subjects->get_conn()->prepare( $query );

// binding
$stmt->bindParam( ':name', $subjects->name );


// execute query
$a = $stmt->execute() ;
if ( !$a ) {

    $response= new response("500",[]);

    die();
    }else{
        $response=new response("201",$data);


    }
}
}
?>