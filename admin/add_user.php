<?php include("includes/admin_navigation.php"); ?>
<?php if(isset($_POST['submit'])) {
   $user = new User();
   $user->username = $_POST['username'] ;
   $user->password = $_POST['password'] ;
   $user->first_name = $_POST['first_name'] ;
   $user->last_name = $_POST['last_name'] ;
   $user->email = $_POST['email'] ;
   $user->role = $_POST['role'] ;
   $user->set_file($_FILES['user_avatar']);
   var_dump($user->save_with_image());
   var_dump($user);

    
    
}?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <input type="text" id="username" name="username" class="form-control" />
        <label class="form-label" for="username">Username</label>
    </div>
    <div class="form-outline mb-4">
        <input type="password" id="password" name="password" class="form-control" />
        <label class="form-label" for="password">Password</label>
    </div>

    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="text" id="firstname" name="first_name" class="form-control" />
                <label class="form-label" for="firstname">First name</label>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="text" id="lastname" name="last_name" class="form-control" />
                <label class="form-label" for="lastname">Last name</label>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <select class="form-select" name="role" id="">
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select>
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" name="email" id="email" class="form-control" />
        <label class="form-label" for="email">Email</label>
    </div>

    <?php if(isset($user)): ?>

        <div class="form-outline mb-4">
            <img width="100%" class="rounded-5" src="/gallery/admin/images/avatars<?= $user->image ?>" alt="avatar">
        </div>
        <?php endif; ?>
        <div class=" mb-4">
            <label class="form-label" for="file">Upload avatar</label>
            <input type="file" class="form-control " id="file" name="user_avatar" />
        </div>

    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Submit</button>
</form>



<?php include("includes/footer.php"); ?>