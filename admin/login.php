<?php require_once("includes/header.php"); ?>
<?php require_once("includes/admin_navigation.php"); ?>
<?php 
if($session->get_is_signed_in()) {
    redirect('admin/index.php');
}
?>
<?php 

if(isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
$user_found = User::verify_user($username, $password);

    if($user_found) {
        $session->login($user_found);
        redirect('admin/index.php');
    } else {
        $msg = "Your password or username are incorrect";
    }

} 


        ?>



<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php if(isset($msg)) echo $msg ?></h4>
	
<form id="login-id" action="" method="post">
	
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="<?php if(isset($username)) echo htmlentities($username); ?>" >

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" value="<?php if(isset($password)) echo htmlentities($password); ?>">
	
</div>


<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>


</form>


</div>

            </div>
        </div>

  <?php include("includes/footer.php"); ?>