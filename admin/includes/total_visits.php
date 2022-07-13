<?php

class Total_visits extends Db_object
{
    
    protected static $db_table = "total_visits";
    protected static $db_table_fields = array('date', 'total_views');
    public $id;
    public $date;
    public $total_views;

    public function get_by_date()
    {
        $result_arr = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE date = '$this->date' LIMIT 1");
        return !empty($result_arr) ? array_shift($result_arr) : false;
    }
    public static function get_all()
    {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " ORDER BY date");
    }

}
