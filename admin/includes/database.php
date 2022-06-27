<?php
require_once("new_config.php");

class Database
{
    public $conn;
    public $db;


    function __construct()
    {
        $this->db = $this->open_db_connection();
    }
    public function open_db_connection()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_errno) {
            die("DATABASE failed " . $this->conn->error);
        }
        return $this->conn;
    }

    public function query($sql)
    {
        $result = $this->db->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    private function confirm_query($result)
    {
        if (!$result) {
            die("query not confirmed" . $this->db->error);
        }
    }

    public function escape_string($string)
    {
        return $this->db->real_escape_string($string);
    }
    public function insert_id() {
        return $this->db->insert_id;

    }
}

$db = new Database();
