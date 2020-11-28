<?php session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();
$id = $_SESSION['id'];
$sql = "SELECT is_completed FROM vetdetails WHERE id = '$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
if ($row['is_completed'] = -1) {
  include_once('add-schedule.php');
} else {
  include_once('view-schedule.php');
}
