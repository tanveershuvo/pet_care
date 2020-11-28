<?php
session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();
$id = $_SESSION['id'];
$sql = "SELECT * FROM users,vetdetails where users.id = vetdetails.user_id AND users.id ='$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Vet Profile</h1>

        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="../images/uploadedImages/<?= $row['pro_pic'] ?>" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?= $row['full_name'] ?></h3>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Average Rating</b> <a class="float-right"><?= $row['avg_rating'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Total Appointments</b> <a class="float-right">20</a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">

          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Personal Details</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Update Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update Password</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">

                  <div class="card-body">
                    <?php if (isset($_SESSION['msg'])) { ?>
                      <div class="card msg bg-<?php echo $_SESSION['type']; ?> ">
                        <div class="card-body">
                          <?php echo $_SESSION['msg'];
                          unset($_SESSION['type'], $_SESSION['msg']); ?>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    <?php } ?>
                    <strong><i class="fas fa-book mr-1"></i> BMDC Registered Number</strong>

                    <p class="text-muted">
                      <?= $row['bmdc_registered_number'] ?>
                    </p>

                    <hr>

                    <strong><i class="fas fa-envelope mr-1"></i> Email Address</strong>

                    <p class="text-muted">
                      <?= $row['email'] ?>
                    </p>

                    <hr>

                    <strong><i class="fas fa-book mr-1"></i> Title</strong>

                    <p class="text-muted"><?php if (isset($row['title'])) {
                                            echo $row['title'];
                                          }  ?>
                    </p>

                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                    <p class="text-muted">
                      <?php if (isset($row['education'])) {
                        echo $row['education'];
                      }  ?>
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                    <p class="text-muted"><?php if (isset($row['address'])) {
                                            echo $row['address'];
                                          }  ?></p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Gender</strong>

                    <p class="text-muted"><?= $row['gender'] ?></p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Short Bio</strong>

                    <p class="text-muted"><?php if (isset($row['address'])) {
                                            echo $row['address'];
                                          }  ?>
                    </p>
                  </div>
                  <!-- /.post -->

                </div>

                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <form class="form-horizontal" action="controllers/updateprofileController.php" method="post">
                    <div class="form-group row">
                      <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                      <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="title" value="<?php if (isset($row['title'])) {
                                                                                                      echo $row['title'];
                                                                                                    } ?>" placeholder="Title">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="full_name" value="<?php if (isset($row['full_name'])) {
                                                                                          echo $row['full_name'];
                                                                                        } ?>" id="inputName2" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Address</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" value="<?php if (isset($row['address'])) {
                                                                                        echo $row['address'];
                                                                                      } ?>" id="inputName2" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Gender</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="gender">
                          <option value="male" <?php if (($row['gender']) === 'male') { ?>selected<?php } ?>>Male</option>
                          <option value="female" <?php if (($row['gender']) === 'female') { ?>selected<?php } ?>>Female</option>
                          <option value="other" <?php if (($row['gender']) === 'other') { ?>selected<?php } ?>>Other</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Education</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="education" placeholder="Education"><?php if (isset($row['education'])) {
                                                                                                  echo $row['education'];
                                                                                                } ?></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Short Bio</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="short_bio" placeholder="Bio"><?php if (isset($row['short_bio'])) {
                                                                                            echo $row['short_bio'];
                                                                                          } ?></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-info">Update</button>
                      </div>
                    </div>
                  </form>

                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  <form class="form-horizontal" action="controllers/updateprofileController.php" method="post">
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-4 col-form-label">Password</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" minlength="6" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputName" class="col-sm-4 col-form-label">Confirm Password</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" name="con_password" id="con_password" placeholder="Confirm Password" oninput="check(this)" required>
                      </div>
                    </div>

                    <div class="form-group row ">
                      <div class="offset-sm-3 col-sm-10">
                        <button type="submit" class="btn btn-info mt-4">Update</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script language='javascript' type='text/javascript'>
  function check(input) {
    if (input.value != document.getElementById('password').value) {
      input.setCustomValidity('Password Must be Matching.');
    } else {
      // input is valid -- reset the error message
      input.setCustomValidity('');
    }
  }
</script>
<?php include 'includes/footer.php'; ?>