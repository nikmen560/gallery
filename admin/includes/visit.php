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
        global $db;
        $this->visitor_ip = $_SERVER['REMOTE_ADDR'];
        $this->date = date('Y-m-d');
        $this->count = 1;
        $sql = "SELECT * FROM visits WHERE visitor_ip = '$this->visitor_ip' AND date = '$this->date'";
        $visit = static::find_by_query($sql);
        if (!$visit) { // create a visit by ip
            $this->create();
            $visit_date = new Total_visits();
            $visit_date->date = $this->date;
            $visit_date = $visit_date->get_by_date(); //find a visit in total visits table
            if (!$visit_date) { 
                $total_visits = new Total_visits();
                $total_visits->date = $this->date;
                $total_visits->create();
                return true;
            } else {
                $visit_date->total_views += 1;
                $visit_date->update();
                return true;
            }
        } else {
            return false;
        }
    }
    public static function get_all()
    {
        return Total_visits::get_all();
    }
}
