<?php
include_once 'includes/head.php';
include_once 'includes/header.php';
?>
<?php
include_once 'dbConnection/dbCon.php';
$conn = connect();
?>

<section id="contact">
    <div class="container-wrapper">
        <div class="row">
            <div class="container">
                <div class="panel panel-primary col-md-6 col-md-offset-3">
                    <div class="row col-md-12">
                        <h2 class="section-title text-center fadeInDown">Vet Registration</h2>
                        <hr>
                        <?php
                        if (isset($_SESSION['msg'])) {
                        ?>
                            <div class="alert alert-<?= $_SESSION['type'] ?> ">
                                <h5><?= $_SESSION['msg'] ?></h5>
                            </div>
                        <?php };
                        unset($_SESSION['msg']); ?>
                        <form id="login-form" action="controllers/vetRegistrationController.php" method="post" role="form" enctype="multipart/form-data" style="display: block;">
                            <div class="form-group" style="margin-top: 25px;">
                                <label>Full Name :</label>
                                <input type="text" name="fullname" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group" style="margin-top: 25px;">
                                <label>BMDC registration Number :</label>
                                <input type="text" name="bmdc_reg_num" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group" style="margin-top: 25px;">
                                <label>Email :</label>
                                <input type="email" name="email" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="sel1">Select Gender:</label>
                                <select class="form-control" name="gender">
                                    <option value="">Please Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Select Location:</label>
                                <select class="form-control" name="location">
                                    <option value="">Please Select</option>
                                    <?php
                                    $sql_location = "SELECT * FROM `location`";
                                    $result_location = $conn->query($sql_location);
                                    foreach ($result_location as $key => $row) {
                                    ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['location'] ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="form-group" style="margin-top: 25px;">
                                <label>Profile Image :</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-4">
                                        <button type="submit" name="vet_register" class="btn btn-primary col-md-8">Register</button>
                                    </div>
                                </div>
                            </div>

                        </form>
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