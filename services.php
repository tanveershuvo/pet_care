<?php
include_once 'includes/head.php';
include_once 'includes/header.php';
include_once("dbConnection/dbCon.php");
$conn = connect();
$sql = "SELECT * FROM services Order By service_name ASC ";
$results = $conn->query($sql);
?>

<section id="pricing">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Our Services</h2>
        </div>

        <div class="row">
            <?php foreach ($results as $value) { ?>
                <div class="col-md-4 menuItem">
                    <ul class="menu">
                        <li>
                            <?= $value['service_name'] ?>
                            <div class="detail"><?= $value['service_details'] ?></div>
                        </li>
                    </ul>
                </div>
            <?php } ?>

        </div>
    </div>
</section>
<!--/#pricing-->




<?php
include_once 'includes/footer.php';
include_once 'includes/footer_script.php';
?>