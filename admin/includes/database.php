<?php 
require_once("new_config.php");

class Database {
    private $conn;
    public function open_db_connection() {
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(mysqli_connect_errno()) {
            die("DATABASE failed " . mysqli_error($this->conn));
        }
    }
}





?>