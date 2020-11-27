<?php include_once 'includes/head.php' ?>
<?php include_once 'includes/header.php' ?>
<?php
include_once("dbConnection/dbCon.php");
$conn = connect();
$post_id = $_GET['id'];
$sql = "SELECT * FROM adoptionPost,users
WHERE adoptionpost.user_id = users.id
AND adoptionpost.id = $post_id";
$result = $conn->query($sql);
foreach ($result as $key => $row) {
    $title = $row['title'];
    $description = $row['description'];
    $image = $row['image'];
    $address = $row['address'];
    $contact_info = $row['contact_info'];
    $name = $row['name'];
    $email = $row['email'];
}
?>
<section>
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">Full Details</h2>
            <!-- <p class="text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p> -->
        </div>
        <div class="row">
            <div class="col-sm-6 wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                <img class="img-responsive" src="images/uploadedImages/<?= $row['image'] ?>" alt="">
            </div>

            <div class="col-sm-6 wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                <h3 class="column-title">Post Details</h3>
                <p><b> <i class="fa fa-info-circle" aria-hidden="true"></i> About : </b><?php echo $description; ?></p>
                <p><b> <i class="fa fa-user" aria-hidden="true"></i> Owner Name : </b><?php echo $name; ?></p></b>
                <p><b> <i class="fa fa-envelope" aria-hidden="true"></i> Email Address: </b><?php echo $email; ?></p>
                <p><b> <i class="fa fa-map-marker" aria-hidden="true"></i> Address : </b><?php echo $address; ?></p>


            </div>
        </div>
    </div>
</section>
<?php include_once 'includes/footer.php' ?>
<?php include_once 'includes/footer_script.php' ?>