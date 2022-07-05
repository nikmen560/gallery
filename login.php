<div class="modal custom fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
            </div>

            <div class="modal-body ">
                <h2 class="tm-text-primary mb-5">Log in</h2>
                <form id="loginForm" action="" method="POST" class="tm-contact-form mx-auto">
                    <div class="form-group">
                        <input type="text" name="username" id="loginName" class="form-control rounded-0" placeholder="Name" required />
                    </div>
                    <!-- <div class="form-group">
                        <input type="email" name="email" class="form-control rounded-0" placeholder="Email" required />
                    </div> -->
                    <div class="form-group">
                        <input type="password" id="loginPassword" name="password" class="form-control rounded-0" placeholder="password" required />
                    </div>
                    <div class="form-group">
                        <p>Still don't have an account? <a href="" id="signUpButton">Sign Up</a> </p> 
                    </div>
                    <div class="form-group tm-text-right">
                        <button type="loginSubmit" id="loginSubmit" class="btn btn-primary btn-block">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

