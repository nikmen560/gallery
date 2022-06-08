<?php
require_once("new_config.php");

class Database
{


    public $conn;


    function __construct()
    {
        $this->open_db_connection();
    }
    public function open_db_connection()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_errno) {
            die("DATABASE failed " . $this->conn->error);
        }
    }

    public function query($sql)
    {
        $result = $this->conn->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    private function confirm_query($result)
    {
        if (!$result) {
            die("query not confirmed" . $this->conn->error);
        }
    }

    public function escape_string($string)
    {
        return $this->conn->real_escape_string($string);
    }
    public function insert_id() {
        return $this->conn->insert_id;

    }
}

$db = new Database();
