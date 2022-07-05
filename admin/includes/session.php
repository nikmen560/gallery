<?php 

class Session {
    private $signed_in = false;
    public $id;
    public $message;
    public $count;

    function __construct()
    {
        session_start();
        $this->check_sign_in();
        $this->count_visitors();
        $this->check_message();
    }
    public function message($msg="")
    {
        if(!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    public function count_visitors()
    {
        if(isset($_SESSION['count'])) {
            return $this->count = $_SESSION['count']++;
        } else {
            return $_SESSION['count'] = 1;
        }
    }
    public function get_is_signed_in() {
        return $this->signed_in;
    }
    public function login($user) {
        if($user) {
            $_SESSION['signed_in'] = true;
            $this->id = $_SESSION['id'] = $user->id;
            $this->signed_in = $_SESSION['signed_in'] = true;
            return true;

        } else {
            return false;
        }
        
    }
    private function check_sign_in() {
        if(isset($_SESSION['id'])) {
            $this->id = $_SESSION['id'];
            $this->signed_in = $_SESSION['signed_in'];
        } else {
            unset($this->id);
            $this->signed_in = false;
        }
    }
    public function logout() {
        unset($_SESSION['id']);
        unset($this->id);
        $this->signed_in = false;
    }
    public function check_message() {
        if(isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }

}

$session = new Session();
