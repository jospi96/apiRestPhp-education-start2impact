<?php
header ( 'Access-Control-Allow-Methods: GET' ) ;
$filter_query = filter();

// select all
$query = "SELECT   courses.*, 
       GROUP_CONCAT(DISTINCT subjects.name_materia SEPARATOR ',' ) AS 'Materie'
                   FROM
                   courses 
                  left JOIN courses_subjects 
                  on courses.id = courses_subjects.id_corso
                  left join subjects
                  on courses_subjects.id_materia = subjects.id".$filter_query."
                  group by courses.id" ;

$stmt = $courses->get_conn()->prepare( $query );

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

function filter() {
    $filter_query = '';

    if ( !empty( $_GET[ 'text' ] ) ) {
        $filter_text = $_GET[ 'text' ];
        switch( $_GET[ 'type' ] ) {
            case 'subjects': $filter_type = $_GET[ 'type' ].'.name_materia';
            break;
            case 'name': $filter_type = 'courses.'.$_GET[ 'type' ];
            break;
            case 'posti': $filter_type = 'courses.posti_disponibili ';
            if ( !is_numeric( $filter_text ) ) {
                $response = new response( '404', [] );
              

            }
            break;
        }

        $filter_query = ' where '.$filter_type." like '%".$filter_text."%'";
       

    }
    return $filter_query;
}

?>