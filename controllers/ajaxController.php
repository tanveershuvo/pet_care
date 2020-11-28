<?php
session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();

if (isset($_POST['date'])) {
    $date = $_POST['date'];
    $slot = $_POST['slot'];
    $vet_id = $_POST['vet_id'];
    $sql = "SELECT * FROM appointment WHERE date = '$date' AND slot_id = '$slot' AND vet_id = '$vet_id'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    if ($result->num_rows > 0) {
        echo 'not_available';
    } else {
        echo 'available';
    }
}
