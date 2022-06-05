<?php 

class User {

    public $user_id;
    public $username;
    public $user_password;
    public $user_first_tname;
    public $user_last_name;

    public static function get_all_users() {
        return self::find_this_query("SELECT * FROM users");

    }
    public static function get_user_by_id($user_id) {
        return self::find_this_query("SELECT * FROM users WHERE user_id = $user_id LIMIT 1");
    }

    public static function find_this_query($sql) {
        global $db;
        $result_set = $db->query($sql)->fetch_all(MYSQLI_ASSOC);

        $obj_arr = array();
        foreach($result_set as $row) {
            $obj_arr[] = self::instatiation($row);
        }
        return $obj_arr;
    }

    public static function instatiation($user_arr) {
        $user_obj = new self;
        foreach($user_arr as $attribute => $value) {
            if($user_obj->has_the_attribute($attribute)) {
                $user_obj->$attribute = $value;
            }
        }
        return $user_obj;
    }

    private function has_the_attribute($attr) {
        $object_properties = get_object_vars($this);
        return array_key_exists($attr, $object_properties);
    }
}



?>