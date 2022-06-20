<?php include("includes/header.php") ?>

<?php 
$comment = Comment::get_by_id($_GET['id']);
if($comment) {
    $comment->delete();
    redirect('admin/comments.php');
} else {
    redirect('admin/comments.php');
}
?>