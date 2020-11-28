<?php
include_once("../dbConnection/dbCon.php");
$conn = connect();
$id = $_SESSION['id'];
$sql = "SELECT * FROM vetdetails WHERE user_id = '$id' ";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$sql2 = "SELECT * FROM vet_available_days as v,weekdays as w WHERE v.week_days = w.id AND vet_id = '$id' ";
$days = $conn->query($sql2);
$sql3 = "SELECT * FROM vet_available_slot as v,slot as s WHERE v.slot_id = s.id AND vet_id = '$id' ";
$slots = $conn->query($sql3);
$sql4 = "SELECT * FROM vet_available_service as v,services as s WHERE v.service_id = s.id AND vet_id = '$id' ";
$services = $conn->query($sql4);

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
          <h1>Vet Schedule</h1>

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
        <div class="card-body">
          <form action="controllers/scheduleController.php" method="post">
            <div class="form-group row">
              <label for="inputName" class="col-sm-4 col-form-label">Visiting Charge : <?= $row['visiting_charge'] ?> tk</label>

            </div>
            <div class="form-group row">

              <label for="inputName2" class="col-sm-2 col-form-label">Visiting Days :
              </label>
              <h4 class="col-sm-8">
                <?php
                foreach ($days as $day) {
                ?><span class="badge badge-primary"><?= $day['days'] ?></span>
                <?php
                }
                ?>
              </h4>
            </div>
            <div class="form-group row">

              <label for="inputName2" class="col-sm-2 col-form-label">Visiting Slots :
              </label>
              <h5 class="col-sm-8">
                <?php
                foreach ($slots as $slot) {
                ?><span class="badge badge-info"><?= $slot['time'] ?></span>
                <?php
                }
                ?>
              </h5>
            </div>
            <div class="form-group row">

              <label for="inputName2" class="col-sm-2 col-form-label">Offered Services :
              </label>
              <h5 class="col-sm-8">
                <?php
                foreach ($services as $service) {
                ?><span class="badge badge-warning"><?= $service['service_name'] ?></span>
                <?php
                }
                ?>
              </h5>
            </div>


            <div class=" form-group row">
              <div class="offset-sm-2 col-sm-10">
                <a type="submit" href="add-schedule?edit" class="btn btn-info mt-4">Edit Schedule</a>
              </div>
            </div>
          </form>

        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'includes/footer.php'; ?>