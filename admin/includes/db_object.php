<?php 

class Db_object 
{

    public static function get_all()
    {
        return static::find_by_query("SELECT * FROM ". static::$db_table);
    }
    public static function get_by_id($id)
    {
        $result_arr = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");
        return !empty($result_arr) ? array_shift($result_arr) : false;
    }

    public static function find_by_query($sql)
    {
        global $db;
        $result_set = $db->query($sql)->fetch_all(MYSQLI_ASSOC);

        $obj_arr = array();
        foreach ($result_set as $row) {
            $obj_arr[] = static::instatiation($row);
        }
        return $obj_arr;
    }
    public static function instatiation($arr)
    {
        $calling_class = get_called_class();
        $obj = new $calling_class;
        foreach ($arr as $attribute => $value) {
            if ($obj->has_the_attribute($attribute)) {
                $obj->$attribute = $value;
            }
        }
        return $obj;
    }

    private function has_the_attribute($attr)
    {
        $object_properties = get_object_vars($this);
        return array_key_exists($attr, $object_properties);
    }
    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }

    protected function properties()
    {
        $properties = array();
        foreach (static::$db_table_fields as $db_field) {
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
    public function create()
    {
        global $db;
        $properties = $this->clean_properties();
        $sql = "INSERT INTO " . static::$db_table . "(" . implode(',', array_keys($properties)) . ")" . " VALUES ('" . implode("','", array_values($properties)) . "')";
        if ($db->query($sql)) {
            $this->id = $db->insert_id();
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

        $sql = "UPDATE " . static::$db_table . " SET " . implode(", ", $properties_pairs) . " WHERE id = $this->id";
        var_dump($sql);
        $db->query($sql);
        return ($db->conn->affected_rows == 1) ? true : false;
    }
    public function delete()
    {
        global $db;
        $sql = "DELETE FROM " . static::$db_table . " WHERE id = ? LIMIT 1";
        $stmt = $db->conn->prepare($sql);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        return ($db->conn->affected_rows == 1) ? true : false;
    }

}
