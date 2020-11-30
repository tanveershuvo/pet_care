<?php session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();
$del = "DELETE FROM appointment WHERE vet_id = 0";;
$conn->query($del);
$id = $_SESSION['id'];
$sql_tran = "SELECT * FROM appointment as a,transactions as t, vetdetails as v, slot as s,users as u WHERE a.transaction_id = t.transaction_id AND a.vet_id = v.user_id AND a.slot_id = s.id AND u.id = a.user_id AND a.vet_id = '$id'";
$result_tran = $conn->query($sql_tran);

?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vet Verification</h1>

                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.card-header -->
            <?php if (isset($_SESSION['msg'])) { ?>
                <div class="card msg bg-<?php echo $_SESSION['type']; ?> ">
                    <div class="card-body">
                        <?php echo $_SESSION['msg'];
                        unset($_SESSION['type'], $_SESSION['msg']); ?>
                    </div>
                    <!-- /.card-body -->
                </div>
            <?php } ?>



            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">My appointments</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Patient Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result_tran as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['date'] ?></td>
                                    <td><?= $value['time'] ?></td>
                                    <td><?= $value['amount'] ?> tk</td>
                                    <td>Complete</td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'includes/footer.php'; ?>