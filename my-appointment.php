<?php
include_once 'includes/head.php';
include_once 'includes/header.php';
include_once("dbConnection/dbCon.php");
$conn = connect();
$id = $_SESSION['id'];
$sql = "SELECT *, adoptionPost.id as 'a_id' FROM adoptionPost ,location WHERE adoptionpost.location_id = location.id AND user_id = '$id'";
$result = $conn->query($sql);

$sql_tran = "SELECT * FROM appointment as a,transactions as t, vetdetails as v, slot as s WHERE a.transaction_id = t.transaction_id AND a.vet_id = v.user_id AND a.slot_id = s.id AND a.user_id = '$id'";
$result_tran = $conn->query($sql_tran);
?>
<div class="container-fluid">
    <div class="col col-md-2">
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
                        <a href="my-appointment">
                            My Appointments</a>
                    </h4>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="adoption-post-list">
                            Adoption Post</a>
                    </h4>
                </div>
            </div>

        </div>
    </div>
    <div class="col col-md-10">
        <?php
        if (isset($_SESSION['msg'])) {
        ?>
            <div class="alert alert-<?= $_SESSION['type'] ?> ">
                <h5><?= $_SESSION['msg'] ?></h5>
            </div>
        <?php };
        unset($_SESSION['msg']); ?>

        <hr>
        <div class="panel panel-primary col-md-12">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Transaction No</th>
                        <th>Vet Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Amount</th>
                        <th>Payment Status</th>
                        <th>Payment Method</th>
                        <th>Payment Date</th>
                        <th>Prescription</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result_tran as $key => $value) {
                    ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['transaction_id'] ?></td>
                            <td><?= $value['full_name'] ?></td>
                            <td><?= $value['date'] ?></td>
                            <td><?= $value['time'] ?></td>
                            <td><?= $value['amount'] ?> tk</td>
                            <td><?= $value['payment_status'] ?></td>
                            <td><?= $value['payment_method'] ?></td>
                            <td><?= $value['payment_date'] ?></td>
                            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                    Feedback
                                </button></td>
                            <td>Complete</td>




                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Feedback Modal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="sel1">Give Feedback rating:</label>
                                            <select class="form-control" id="sel1">
                                                <option>very poor</option>
                                                <option>poor</option>
                                                <option>normal</option>
                                                <option>good</option>
                                                <option>very good</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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