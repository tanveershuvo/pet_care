<?php
include_once("../dbConnection/dbCon.php");
$conn = connect();
$sql = "SELECT * FROM services Order By service_name ASC ";
$results = $conn->query($sql);

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
          <form class="form-horizontal">
            <div class="form-group row">
              <label for="inputName" class="col-sm-4 col-form-label">Visiting Charge</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" id="inputName" value="<?php if (isset($row['title'])) {
                                                                                  echo $row['title'];
                                                                                } ?>" placeholder="Title">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName2" class="col-sm-4 col-form-label">Select days your are available</label>
              <div class="col-sm-8">
                <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                  <option>Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName2" class="col-sm-4 col-form-label">Select time slot you are available in above days</label>
              <div class="col-sm-8 ">
                <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                  <option>Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputExperience" value="<?php if (isset($row['education'])) {
                                                    echo $row['education'];
                                                  } ?>" class="col-sm-4 col-form-label">Select services you offers:</label>
              <div class="col-sm-8">
                <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                  <option>Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="offset-md-4 col-md-10">
                <button type="submit" class="btn btn-info mt-4">Create Schedule</button>
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