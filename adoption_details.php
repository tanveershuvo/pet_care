<?php include_once 'includes/head.php' ?>
<?php include_once 'includes/header.php' ?>
<?php
include_once("dbConnection/dbCon.php");
$conn = connect();
$post_id = $_GET['id'];
$sql = "SELECT * FROM adoptionPost,users,location 
WHERE adoptionpost.user_id = users.id 
AND adoptionpost.location_id = location.id 
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
    $loaction = $row['location'];
}
?>
<section>
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">Adoption Details</h2>
            <p class="text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                <?php echo $title; ?>
            </p>
        </div>
        <div class="row">
            <div class="col-sm-6 wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                <img height="450px" width="500px" src="images/uploadedImages/<?= $row['image'] ?>" alt="">
            </div>

            <div class="col-sm-6 wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                <h3 class="column-title">Post Details</h3>
                <p><b> <i class="fa fa-info-circle" aria-hidden="true"></i> </b><?php echo $description; ?></p>
                <p><b> <i class="fa fa-user" aria-hidden="true"></i> Owner Name : </b><?php echo $name; ?></p></b>
                <p><b> <i class="fa fa-envelope" aria-hidden="true"></i> Contact info: </b><?php echo $contact_info; ?></p>
                <p><b> <i class="fa fa-map-marker" aria-hidden="true"></i> Location : </b><?php echo $loaction; ?></p>


            </div>
        </div></br>
    </div>
</section>
<?php include_once 'includes/footer.php' ?>
<?php include_once 'includes/footer_script.php' ?>