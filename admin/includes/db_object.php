<?php

class Db_object
{
    public $custom_errors_arr = array();

    public $upload_errors_arr = array(
        UPLOAD_ERR_OK => "THERE IS NO ERR",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload max_filesize",
        UPLOAD_ERR_FORM_SIZE => "The upl file exceed the max_file_size",
        UPLOAD_ERR_PARTIAL => "the upl file was only partially uploaded",
        UPLOAD_ERR_NO_FILE => "no file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Miss a temp folder",
        UPLOAD_ERR_CANT_WRITE => "failed to write file to disk",
        UPLOAD_ERR_EXTENSION => "a php ext stoped the file upload"
    );

    public function set_file($file)
    {
        if (empty($file) || !$file || !is_array($file)) {
            $this->custom_errors_arr[] = "There was no file uploaded here";
            return false;
        } elseif ($file['error'] != 0) {
            $this->custom_errors_arr[] = $this->upload_errors_arr[$file['error']];
            return false;
        } else {
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
            return true;
        }
    }

    public static function get_all()
    {
        return static::find_by_query("SELECT * FROM " . static::$db_table);
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
        foreach ($this->properties() as $key => $value) {
            if (!is_null($value)) {
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
        foreach ($properties as $key => $value) {
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
    public static function count_all()
    {
        global $db;

        $sql = "SELECT COUNT(*) FROM " . static::$db_table;
        $result_set = $db->query($sql)->fetch_all(MYSQLI_NUM);
        return array_shift($result_set[0]);
    }
}
