<?php
session_start();
include_once("../../dbConnection/dbCon.php");
$conn = connect();

if ($_POST) {
    $id  =  $_POST['id'];
    $title = $_POST['title'];
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $education = $_POST['education'];
    $short_bio = $_POST['short_bio'];


    $sql = "UPDATE vetdetails SET 
    `title`='$title',`full_name`='$full_name', `address`='$address', `gender`='$gender', 
    `education`='$education',`short_bio`='$short_bio' 
    WHERE id = '$id'";
    // echo $sql;exit;
    if ($conn->query($sql)) {
        $_SESSION['msg'] = "Profile edited successfully";
        $_SESSION['type'] = "info";
        header('Location:../profile');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:../profile');
    }
}
