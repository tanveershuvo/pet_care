<?php
session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();
if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $c_password = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));
    if ($password !== $c_password) {
        $_SESSION['msg'] = "Password Mismatch!";
        $_SESSION['type'] = "danger";
        header('Location:../signin.php');
    }
    $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
    if ($conn->query($sql)) {
        $_SESSION['msg'] = "Registration Successful! Sign In to Continue!";
        $_SESSION['type'] = "success";
        header('Location:../signin.php');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:../signin.php');
    }
}

if (isset($_POST['update_register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $n_password = mysqli_real_escape_string($conn, md5($_POST['new_password']));
    $c_password = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));
    $id = $_SESSION['id'];
    if ($n_password !== $c_password) {
        $_SESSION['msg'] = "Password Mismatch!";
        $_SESSION['type'] = "danger";
        header('Location:../dashboard.php');
    }
    if ($_POST['new_password'] == '') {
        $sql = "Update `users` SET `name` = '$name' WHERE id = '$id'";
    } elseif ($_POST['update_name'] == '') {
        $sql = "Update `users` SET `password`='$n_password' WHERE id = '$id'";
    } else {
        $sql = "Update `users` SET `name` = '$name', `password`='$n_password' WHERE id = '$id'";
    }
    if ($conn->query($sql)) {
        $_SESSION['msg'] = "Profile Updated succesfully";
        $_SESSION['type'] = "success";
        $_SESSION['name'] = $name;
        header('Location:../dashboard.php');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:../dashboard.php');
    }
}