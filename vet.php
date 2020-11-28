<?php include_once 'includes/head.php' ?>
<?php include_once 'includes/header.php' ?>
<?php
include_once("dbConnection/dbCon.php");
$conn = connect();


if (isset($_POST['search'])) {

    if ($_POST['location'] !== 0 && $_POST['service'] == 0) {
        $loc_id = $_POST['location'];
        $sql = "SELECT vetdetails.*,location.location FROM vetdetails,location WHERE vetdetails.location_id = location.id AND vetdetails.is_completed = 1 AND location.id = '$loc_id'";
    } elseif ($_POST['location'] == 0 && $_POST['service'] !== 0) {
        $service_id = $_POST['service'];
        $sql = "SELECT vetdetails.*,location.location FROM vetdetails,location,vet_available_service,services WHERE vetdetails.location_id = location.id AND vetdetails.user_id = vet_available_service.vet_id AND vet_available_service.service_id = services.id AND vetdetails.is_completed = 1 AND services.id = '$service_id'";
    } elseif ($_POST['location'] !== 0 && $_POST['service'] !== 0) {
        $loc_id = $_POST['location'];
        $service_id = $_POST['service'];
        $sql = "SELECT vetdetails.*,location.location FROM vetdetails,location,vet_available_service,services WHERE vetdetails.location_id = location.id AND vetdetails.user_id = vet_available_service.vet_id AND vet_available_service.service_id = services.id AND vetdetails.is_completed = 1 AND services.id = '$service_id' AND location.id = '$loc_id'";
    }
    $result = $conn->query($sql);
} else {
    $sql = 'SELECT vetdetails.*,location.location FROM vetdetails,location WHERE vetdetails.location_id = location.id AND vetdetails.is_completed = 1';
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
                            <div class="form-group">
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
                            <div class="form-group">
                                <select class="form-control" name="service">
                                    <option value="0"> All Services</option>
                                    <?php
                                    $sql_services = "SELECT * FROM `services`";
                                    $result_services = $conn->query($sql_services);
                                    foreach ($result_services as $key => $row) {
                                    ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['service_name'] ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div clas="form-group">
                                <button type="submit" name="search" class="btn btn-warning col-sm-offset-3"><i class="fa fa-search"></i>Search Vets</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 wow fadeInRight">
                <h2>Search Vets</h2>
                <div class="panel">
                    <div class="panel-body">
                        <?php if ($result->num_rows > 0) { ?>
                            <div class="row">
                                <?php foreach ($result as $key => $value) {
                                    $id = $value['user_id'];
                                    $serviceSQL = "SELECT * FROM vet_available_service as v, services as s WHERE v.service_id = s.id AND v.vet_id = '$id'";
                                    $datas = $conn->query($serviceSQL);
                                ?>
                                    <a style="color:black;" href="vet-details?vet-id=<?= $value['user_id'] ?>">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-3 text-center">
                                                        <img height="120px" width="130px" src="images/uploadedImages/<?= $value['pro_pic'] ?>" alt="">
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <h3 class="media-heading"><?= $value['full_name'] ?></h3>
                                                        <h4 class="text-mute"><?= $value['title'] ?></h4>
                                                        <h5>Rating : <?= $value['avg_rating'] ?></h5>
                                                        <p>Location: <label class="label label-default"><?= $value['location'] ?></label></p>
                                                    </div>

                                                    <div class="col-sm-5">
                                                        <div class="well">
                                                            <h5>Visiting Charge <?= $value['visiting_charge'] ?> tk</h5>

                                                            <label>Services :</label>
                                                            <?php foreach ($datas as $data) { ?>
                                                                <label class="label label-primary"><?= $data['service_name'] ?></label>
                                                            <?php } ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        <?php } else { ?>
                            <div class="well">No result Found</div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'includes/footer.php' ?>
<?php include_once 'includes/footer_script.php' ?>