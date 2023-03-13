<?php
include("env/environment.php");
class database {

    protected $url = db_url;
    protected $name = db_name;
    protected $user = db_user;
    protected $pass = db_user_password;

    public function connect()
 {
        try {
            $pdo = new PDO( "mysql:=$this->url;dbname=$this->name", $this->user, $this->pass );
            return $pdo;
        } catch( PDOException $e ) {
            die( $e );
        }
    }

    public function getDb() {
        if ( $this->connect() instanceof PDO ) {
            return $this->connect();
        }
    }

}
?>