<?php
include_once("../dbConnection/dbCon.php");
$conn = connect();

if ($_POST) {
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $id  =  $_POST['id'];

    $sql = "UPDATE users SET `password`='$password' WHERE id = '$id'";
// echo $sql;exit;
    if ($conn->query($sql)) {
        $_SESSION['msg'] = "Password Update successfully";
        $_SESSION['type'] = "info";
        header('Location:profile');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:profile');
    }
}
