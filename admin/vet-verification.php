<?php session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();
$sql = "SELECT * FROM vetDetails WHERE is_approved='-1' Order By full_name ASC ";
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
          <h3 class="card-title">Ver Verification</h3>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-striped datatable">
            <thead>
              <tr>
                <th>No.</th>
                <th>BMDC registration number</th>
                <th>Full Name</th>
                <th>Email address</th>
                <th>Gender</th>
                <th>Accept</th>
                <th>Decline</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($results as $key => $value) {
              ?>
                <tr>

                  <td><?php $x = ($key + 1);
                      echo $x; ?></td>
                  <td><?= $value['bmdc_registered_number']; ?></td>
                  <td><?= $value['full_name']; ?></td>
                  <td><?= $value['email_address']; ?></td>
                  <td><?= $value['gender']; ?></td>
                  <td>
                    <form action="controllers/verificationController.php" method="post">
                      <input type="hidden" name="id" value="<?= $value['id']; ?>">
                      <input type="hidden" name="email" value="<?= $value['email_address']; ?>">
                      <button name="accept" type="submit" class="btn btn-success">Accept</button>
                    </form>
                  </td>
                  <td>
                    <form action="controllers/verificationController.php" method="post">
                      <input type="hidden" name="id" value="<?= $value['id']; ?>">
                      <input type="hidden" name="email" value="<?= $value['email_address']; ?>">
                      <button name="decline" type="submit" class="btn btn-warning">Decline</button>
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