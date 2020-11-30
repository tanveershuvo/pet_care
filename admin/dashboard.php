<?php session_start();
include 'includes/header.php';
include_once("../dbConnection/dbCon.php");
$conn = connect();

$sql = "SELECT COUNT(id) as 'count',SUM(t.amount) as 'amount' FROM `appointment` as a , transactions as t WHERE a.transaction_id = t.transaction_id";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$vetIncome = $row['amount'];
$companyIncome = ($vetIncome * 15) / 100;

$sqlchart = "SELECT COUNT(date) as 'total_app', date FROM appointment GROUP BY date ORDER BY date ";
$resultchart = $conn->query($sqlchart);

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['appointment date', 'appointments'],
      <?php
      foreach ($resultchart as $r) {
        echo "['" . $r["date"] . "'," . $r["total_app"] . "],";
      }
      ?>
    ]);

    var options = {
      title: 'Toatl Appointment per day',
      curveType: 'function',
      legend: {
        position: 'bottom'
      }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

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
          <h1 class="m-0">Admin Dashboard</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-6">
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
        <div class="col-12 col-sm-6 col-md-6">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Company's Income</span>
              <span class="info-box-number"><?= $companyIncome ?> tk</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>

      <div class="col-md-12 mt-4">
        <div id="curve_chart" style="width: 100%; height: 300px"></div>
      </div>
      <hr>



    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'includes/footer.php'; ?>