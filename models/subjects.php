<?php

class subjects {
    private $conn;
    public $table_name = table_subjects_name;
    public $name;
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