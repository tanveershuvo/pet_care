<?php
include_once 'includes/head.php';
include_once 'includes/header.php';
?>

<section id="contact">
    <div class="container-wrapper">
        <div class="row">
            <div class="container">
            <div class="panel panel-primary col-md-6 col-md-offset-3">
                        <div class="row col-md-12">
                            <h2 class="section-title text-center fadeInDown">Registration</h2>
                            <hr>
                                <form id="login-form" action="controllers/registrationController.php" method="post" role="form" style="display: block;">
                                    <div class="form-group" style="margin-top: 25px;">
                                        <label>Name :</label>
                                        <input type="text" name="name" id="username"  class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group" style="margin-top: 25px;">
                                        <label>Email :</label>
                                        <input type="email" name="email" id="username"  class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password :</label>
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password :</label>
                                        <input type="password" name="confirm_password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-4">
                                                <button type="submit" name="register" class="btn btn-primary col-md-8">Register</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <div class="form-group text-center">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <label>Already Have an account? <br><a href="signin.php">Sign in Now</a></label>
                                        </div>
                                    </div>
                                </div>
                               </div>
                        </div>
                    </div>
                </div>
            </div>
</section><!--/#bottom-->


<?php
include_once 'includes/footer.php';
include_once 'includes/footer_script.php';
?>


