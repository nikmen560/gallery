<?php

class User extends Db_object
{
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'user_password', 'user_first_name', 'user_last_name');
    public $user_id;
    public $username;
    public $user_password;
    public $user_first_name;
    public $user_last_name;


    public static function verify_user($username, $password)
    {
        global $db;
        $username = $db->escape_string($username);
        $password = $db->escape_string($password);
        $sql = "SELECT * FROM users WHERE username = '$username' AND user_password = '$password' LIMIT 1";
        $result_arr = self::find_this_query($sql);
        var_dump($result_arr);
        return !empty($result_arr) ? array_shift($result_arr) : false;
    }





    // protected function prepare_sql_values()
    // {
    //     $sql_values = '';
    //     for ($i = 2; $i <= count($this->properties()); $i++) {
    //         ($i != count($this->properties())) ? $sql_values .= '?,' : $sql_values .= '?';
    //     }
    //     return $sql_values;
    // }

    // protected function get_properties_types()
    // {
    //     $obj_values =  array_values($this->properties());
    //     $types = '';
    //     for ($i = 1; $i < count($obj_values); $i++) {
    //         (intval($obj_values[$i]) > 0) ? $types .= 'i' : $types .= 's';
    //     }
    //     return $types;
    // }

    // public function create()
    // {
    //     global $db;
    //      $properties = $this->properties();
    //      $keys = array_keys($properties);
    //      unset($properties[$keys[0]]);

    //     var_dump($properties);
    //     $sql = "INSERT INTO " . self::$db_table . " (" . implode(', ', array_keys($properties)) . ") " . "VALUES (" . $this->prepare_sql_values() . ")";
    //     var_dump($sql);

    //     $parrams = [$this->username, $this->user_password, $this->user_first_name, $this->user_last_name,];
    //     if ($stmt = $db->conn->prepare($sql)) {

    //         $stmt->bind_param($this->get_properties_types(), ...$parrams);
    //         $stmt->execute();
    //         $this->user_id = $db->insert_id();
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function update()
    // {
    //     global $db;
    //     $properties = $this->properties();
    //     $properties_pairs = array();
    //     foreach($properties as $key => $value) {
    //         $properties_pairs[] = "{$key}='{$value}'";
    //     }

    //     $sql = "UPDATE " . self::$db_table . " SET username = ?, user_password = ?, user_first_name = ?, user_last_name = ? WHERE user_id = ?";

    //     $stmt = $db->conn->prepare($sql);
    //     $stmt->bind_param("ssssi", $this->username, $this->user_password, $this->user_first_name, $this->user_last_name, $this->user_id);
    //     $stmt->execute();
    //     return ($db->conn->affected_rows == 1) ? true : false;
    // }
}
