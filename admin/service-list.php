<?php session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();
$sql = "SELECT * FROM services Order By service_name ASC ";
$results = $conn->query($sql);

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $sql = "SELECT * FROM services WHERE id = '$id' ";
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
}

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
          <h1>All Services</h1>

        </div>
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
          <h3 class="card-title">All Service Details</h3>
        </div>

        <div class="card-body">
          <table id="" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Service Name</th>
                <th>Service Details</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($results as $key => $value) {
              ?>
                <tr>

                  <td><?php $x = ($key + 1);
                      echo $x; ?></td>
                  <td><?= $value['service_name']; ?></td>
                  <td><?= $value['service_details']; ?></td>
                  <td><a href="service-list?edit=<?= $value['id']; ?>" class="btn btn-outline-info"><i class="fas fa-edit"></i> Edit</a></td>
                  <td>
                    <form action="controllers/serviceController.php" method="post">
                      <input type="hidden" name="service_id" value="<?= $value['id']; ?>">
                      <button name="delete" type="submit" onclick="return confirm('Are You sure? the data cannot be reverted. ');" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                  </td>
                </tr>
              <?php } ?>
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