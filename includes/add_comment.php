<?php require_once("../admin/includes/init.php") ?>

<?php 
if(isset($_POST['username'])) {

    $author = trim($_POST['username']);
    $body = trim($_POST['body']);
    $photo_id = $_POST['photo_id'];

    $new_comment = Comment::create_comment($photo_id, $author, $body);

    if ($new_comment && $new_comment->save()) {
        echo json_encode($new_comment);
    } else {
        $session->message = "THere were some problems with saving";
    }
}




?>