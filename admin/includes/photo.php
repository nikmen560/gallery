<?php
require_once("paginate.php");

class Photo extends Db_object
{
    protected static $db_table = "photos";
    protected static $db_table_fields = array('title', 'description', 'filename', 'type', 'size', 'tags', 'date', 'views', 'download_count');
    public $id;
    public $title;
    public $alt;
    public $description;
    public $filename;
    public $type;
    public $size;
    public $tags;
    public $date;
    public $views;
    public $download_count;


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
        if ($this->delete()) {
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->picture_path();
            return unlink($target_path) ? true : false;
        } else {
            return false;
        }
    }

    public function picture_path()
    {
        return IMAGES_PATH . DS . $this->filename;
    }
    public static function ajax_get_photo_by_id($photo_id)
    {
        $photo = Photo::get_by_id($photo_id);
        $output = "<img class='w-100' src='{$photo->picture_path()}' >";
        echo $output;
    }
    public function get_similar_photos()
    {
        $tags_arr = $this->get_tags();
        $sql = "SELECT * FROM photos WHERE id <> {$this->id} AND (tags LIKE '%{$tags_arr[0]}%'";
        if (count($tags_arr) === 1) {
            $sql .= ")";
        }
        for ($i = 1; $i < count($tags_arr); $i++) {
            if ($i === count($tags_arr) - 1) {
                $sql .= " OR tags LIKE '%{$tags_arr[$i]}%')";
            } else {
                $sql .= " OR tags LIKE '%{$tags_arr[$i]}%' ";
            }
        }
        return static::find_by_query($sql);
    }

    public function get_tags()
    {
        return explode(', ', $this->tags);
    }
    public function get_picture_dimensions()
    {
        list($width, $height) = getimagesize(SITE_ROOT . DS . 'admin' . DS . $this->upl_dir . DS . "$this->filename");
        return ['width' => $width, 'height' => $height];
    }
    public static function get_paginated_photos($items_per_page, $paginate)
    {
        $sql = "SELECT * FROM photos LIMIT {$items_per_page} OFFSET {$paginate->offset()}";
        return Photo::find_by_query($sql);
    }

    public function update_views()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            global $db;
            $sql = "UPDATE photos SET views = views +1 WHERE id = {$_GET['photo']}";
            $db->query($sql);
        } else {
            return false;
        }
    }
}
