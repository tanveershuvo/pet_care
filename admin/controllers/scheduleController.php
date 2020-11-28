<?php
session_start();
include_once("../../dbConnection/dbCon.php");
$conn = connect();

///////////---->   ADD-schedule   <----///////////////////

if (isset($_POST['schedule_add'])) {
    $id = $_SESSION['id'];

    $visiting = mysqli_real_escape_string($conn, $_POST['visiting']);
    $week_days =  $_POST['week_days'];
    $slots = $_POST['slots'];
    $services =  $_POST['services'];

    $sql = "UPDATE vetdetails SET visiting_charge = '$visiting' WHERE user_id = '$id'";

    foreach ($week_days as $value) {
        $sql1 = "INSERT INTO vet_available_days (`vet_id`,`week_days`) VALUES ('$id','$value')";
        // echo $sql1;
        // exit;
        $conn->query($sql1);
    }

    foreach ($slots as $slot) {
        $sql2 = "INSERT INTO vet_available_slot (`vet_id`,`slot_id`) VALUES ('$id','$slot')";
        // echo $sql1;
        // exit;
        $conn->query($sql2);
    }
    foreach ($services as $service) {
        $sql3 = "INSERT INTO vet_available_service (`vet_id`,`service_id`) VALUES ('$id','$service')";
        // echo $sql1;
        // exit;
        $conn->query($sql3);
    }
    //  exit;
    $sqlCompl = "UPDATE vetdetails SET is_completed = 1 WHERE user_id = '$id'";
    $conn->query($sqlCompl);
    if ($conn->query($sql)) {
        $_SESSION['msg'] = "Service Added successfully";
        $_SESSION['type'] = "success";
        header('Location:../vet-schedule');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:../vet-schedule');
    }
}
