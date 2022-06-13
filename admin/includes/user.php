<?php

class User
{
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'user_password', 'user_first_name', 'user_last_name');
    public $user_id;
    public $username;
    public $user_password;
    public $user_first_name;
    public $user_last_name;

    public static function get_all_users()
    {
        return self::find_this_query("SELECT * FROM users");
    }
    public static function get_user_by_id($user_id)
    {
        $result_arr = self::find_this_query("SELECT * FROM users WHERE user_id = $user_id LIMIT 1");
        return !empty($result_arr) ? array_shift($result_arr) : false;
    }

    public static function find_this_query($sql)
    {
        global $db;
        $result_set = $db->query($sql)->fetch_all(MYSQLI_ASSOC);

        $obj_arr = array();
        foreach ($result_set as $row) {
            $obj_arr[] = self::instatiation($row);
        }
        return $obj_arr;
    }

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

    public static function instatiation($user_arr)
    {
        $user_obj = new self;
        foreach ($user_arr as $attribute => $value) {
            if ($user_obj->has_the_attribute($attribute)) {
                $user_obj->$attribute = $value;
            }
        }
        return $user_obj;
    }

    private function has_the_attribute($attr)
    {
        $object_properties = get_object_vars($this);
        return array_key_exists($attr, $object_properties);
    }
    public function save()
    {
        return isset($this->user_id) ? $this->update() : $this->create();
    }

    protected function properties()
    {
        $properties = array();
        foreach (self::$db_table_fields as $db_field) {
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }

    protected function clean_properties() 
    {
        global $db;
        $clean_properties = array();
        foreach($this->properties() as $key => $value){ 
            if(!is_null($value)) {
                $clean_properties[$key] = $db->escape_string($value);
            }
        }
        return $clean_properties;
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
    public function create()
    {
        global $db;
        $properties = $this->clean_properties();
        $sql = "INSERT INTO " . self::$db_table . "(" . implode(',', array_keys($properties)) . ")" . " VALUES ('" . implode("','", array_values($properties)) . "')";
        if ($db->query($sql)) {
            $this->user_id = $db->insert_id();
            return true;
        } else {
            return false;
        }
    }
    public function update()
    {

        global $db;
        $properties = $this->clean_properties();
        var_dump($properties);
        $properties_pairs = array();
        foreach($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . self::$db_table . " SET " . implode(", ", $properties_pairs) . " WHERE user_id = $this->user_id";
        var_dump($sql);
        $db->query($sql);
        return ($db->conn->affected_rows == 1) ? true : false;
    }

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
    public function delete()
    {
        global $db;
        $sql = "DELETE FROM " . self::$db_table . " WHERE user_id = ? LIMIT 1";
        $stmt = $db->conn->prepare($sql);
        $stmt->bind_param("i", $this->user_id);
        $stmt->execute();
        return ($db->conn->affected_rows == 1) ? true : false;
    }
}
