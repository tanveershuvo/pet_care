<?php
include_once 'includes/head.php';
include_once 'includes/header.php';
include_once("dbConnection/dbCon.php");
$conn = connect();
$id = $_SESSION['id'];
$sql = "SELECT *, adoptionPost.id as 'a_id' FROM adoptionPost ,location WHERE adoptionpost.location_id = location.id AND user_id = '$id'";
$result = $conn->query($sql);

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
                        <a href="My Profile">
                            Adoption Post</a>
                    </h4>
                </div>
            </div>

        </div>
    </div>
    <div class="col col-md-9">
        <?php
        if (isset($_SESSION['msg'])) {
        ?>
            <div class="alert alert-<?= $_SESSION['type'] ?> ">
                <h5><?= $_SESSION['msg'] ?></h5>
            </div>
        <?php };
        unset($_SESSION['msg']); ?>
        <a href="adoption-post.php" class="btn btn-success">+ Add New Post</a>
        <hr>
        <div class="panel panel-primary col-md-12">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Location</th>
                        <th>Contact Info</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $key => $value) {
                    ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['title'] ?></td>
                            <td><img src="images/uploadedImages/<?= $value['image'] ?>" height="80px" width="100px">
                            </td>
                            <td><?= $value['location'] ?></td>
                            <td><?= $value['contact_info'] ?></td>
                            <td><?php
                                if ($value['status'] == 0) {
                                ?>
                                    <form action="controllers/adoptionController.php" method="post">
                                        <input type="hidden" name="id" value="<?= $value['a_id'] ?>">
                                        <button type="submit" name="adopted" class="btn btn-warning">Done</button>
                                    </form>
                                <?php
                                } else {
                                ?>
                                    Adopted
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($value['status'] == 0) { ?>
                                    <a href="adoption-post.php?edit=<?= $value['a_id'] ?>" class="btn btn-info">Edit</a>
                                <?php } else { ?>
                                    None
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include_once 'includes/footer.php';
include_once 'includes/footer_script.php';
?>