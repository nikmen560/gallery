<?php

class Photo extends Db_object
{
    protected static $db_table = "photos";
    protected static $db_table_fields = array('title', 'description', 'filename', 'type', 'size');
    public $id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmp_path;
    public $upl_dir = "images";

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
}
