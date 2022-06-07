<?php 

class Session {
    private $signed_in = false;
    public $user_id;
    public $message;

    function __construct()
    {
        session_start();
        $this->check_sign_in();
        $this->check_message();
    }
    public function get_is_signed_in() {
        return $this->signed_in;
    }
    public function login($user) {
        if($user) {
            $_SESSION['signed_in'] = true;
            $this->user_id = $_SESSION['user_id'] = $user->user_id;
            $this->signed_in = $_SESSION['signed_in'] = true;

        }
    }
    private function check_sign_in() {
        if(isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = $_SESSION['signed_in'];
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }
    public function logout() {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }
    public function message($msg="") {
        if(!empty($msg)){
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
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
