<?php include("includes/header.php") ?>

<?php 
$user = User::get_by_id($_GET['id']);
if($user) {
    var_dump($user->delete());
    redirect('admin/users.php');
} else {
    redirect('admin/users.php');
}
?>