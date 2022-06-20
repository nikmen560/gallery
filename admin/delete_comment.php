<?php include("includes/header.php") ?>

<?php 
$comment = Comment::get_by_id($_GET['id']);

if($comment) {
    $comment->delete();
    if(isset($_GET['photo'])) {
        redirect("admin/comments.php?photo={$_GET['photo']}");
    } else {
        redirect('admin/comments.php');
    }
} else {
    redirect('admin/comments.php');
}
?>