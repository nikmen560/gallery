<?php include("includes/admin_navigation.php"); ?>
<?php require_once("includes/photo_library_modal.php"); ?>
<?php if (empty($_GET['id'])) {
    redirect("admin/users.php");
} else {
    $user = User::get_by_id($_GET['id']);
} ?>
<?php if (isset($_POST['submit'])) {

    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->email = $_POST['email'];
    $user->role = $_POST['role'];
    $user->username = $_POST['username'];
    if (!empty($_POST['password'])) {
        $user->password = $_POST['password'];
    }
    if (empty($_FILES['user_avatar'])) {
        $user->update();
    } else {
        $user->set_file($_FILES['user_avatar']);
        $user->save_with_image();
    }
    redirect("admin/edit_user.php?id=$user->id");
}
?>
<div class="container">


<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <input type="text" id="username" name="username" class="form-control" value="<?= $user->username; ?>" />
        <label class="form-label" for="username">Username</label>
    </div>
    <div class="form-outline mb-4">
        <input type="password" id="password" name="password" class="form-control" />
        <label class="form-label" for="password">Password</label>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="text" id="firstname" name="first_name" class="form-control" value="<?= $user->first_name; ?>" />
                <label class="form-label" for="firstname">First name</label>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="text" id="lastname" name="last_name" class="form-control" value="<?= $user->last_name; ?>" />
                <label class="form-label" for="lastname">Last name</label>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <select class="form-select" name="role" id="">
            <?php if ($user->role == 'admin') :  ?>
                <option selected value="admin">admin</option>
                <option value="user">user</option>
            <?php else : ?>
                <option selected value="user">user</option>
                <option value="admin">admin</option>
            <?php endif; ?>
        </select>
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" name="email" id="email" class="form-control" value="<?= $user->email ?>" />
        <label class="form-label" for="email">Email</label>
    </div>

    <?php if (isset($user)) : ?>
        <div class="form-outline mb-4 user_image_box">
            <a href="#" data-mdb-toggle="modal" data-mdb-target="#photoModal"><img width="100%" class="rounded-5" src="<?= $user->image_path() ?>" alt="avatar"></a>
        </div>
    <?php endif; ?>
    <div class=" mb-4">
        <label class="form-label" for="file">Upload avatar</label>
        <input type="file" class="form-control " id="file" name="user_avatar" />
    </div>
    <p id="user_id" class="d-none"><?= $user->id ?></p>

    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Submit</button>
        <a href="/gallery/admin/delete_user.php?id=<?= $user->id; ?>" class="btn btn-danger btn-block mb-4">
            Delete
        </a>
</form>
</div>



<?php include("includes/footer.php"); ?>