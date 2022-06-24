<?php

class Photo extends Db_object
{
    protected static $db_table = "photos";
    protected static $db_table_fields = array('title', 'description', 'filename', 'type', 'size');
    public $id;
    public $title;
    public $alt;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmp_path;
    public $upl_dir = "images";


    public function save()
    {
        if ($this->id) {
            $this->update();
        } else {
            if (!empty($this->errors)) {
                return false;
            }
            if (empty($this->filename) || empty($this->tmp_path)) {
                $this->custom_errors_arr[] = "the file not available";
            }
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upl_dir . DS . $this->filename;

            if (file_exists($target_path)) {
                $this->custom_errors_arr[]  = "the file {$this->filename} already exists";
                return false;
            }
            if (move_uploaded_file($this->tmp_path, $target_path)) {
                if ($this->create()) {
                    unset($this->tmp_path);
                    return true;
                }
            } else {
                $this->custom_errors_arr[] = "the folder does not have permossion";
                return false;
            }
        }
    }

    public function delete_photo()
    {
        if($this->delete()) {
            $target_path = SITE_ROOT.DS . 'admin' . DS . $this->picture_path();
            return unlink($target_path) ? true : false;
        } else {
            return false;
        }
    }

    public function picture_path()
    {
        return $this->upl_dir.DS.$this->filename;
    }
    public static function ajax_get_photo_by_id($photo_id)
    {
        $photo = Photo::get_by_id($photo_id);
        $output = "<img class='w-100' src='{$photo->picture_path()}' >";
        echo $output;
    }
}
