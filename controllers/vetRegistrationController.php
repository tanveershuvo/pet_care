<?php
session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();
if (isset($_POST['vet_register'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $bmdc_reg_num = mysqli_real_escape_string($conn, $_POST['bmdc_reg_num']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $sql = "SELECT * FROM vetDetails WHERE bmdc_registered_number = '$bmdc_reg_num'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['msg'] = "This registration number is already in use!!";
        $_SESSION['type'] = "danger";
        header('Location:../vet-registration.php');
    } else {
        $sql = "INSERT INTO `vetDetails`(`full_name`,`bmdc_registered_number`, `email_address`, `gender`) 
                VALUES ('$fullname','$bmdc_reg_num','$email','$gender')";

        if ($conn->query($sql)) {
            $_SESSION['msg'] = "You will receive a mail after admin approval!!";
            $_SESSION['type'] = "success";
            header('Location:../vet-registration.php');
        } else {
            $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
            $_SESSION['type'] = "danger";
            header('Location:../vet-registration.php');
        }
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
