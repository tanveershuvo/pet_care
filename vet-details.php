<?php include_once 'includes/head.php' ?>
<?php include_once 'includes/header.php' ?>
<?php
include_once("dbConnection/dbCon.php");
$conn = connect();
$id = $_GET['vet-id'];
$sql = "SELECT vetdetails.*,location.location FROM vetdetails,location WHERE vetdetails.location_id = location.id AND vetdetails.user_id = '$id' ";
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
$sql2 = "SELECT * FROM vet_available_days as v,weekdays as w WHERE v.week_days = w.id AND vet_id = '$id' ";
$days = $conn->query($sql2);
$sql3 = "SELECT * FROM vet_available_slot as v,slot as s WHERE v.slot_id = s.id AND vet_id = '$id' ";
$slots = $conn->query($sql3);
$sql4 = "SELECT * FROM vet_available_service as v,services as s WHERE v.service_id = s.id AND vet_id = '$id' ";
$services = $conn->query($sql4);
?>
<section>
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">Vet Bio</h2>
        </div>
        <div class="row">
            <div class="col-sm-3 wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                <img height="200px" width="220px" src="images/uploadedImages/<?php echo $pro_pic; ?>" alt="">
            </div>

            <div class="col-sm-5 wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                <h3 class="column-title">Personal Details</h3>
                <p><b> <i class="fa fa-user" aria-hidden="true"></i> Owner Name : </b><?php echo $full_name; ?></p></b>
                <p><b> <i class="fa fa-envelope" aria-hidden="true"></i> Contact info: </b><?php echo $email_address; ?></p>
                <p><b> <i class="fa fa-map-marker" aria-hidden="true"></i> Location : </b><?php echo $loaction; ?></p>
                <p><b> <i class="fa fa-money" aria-hidden="true"></i> Charge : </b><?php echo $visiting_charge; ?> (BDT)</p>
                <p><b> <i class="fa fa-money" aria-hidden="true"></i> Rating : </b><?php echo $avg_rating; ?></p>

            </div>
            <div class="col-sm-3 text-center">
                <h3 class="column-title">Appointment</h3>
                <br>
                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">Book Now</button>

            </div>
        </div></br>
        <div class="panel panel-default">
            <h3 class="panel-heading">Detail Information</h3>
            <div class="panel-body">
                <label>Available Days : <?php
                                        foreach ($days as $day) {
                                        ?><span class="badge badge-primary"><?= $day['days'] ?></span>
                    <?php
                                        }
                    ?></label>
                <hr>
                <label>Available visiting slot : <?php
                                                    foreach ($slots as $slot) {
                                                    ?><span class="badge badge-primary"><?= $slot['time'] ?></span>
                    <?php
                                                    }
                    ?></label>
                <hr>
                <label>Offered Services : <?php
                                            foreach ($services as $service) {
                                            ?><span class="badge badge-warning"><?= $service['service_name'] ?></span>
                    <?php
                                            }
                    ?></label>
                <hr>
                <label> Bio : <?= $row['short_bio'] ?></label>
                <hr>
                <label> Education : <?= $row['education'] ?></label>
                <hr>



            </div>
        </div>
    </div>
</section>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Make Appointment</h4>
            </div>
            <form id="form" action="" method="post">
                <div class="modal-body">
                    <label>You will be Charged <?php echo $visiting_charge; ?> tk</label>
                    <hr>
                    <input type="hidden" id="vet_id" value="<?= $row['user_id'] ?>">
                    <div class="form-group">
                        <label for="sel1">Select Apointment Date:</label>
                        <input type="text" class="form-control" readonly="readonly" name="date" id="datepicker">
                    </div>
                    <div class="form-group">
                        <label for="sel1">Select Time Slot:</label>
                        <select class="form-control" id="slot" name="slot">
                            <option>Select Time</option>
                            <?php foreach ($slots as $slot) { ?>
                                <option value="<?= $slot['id'] ?>"><?= $slot['time'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Pay to confirm</button>
                </div>
            </form>
        </div>

    </div>
</div>
<?php include_once 'includes/footer.php' ?>

<?php include_once 'includes/footer_script.php' ?>
<script>
    $(function() {
        var dateToday = new Date();
        $("#datepicker").datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: dateToday,
        });
    });


    $(document).ready(function() {
        $('#form').submit(function() {
            var date = $("#datepicker").val();
            var slot = $("#slot").val();
            var vet_id = $("#vet_id").val();
            $.ajax({
                url: "controllers/ajaxController.php",
                type: "post",
                data: {
                    date: date,
                    slot: slot,
                    vet_id: vet_id
                },
                success: function(response) {
                    if (response == 'available') {
                        console.log(response);
                        $('#form').submit();
                        event.preventDefault();
                    } else {

                    }

                }
            });
            event.preventDefault();

        });
    });
</script>