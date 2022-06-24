<?php 
require_once("init.php");

$user = new User();

if(isset($_POST['image_name'])) {
    echo $user->ajax_save_user_image($_POST['image_name'], $_POST['user_id']);
}
if(isset($_POST['photo_id'])){
    Photo::ajax_get_photo_by_id($_POST['photo_id']);
}


?>