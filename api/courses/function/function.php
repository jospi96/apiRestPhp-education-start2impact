<?php
function insertMaterie( $id, $materie,$corsi,$data ) {
if(is_array($materie)){


    foreach($materie as $matery){
        $query = "
        INSERT IGNORE INTO courses_subjects
					SET id_corso=:id, id_materia=:id_materia";
        $stmt = $corsi->get_conn()->prepare( $query );
        $stmt->bindParam( ':id', $id );
        $stmt->bindParam( ':id_materia', $matery );
       
        $a = $stmt->execute() ;}
       
        if(!$a){
            return false;
        }return true;


    }
    }
  


function deleteMaterie( $id, $materie,$courses,$data ) {
    
    foreach($materie as $matery){
        $query = "Delete from courses_subjects
					where id_corso=:id and id_materia=:id_materia";
        $stmt = $courses->get_conn()->prepare( $query );
        $stmt->bindParam( ':id', $id );
        $stmt->bindParam( ':id_materia', $matery );
        $a = $stmt->execute() ;
    }
    if(!$a){
        return false;
    }return true;
}
function upadeMaterie( $id, $id_materie, $corsi, $data ) {
    $query = 'select id_materia from courses_subjects where id_corso=:id';
    
   
    $stmt = $corsi->get_conn()->prepare( $query );
    $stmt->bindParam( ':id', $id );
    $stmt->execute();
        
       
    
    $data = $stmt->fetchAll();
    $temp = [];
        foreach($data as $matery){
            array_push( $temp ,$matery[ 'id_materia' ]);
    }
    
    $to_add_matery = array_diff( $id_materie, $temp );
    $to_remove_matery = array_diff( $temp, $id_materie );
    $insert=true;
    $delete=true;
if(!empty( $to_add_matery)){
    $insert= insertMaterie( $id, $to_add_matery, $corsi, $data );
}
if(!empty( $to_remove_matery)){
    $delete= deleteMaterie( $id, $to_remove_matery, $corsi, $data );
}
    if(! $insert||!$delete){
        return false;

    }return true;

}


?>