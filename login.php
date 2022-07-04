<?php

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $user_found = User::verify_user($username, $password);

    if ($user_found) {
        $session->login($user_found);
        redirect('admin/index.php');
    } else {
        $msg = "Your password or username are incorrect";
    }
}


?>
<div class="modal custom fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
            </div>

            <div class="modal-body ">
                <h2 class="tm-text-primary mb-5">Log in</h2>
                <form id="loginForm" action="" method="POST" class="tm-contact-form mx-auto">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control rounded-0" placeholder="Name" required />
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control rounded-0" placeholder="Email" required />
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="contact-select" name="inquiry">
                            <option value="-">Subject</option>
                            <option value="sales">Sales &amp; Marketing</option>
                            <option value="creative">Creative Design</option>
                            <option value="uiux">UI / UX</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Still don't have an account? </p> <a href="" id="signUpButton">Sign Up</a>
                    </div>
                    <div class="form-group tm-text-right">
                        <button type="submit" id="submitLogin" class="btn btn-primary">Login</button>
                    </div>

                </form>
                <!-- HERE GOES SEARCH RESULTS -->
            </div>
        </div>
    </div>

