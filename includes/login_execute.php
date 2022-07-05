<?php
require_once("../admin/includes/init.php");

if (isset($_POST['loginSubmit'])) {
    $data = [];
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $user_found = User::verify_user($username, $password);

    if ($user_found) {
        $data['success'] = true;
        $data['user'] = $user_found;
        // $session->login($user_found);
    } else {
        $data['message'] = "Password or username are incorrect";
        $data['success'] = false;
    }
    echo json_encode($data);
}


?>