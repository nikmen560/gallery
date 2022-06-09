<?php

class User
{

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
    public function create() 
    {
        global $db;
        $sql = "INSERT INTO users (username, user_password, user_first_name, user_last_name) VALUES(?, ?, ?, ?)";
        if($stmt = $db->conn->prepare($sql)) {
            $stmt->bind_param("ssss", $this->username, $this->user_password, $this->user_first_name, $this->user_last_name);
            $stmt->execute();
            $this->user_id = $db->insert_id();
            return true;
        } else {
            return false;
        }

    }

    public function update()
    {
        global $db;
        $sql = "UPDATE users SET username = ?, user_password = ?, user_first_name = ?, user_last_name = ? WHERE user_id = ?";
        
        $stmt = $db->conn->prepare($sql);
            $stmt->bind_param("ssssi", $this->username, $this->user_password, $this->user_first_name, $this->user_last_name, $this->user_id);
            $stmt->execute();
            $this->user_id = $db->insert_id();
            return ($db->conn->affected_rows == 1) ? true: false;

    }
}
