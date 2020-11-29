<?php include_once 'includes/head.php' ?>
<?php include_once 'includes/header.php' ?>
<?php
include_once("dbConnection/dbCon.php");
$conn = connect();
if (isset($_POST['search']) && $_POST['location'] != 0) {
    $loc = $_POST['location'];
    $sql = "SELECT adoptionpost.*,location.location FROM `adoptionpost`,location WHERE adoptionpost.location_id = location.id  AND location.id = '$loc' AND status = 0";
    $result = $conn->query($sql);
} else {
    $sql = 'SELECT adoptionpost.*,location.location FROM `adoptionpost`,location WHERE adoptionpost.location_id = location.id AND status = 0 ';
    $result = $conn->query($sql);
}

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 wow fadeInLeft">
                <div class="panel panel-default">
                    <div class="panel-heading">Search Section</div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-8">
                                    <select class="form-control" name="location" required>
                                        <option value="0"> All Location</option>
                                        <?php
                                        $sql_location = "SELECT * FROM `location`";
                                        $result_location = $conn->query($sql_location);
                                        foreach ($result_location as $key => $row) {
                                        ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['location'] ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" name="search" class="btn btn-warning"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 wow fadeInRight">
                <h2>All Adoption Posts</h2>
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach ($result as $key => $value) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-4 text-center">
                                                <img height="100px" width="130px" src="images/uploadedImages/<?= $value['image'] ?>" alt="">
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 class="media-heading"><?= $value['title'] ?></h4>
                                                <br>
                                                <p>Location: <label class="label label-default"><?= $value['location'] ?></label></p>
                                            </div>
                                            <?php if (isset($_SESSION['isLoggedIn'])) { ?>
                                                <div class="col-sm-4">
                                                    <a class="btn btn-info btn-offset-2 btn-sm-4 pull-right" href="adoption_details.php?id=<?= $value['id']; ?>">View Details</a>
                                                </div>
                                            <?php } else { ?>
                                                <div class="alert alert-danger col-sm-4" role="alert">
                                                    Login to view details
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'includes/footer.php' ?>
<?php include_once 'includes/footer_script.php' ?>