<?php include_once 'includes/head.php' ?>
<?php include_once 'includes/header.php' ?>
<?php
include_once("dbConnection/dbCon.php");
$conn = connect();
$sql = 'SELECT vetdetails.*,location.location FROM vetdetails,location WHERE vetdetails.location_id = location.id ';
$result = $conn->query($sql);
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
                                    <select class="form-control" name="location">
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
                <h2>All Vets</h2>
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach ($result as $key => $value) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-4 text-center">
                                                <img height="100px" width="130px" src="images/uploadedImages/<?= $value['pro_pic'] ?>" alt="">
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 class="media-heading"><?= $value['full_name'] ?></h4>
                                                <strong>Raiting : <?= $value['avg_rating'] ?></strong>
                                                <br>
                                                <p>Location: <label class="label label-default"><?= $value['location'] ?></label></p>
                                            </div>
                                            <div class="col-sm-4">
                                                <a class="btn btn-info btn-offset-2 btn-sm-4 pull-right" href="vet_details.php?id=<?= $value['id']; ?>">View Details</a>
                                            </div>
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