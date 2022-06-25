<?php include("includes/header.php") ?>

<?php 
$photo = Photo::get_by_id($_GET['id']);
if($photo) {
    $photo->delete_photo();
    $session->message("The photo has been deleted");
    redirect('admin/photos.php');
} else {
    redirect('admin/photos.php');
}
?>