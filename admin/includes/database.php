<?php 
require_once("new_config.php");

class Database {


    public $conn;

    function __construct()
    {
        $this->open_db_connection();
    }
    public function open_db_connection() {
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(mysqli_connect_errno()) {
            die("DATABASE failed " . mysqli_error($this->conn));
        }
    }

    public function query($sql) {
        $result = mysqli_query($this->conn, $sql);
        if(!$result) {
            die("Query failed");
        }
        return $result;
    }
}

$db = new Database();



?>