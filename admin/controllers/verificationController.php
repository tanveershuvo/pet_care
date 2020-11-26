<?php
session_start();
include_once("../../dbConnection/dbCon.php");
include_once("../mailer.php");
$conn = connect();

///////////---->   Accept   <----///////////////////

if (isset($_POST['accept'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sql = "Update vetdetails SET `is_approved` = '1' WHERE id = '$id' ";

    if ($conn->query($sql)) {
        $mail = new Mailing;
        $mail->mail($email, 'Verification Complete! Good to go!', 'accept', $id);
        $_SESSION['msg'] = "Verified successfully";
        $_SESSION['type'] = "success";
        header('Location:../vet-verification');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:../vet-verification');
    }
}

///////////---->   Decline   <----///////////////////

if (isset($_POST['decline'])) {
}

///////////---->   DELETE   <----///////////////////

if (isset($_POST['decline'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sql = "Update vetdetails SET `is_approved` = '0' WHERE id = '$id' ";

    if ($conn->query($sql)) {
        $mail = new Mailing;
        $mail->mail($email, 'Verification Complete! Good to go!', 'decline');
        $_SESSION['msg'] = "Declined successfully";
        $_SESSION['type'] = "info";
        header('Location:../vet-verification');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:../vet-verification');
    }
}
