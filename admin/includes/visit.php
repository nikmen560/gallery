<?php

class Visit extends Db_object
{
    protected static $db_table = "visits";
    protected static $db_table_fields = array('count', 'date', 'visitor_ip');
    public $id;
    public $count;
    public $date;
    public $visitor_ip;

    public function add_visit()
    {
            $this->visitor_ip = $_SERVER['REMOTE_ADDR'];
            $this->date = date('Y-m-d');
            $this->count = 1;
            $sql = "SELECT * FROM visits WHERE visitor_ip = '$this->visitor_ip' AND date = '$this->date'";
            $visit = static::find_by_query($sql);
            if(!$visit) {
                return $this->create();
            } else {
                return false;
            }
        }

}
