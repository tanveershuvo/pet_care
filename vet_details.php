<?php include_once 'includes/head.php' ?>
<?php include_once 'includes/header.php' ?>
<?php
include_once("dbConnection/dbCon.php");
$conn = connect();
$post_id = $_GET['id'];
$sql = 'SELECT vetdetails.*,location.location FROM vetdetails,location WHERE vetdetails.location_id = location.id ';
$result = $conn->query($sql);
foreach ($result as $key => $row) {
    $bmdc_registered_number = $row['bmdc_registered_number'];
    $full_name = $row['full_name'];
    $email_address = $row['email_address'];
    $visiting_charge = $row['visiting_charge'];
    $short_bio = $row['short_bio'];
    $pro_pic = $row['pro_pic'];
    $avg_rating = $row['avg_rating'];
    $loaction = $row['location'];
}
?>
<section>
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">Vet Bio</h2>
            <p class="text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                <?php echo $short_bio; ?>
            </p>
        </div>
        <div class="row">
            <div class="col-sm-6 wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                <img height="450px" width="500px" src="images/uploadedImages/<?php echo $pro_pic; ?>" alt="">
            </div>

            <div class="col-sm-6 wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                <h3 class="column-title">Personal Details</h3>
                <p><b> <i class="fa fa-user" aria-hidden="true"></i> Owner Name : </b><?php echo $full_name; ?></p></b>
                <p><b> <i class="fa fa-envelope" aria-hidden="true"></i> Contact info: </b><?php echo $email_address; ?></p>
                <p><b> <i class="fa fa-map-marker" aria-hidden="true"></i> Location : </b><?php echo $loaction; ?></p>
                <p><b> <i class="fa fa-money" aria-hidden="true"></i> Charge : </b><?php echo $visiting_charge; ?> (BDT)</p><hr>
                <a class="btn btn-success btn-offset-2 btn-sm-4 pull-right" href="#">Book</a>


            </div>
        </div></br>
    </div>
</section>
<?php include_once 'includes/footer.php' ?>
<?php include_once 'includes/footer_script.php' ?>