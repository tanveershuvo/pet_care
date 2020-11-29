<?php
include_once 'includes/head.php';
include_once 'includes/header.php';
?>

<section id="contact">
    <div class="container-wrapper">
        <div class="row">
            <div class="container">
                <div class="panel panel-primary col-md-6 col-md-offset-3" style="margin-bottom: 40px;">
                    <div class="row col-md-12">
                        <h2 class="section-title text-center fadeInDown">Sign In</h2>
                        <hr>
                        <?php
                        if (isset($_SESSION['msg'])) {
                        ?>
                            <div class="alert alert-<?= $_SESSION['type'] ?> ">
                                <h5><?= $_SESSION['msg'] ?></h5>
                            </div>
                        <?php };
                        unset($_SESSION['msg']); ?>
                        <form id="login-form" action="controllers/signinController.php" method="post" role="form" style="display: block;">
                            <div class="form-group" style="margin-top: 25px;">
                                <label>Email :</label>
                                <input type="email" name="email" id="username" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Password :</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-4">
                                        <button type="submit" name="signin" class="btn btn-primary col-md-8">Sign In
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div class="form-group text-center">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <label>Don't Have an account? <br><a href="registration.php">Register
                                            Now</a></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#bottom-->
<?php
include_once 'includes/footer.php';
include_once 'includes/footer_script.php';
?>