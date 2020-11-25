<?php
include_once 'includes/head.php';
include_once 'includes/header.php';
include_once("dbConnection/dbCon.php");
$conn = connect();
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM `adoptionPost` WHERE `id`='$id'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
}
?>
    <div class="container">
        <div class="col col-md-3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="dashboard.php">
                                My Profile</a>
                        </h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="My Profile">
                                My Appointments</a>
                        </h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="adoption-post-list.php">
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
                <?php };
                unset($_SESSION['msg']); ?>
                <form action="controllers/adoptionController.php" method="post" enctype="multipart/form-data"
                      role="form" style="display: block;">
                    <input type="hidden" name="id" value="<?php if (isset($row['id'])) {
                        echo $row['id'];
                    } ?>">
                    <input type="hidden" name="image" value="<?php if (isset($row['image'])) {
                        echo $row['image'];
                    } ?>">
                    <div class="form-group" style="margin-top: 25px;">
                        <label>Title :</label>
                        <input type="text" name="title" value="<?php if (isset($row['title'])) {
                            echo $row['title'];
                        } ?>" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label>Description :</label>
                        <textarea name="description" class="form-control"
                                  placeholder="Description"><?php if (isset($row['description'])) {
                                echo $row['description'];
                            } ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image :</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Location :</label>
                        <input type="text" name="location" value="<?php if (isset($row['location'])) {
                            $row['location'];
                        } ?>" class="form-control"
                               placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Address :</label>
                        <input type="text" name="address" class="form-control"
                               value="<?php if (isset($row['address'])) {
                                   echo $row['address'];
                               } ?>" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label>Contact Info :</label>
                        <input type="text" name="contact_info" value="<?php if (isset($row['contact_info'])) {
                            echo $row['contact_info'];
                        } ?>" class="form-control" placeholder="Contact Info">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-4">
                                <?php
                                if (isset($_GET['edit'])) {
                                    ?>
                                    <button type="submit" name="adoption_edit" class="btn btn-info col-md-8">Edit
                                    </button>
                                    <?php
                                } else {
                                    ?>
                                    <button type="submit" name="adoption_add" class="btn btn-primary col-md-8">Submit
                                    </button>
                                    <?php
                                }
                                ?>
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