<?php session_start();
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
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-body">
          <form action="controllers/serviceController.php" method="post">
            <div class="row">

              <div class="form-group col-6">
                <label for="">Service Name</label>
                <input type="hidden" name="service_id" value="<?php if (isset($row)) {
                                                                echo $row['id'];
                                                              }  ?>">
                <input type="text" class="form-control" name="service_name" placeholder="Enter service name" value="<?php if (isset($row)) {
                                                                                                                      echo $row['service_name'];
                                                                                                                    }  ?>">
                <?php if (isset($_GET['edit'])) { ?>
                  <button type="submit" name="edit" class="btn btn-info mt-4">Edit service</button>
                  <a type="button" href="service-list" class="btn btn-danger mt-4">Cancel</a>
                <?php } else { ?>
                  <button type="submit" name="add" class="btn btn-success mt-4">Add service</button>
                <?php } ?>
              </div>
              <div class="form-group col-6">
                <label for="">Service details</label>
                <textarea class="form-control" name="service_details" placeholder="Enter service details"><?php if (isset($row)) {
                                                                                                            echo $row['service_details'];
                                                                                                          }  ?></textarea>
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