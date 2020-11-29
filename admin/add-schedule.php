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
$selectweek = [];
$selectSlot = [];
$selectService = [];
if (isset($_GET['edit'])) {
  session_start();
  $id = $_SESSION['id'];
  $sql = "SELECT * FROM vetdetails WHERE user_id = '$id' ";
  $result = $conn->query($sql);
  $vetdetails = mysqli_fetch_assoc($result);
  $esql1 = "SELECT week_days FROM `vet_available_days` WHERE vet_id = '$id'";
  $weekData = $conn->query($esql1);

  $selectweek = [];
  foreach ($weekData as $val) {
    $selectweek[] = $val['week_days'];
  }

  $esql2 = "SELECT slot_id FROM `vet_available_slot` WHERE vet_id = '$id'";

  $slotsDatas = $conn->query($esql2);

  $selectSlot = [];
  foreach ($slotsDatas as $slotsData) {
    $selectSlot[] = $slotsData['slot_id'];
  }

  $esql3 = "SELECT service_id FROM `vet_available_service` WHERE vet_id = '$id'";
  $serviceDatas = $conn->query($esql3);

  $selectService = [];
  foreach ($serviceDatas as $serviceData) {
    $selectService[] = $serviceData['service_id'];
  }
}

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
          <form action="controllers/scheduleController.php" id="schedule" method="post">
            <div class="form-group row">
              <label for="inputName" class="col-sm-4 col-form-label">Visiting Charge</label>
              <div class="col-sm-8 validate">
                <input type="text" class="form-control" name="visiting" id="visiting" value="<?php if (isset($vetdetails['visiting_charge'])) {
                                                                                                echo $vetdetails['visiting_charge'];
                                                                                              } ?>" placeholder="visiting">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName2" class="col-sm-4 col-form-label">Select days your are available</label>
              <div class="col-sm-8 validate">
                <select class="select2" id="weekdays" name="week_days[]" multiple="multiple" data-placeholder="Select days you are available" style="width: 100%;">
                  <?php foreach ($weekdays as $weekday) { ?>
                    <option value="<?= $weekday['id'] ?>" <?php if (in_array($weekday['id'], $selectweek)) { ?> selected <?php } ?>><?= $weekday['days'] ?></option>
                  <?php } ?>

                </select>
              </div>
            </div>
            <div class=" form-group row">
              <label for="inputName2" class="col-sm-4 col-form-label">Select time slot you are available in above days</label>
              <div class="col-sm-8 validate">
                <select class="select2" id="slots" name="slots[]" multiple="multiple" data-placeholder="Select time slots you are available" style="width: 100%;">
                  <?php foreach ($slots as $slot) { ?>
                    <option value="<?= $slot['id'] ?>" <?php if (in_array($slot['id'], $selectSlot)) { ?> selected <?php } ?>><?= $slot['time'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputExperience" value="<?php if (isset($row['education'])) {
                                                    echo $row['education'];
                                                  } ?>" class="col-sm-4 col-form-label">Select services you offers:</label>
              <div class="col-sm-8 validate">
                <select class="select2" id="services" name="services[]" multiple="multiple" data-placeholder="Select services you offer" style="width: 100%;">
                  <?php foreach ($services as $service) { ?>
                    <option value="<?= $service['id'] ?>" <?php if (in_array($service['id'], $selectService)) { ?> selected <?php } ?>><?= $service['service_name'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class=" form-group row">
              <div class="offset-sm-2 col-sm-10">
                <?php if (isset($_GET['edit'])) { ?>
                  <button type="submit" name="schedule_edit" class="btn btn-info mt-4">Edit Schedule</button>
                <?php } else { ?>
                  <button type="submit" name="schedule_add" class="btn btn-success mt-4">Create Schedule</button>
                <?php } ?>
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
<script type="text/javascript">
  $(document).ready(function() {

    $('#schedule').validate({
      rules: {
        visiting: {
          required: true,
        },
        weekdays: {
          required: true,
        }
      },
      messages: {
        visiting: {
          required: "Please provide visiting charge",
        },
        weekdays: {
          required: "Please select weekdays you are available",
        },

      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.validate').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>