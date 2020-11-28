<?php
include_once("../dbConnection/dbCon.php");
$conn = connect();
$sql = "SELECT * FROM services Order By service_name ASC ";
$results = $conn->query($sql);
$sql1 = "SELECT * FROM `weekdays`";
$weekdays = $conn->query($sql1);

$sql2 = "SELECT * FROM `slot`";
$slots = $conn->query($sql2);

$sql3 = "SELECT * FROM `services`";
$services = $conn->query($sql3);

?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Your Schedule</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-body">
          <form action="controllers/scheduleController.php" method="post">
            <div class="form-group row">
              <label for="inputName" class="col-sm-4 col-form-label">Visiting Charge</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="visiting" value="<?php if (isset($row['title'])) {
                                                                                  echo $row['title'];
                                                                                } ?>" placeholder="visiting">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName2" class="col-sm-4 col-form-label">Select days your are available</label>
              <div class="col-sm-8">
                <select class="select2" name="week_days[]" multiple="multiple" data-placeholder="Select days you are available" style="width: 100%;">
                  <?php foreach ($weekdays as $weekday) { ?>
                    <option value="<?= $weekday['id'] ?>"><?= $weekday['days'] ?></option>
                  <?php } ?>

                </select>
              </div>
            </div>
            <div class=" form-group row">
              <label for="inputName2" class="col-sm-4 col-form-label">Select time slot you are available in above days</label>
              <div class="col-sm-8 ">
                <select class="select2" name="slots[]" multiple="multiple" data-placeholder="Select time slots you are available" style="width: 100%;">
                  <?php foreach ($slots as $slot) { ?>
                    <option value="<?= $slot['id'] ?>"><?= $slot['time'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputExperience" value="<?php if (isset($row['education'])) {
                                                    echo $row['education'];
                                                  } ?>" class="col-sm-4 col-form-label">Select services you offers:</label>
              <div class="col-sm-8">
                <select class="select2" name="services[]" multiple="multiple" data-placeholder="Select services you offer" style="width: 100%;">
                  <?php foreach ($services as $service) { ?>
                    <option value="<?= $service['id'] ?>"><?= $service['service_name'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class=" form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" name="schedule_add" class="btn btn-info mt-4">Create Schedule</button>
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