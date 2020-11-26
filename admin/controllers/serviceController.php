<?php
session_start();
include_once("../../dbConnection/dbCon.php");
$conn = connect();

///////////---->   ADD   <----///////////////////

if (isset($_POST['add'])) {
    $service_name = mysqli_real_escape_string($conn, $_POST['service_name']);
    $service_details = mysqli_real_escape_string($conn, $_POST['service_details']);

    $sql = "INSERT INTO services (`service_name`,`service_details`) VALUES ('$service_name','$service_details') ";

    if ($conn->query($sql)) {
        $_SESSION['msg'] = "Service Added successfully";
        $_SESSION['type'] = "success";
        header('Location:../service-list');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:../service-list');
    }
}

///////////---->   EDIT   <----///////////////////

if (isset($_POST['edit'])) {
    $service_name = mysqli_real_escape_string($conn, $_POST['service_name']);
    $service_details = mysqli_real_escape_string($conn, $_POST['service_details']);
    $id = mysqli_real_escape_string($conn, $_POST['service_id']);
    $sql = "UPDATE services SET `service_name`='$service_name',`service_details`='$service_details' WHERE id = '$id'";

    if ($conn->query($sql)) {
        $_SESSION['msg'] = "Service edited successfully";
        $_SESSION['type'] = "info";
        header('Location:../service-list');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:../service-list');
    }
}

///////////---->   DELETE   <----///////////////////

if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($conn, $_POST['service_id']);
    $sql = "DELETE FROM services WHERE id = '$id'";

    if ($conn->query($sql)) {
        $_SESSION['msg'] = "Service deleted successfully";
        $_SESSION['type'] = "warning";
        header('Location:../service-list');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:../service-list');
    }
}
