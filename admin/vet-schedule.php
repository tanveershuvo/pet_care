<?php session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();
$id = $_SESSION['id'];
$sql = "SELECT is_completed FROM vetdetails WHERE user_id = '$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
// echo $row['is_completed'];
// exit;
if ($row['is_completed'] == -1) {
  include_once('add-schedule.php');
} else {
  include_once('view-schedule.php');
}
