<?php 

class Photo extends Db_object
{
    protected static $db_table = "photos";
    protected static $db_table_fields = array('photo_title', 'photo_description', 'photo_filename', 'photo_type', 'photo_size');
    public $photo_id;
    public $photo_title;
    public $photo_description;
    public $photo_filename;
    public $photo_type;
    public $photo_size;

    public $tmp_path;
    public $dir = "images";

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


}

?>
