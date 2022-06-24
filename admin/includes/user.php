<?php

class User extends Db_object
{
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'image', 'email', 'role');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $image;
    public $email;
    public $role;
    public $upload_directory = "user_avatars";


    public static function verify_user($username, $password)
    {
        global $db;
        $username = $db->escape_string($username);
        $password = $db->escape_string($password);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
        $result_arr = self::find_by_query($sql);
        var_dump($result_arr);
        return !empty($result_arr) ? array_shift($result_arr) : false;
    }
    public function set_file($file)
    {
        if (empty($file) || !$file || !is_array($file)) {
            $this->custom_errors_arr[] = "There was no file uploaded here";
            return false;
        } elseif ($file['error'] != 0) {
            $this->custom_errors_arr[] = $this->upload_errors_arr[$file['error']];
            return false;
        } else {
            $this->image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
            return true;
        }
    }
    public function save_with_image()
    {

        if (!empty($this->errors)) {
            return false;
        }
        if (empty($this->image) || empty($this->tmp_path)) {
            $this->custom_errors_arr[] = "the file not available";
        }
        $target_path = SITE_ROOT . DS . 'admin' . DS . 'images' . DS . $this->upload_directory . DS . $this->image;

        if (file_exists($target_path)) {
            $this->custom_errors_arr[]  = "the file {$this->image} already exists";
            return false;
        }
        if (move_uploaded_file($this->tmp_path, $target_path)) {
            if ($this->id) {
                $this->update();
            } else {
                $this->create();
            }
            unset($this->tmp_path);
            return true;
        } else {
            $this->custom_errors_arr[] = "the folder does not have permossion";
            return false;
        }
    }
    private function get_image_placeholder()
    {
        return '/gallery/admin/images/user_avatars/portrait_placeholder.png';
    }
    public function image_path()
    {
        $get_image_path = '/gallery/admin/images/user_avatars/' . $this->image;
        $path_to_image = SITE_ROOT . DS . 'admin' . DS . 'images' . DS . $this->upload_directory . DS . $this->image;
        return file_exists($path_to_image) ? $get_image_path : $this->get_image_placeholder();
    }

    public function ajax_save_user_image($user_image, $user_id)
    {

        global $db;
        $this->image = $db->escape_string($user_image);
        $this->id = $db->escape_string($user_id);

        $sql = "UPDATE " . self::$db_table . " SET image = '$this->image' WHERE id = $this->id";
        return $db->query($sql) ? $this->image_path() : false;
    }
}
