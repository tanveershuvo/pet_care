<?php
include_once 'includes/head.php';
include_once 'includes/header.php';
?>
<div class="container">
    <div class="col col-md-3">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a  href="dashboard.php">
                            My Profile</a>
                    </h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a  href="My Profile">
                            My Appointments</a>
                    </h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a  href="adoption-post-list.php">
                            Adoption Post</a>
                    </h4>
                </div>
            </div>

        </div>
    </div>
    <div class="col col-md-9">
        <div class="panel panel-primary col-md-12">
            <?php
                        if (isset($_SESSION['msg'])) {
                            ?>
                            <div class="alert alert-<?= $_SESSION['type'] ?> ">
                                <h5><?= $_SESSION['msg'] ?></h5>
                            </div>
                        <?php };unset($_SESSION['msg']);?>
        <form action="controllers/registrationController.php" method="post" role="form" style="display: block;">

            <div class="form-group" style="margin-top: 25px;">
                <label>Name :</label>
                <input type="text" name="update_name" value="<?=$_SESSION['name']?>" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <label>New Password :</label>
                <input type="password" name="new_password" id="password"  class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label>Confirm Password :</label>
                <input type="password" name="confirm_password" id="password"  class="form-control" placeholder="Confirm Password">
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-4">
                        <button type="submit" name="update_register" class="btn btn-primary col-md-8">Update Password</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<?php
include_once 'includes/footer.php';
include_once 'includes/footer_script.php';
?>