<?php session_start(); ?>
<?php include 'includes/header.php'; ?>
<?php
include_once("../dbConnection/dbCon.php");
$conn = connect();
$id = $_SESSION['id'];
$sql = "SELECT COUNT(id) as 'count',SUM(t.amount) as 'amount' FROM `appointment` as a , transactions as t WHERE a.transaction_id = t.transaction_id AND vet_id = '$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$vetIncome = $row['amount'];
$companyIncome = ($vetIncome * 15) / 100;

$sqlchart = "SELECT COUNT(date) as 'total_app', date FROM appointment WHERE vet_id = '$id' GROUP BY date ORDER BY date ";
$resultChart = $conn->query($sqlchart);

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Date', 'Appointment'],
      <?php
      foreach ($resultChart as $r) {
        echo "['" . $r["date"] . "'," . $r["total_app"] . "],";
      }
      ?>
    ]);

    var options = {
      title: 'Appointment Per Day',
      hAxis: {
        title: 'Date',
        titleTextStyle: {
          color: '#333'
        }
      },
      vAxis: {
        minValue: 0
      }
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Vet Dashboard</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Appointments</span>
              <span class="info-box-number">
                <?= $row['count'] ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Your Income</span>
              <span class="info-box-number"> <?= $row['amount'] ?> tk</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Company Share</span>
              <span class="info-box-number"><?= $companyIncome ?> tk</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <div class="col-md-12 mt-4">
        <div id="chart_div" style="width: 100%; height: 300px;"></div>
      </div>
      <hr>



    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'includes/footer.php'; ?>