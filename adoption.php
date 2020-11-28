<?php include_once 'includes/head.php' ?>
<?php include_once 'includes/header.php' ?>
<?php
include_once("dbConnection/dbCon.php");
$conn = connect();
$sql = 'SELECT * FROM adoptionPost';
$result = $conn->query($sql);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 wow fadeInLeft">
                <div class="panel panel-default">
                    <div class="panel-heading">Search Section</div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
            <div class="col-sm-9 wow fadeInRight">
                <div class="panel panel-info">
                    <div class="panel-heading">All Addoption Post</div>
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach ($result as $key => $value) { ?>
                                <div class="col-sm-12 "><a href=""></a>
                                    <div class="media service-box">
                                        <div class="pull-left">
                                            <img height="60px" src="images/uploadedImages/<?= $value['image'] ?>" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?= $value['title'] ?></h4>
                                            <p>Description: <?= $value['description'] ?></p>
                                            <a class="btn btn-info btn-block btn-sm" href="adoption_details.php?id=<?= $value['id']; ?>">View all Details</a>
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