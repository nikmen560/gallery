<?php

class Comment extends Db_object
{
    protected static $db_table = "comments";
    protected static $db_table_fields = array('id','photo_id', 'author', 'body', 'email', 'avatar', 'date');
    public $id;
    public $photo_id;
    public $author;
    public $body;
    public $email;
    public $avatar;
    public $date;

    public static function create_comment($photo_id, $author, $body, $email, $avatar)
    {
        if(!empty($photo_id) && !empty($body)) {
            $comment = new Comment();
            $comment->photo_id = (int)$photo_id;
            $comment->author = $author;
            $comment->body = $body;
            $comment->avatar = $avatar;
            $comment->email = $email;
            $comment->date = date("Y-m-d");  
            return $comment;
        } else {
            return false;
        }
    }
    public static function get_all_comments($photo_id = 0) 
    {
        global $db;
        
        $sql = "SELECT * FROM " . self::$db_table . " WHERE photo_id =" . $db->escape_string($photo_id) . " ORDER BY photo_id ASC";
        return self::find_by_query($sql);
    }




}
