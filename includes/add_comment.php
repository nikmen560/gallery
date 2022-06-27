<?php require_once("../admin/includes/init.php") ?>

<?php
$errors = [];
$data = [];
if (isset($_POST['username'])) {
    if (empty($_POST['username'])) {
        $errors['name'] = 'Name is required.';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required.';
    }

    if (empty($_POST['body'])) {
        $errors['body'] = 'comment text is required';
    }
    if (!empty($errors)) {
        $data['success'] = false;
        $data['errors'] = $errors;
    } else {
        $author = trim($_POST['username']);
        $body = trim($_POST['body']);
        $email = trim($_POST['email']);
        $avatar = $_POST['avatar'];
        $photo_id = $_POST['photo_id'];

        $new_comment = Comment::create_comment($photo_id, $author, $body, $email, $avatar);
        $new_comment->save();
        $data['comment'] = $new_comment;
        $data['success'] = true;
        $data['message'] = 'Success!';
    }

    echo json_encode($data);
}




?>