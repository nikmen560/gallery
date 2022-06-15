<?php include("includes/header.php") ?>

<?php 
$photo = Photo::get_by_id($_GET['id']);
if($photo) {
    var_dump($photo->delete_photo());
    redirect('admin/photos.php');
} else {
    redirect('admin/photos.php');
}
?>