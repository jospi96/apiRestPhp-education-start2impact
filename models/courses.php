<?php

class courses {
    private $conn;
    public $table_name = table_course_name;
    public $name;
    public $posti_disponibili;
    public $materie;
    public $id;

    public function __construct( $db )
 {
        $this->conn = $db;
    }
    public function get_conn(){
        return $this->conn;
    }

   
   
}

?>