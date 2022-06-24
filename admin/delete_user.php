<?php include("includes/header.php") ?>

<?php 
$user = User::get_by_id($_GET['id']);
if($user) {
   $user->delete();
   $session->message("The user has been deleted");
    redirect('admin/users.php');
} else {
   $session->message("The user has not been deleted");
    redirect('admin/users.php');
}
?>