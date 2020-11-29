<?php
session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();
if (isset($_POST['vet_register'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $bmdc_reg_num = mysqli_real_escape_string($conn, $_POST['bmdc_reg_num']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);

    $image = 0;
    if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != '') {
        $target_dir = "../images/uploadedImages/";
        $image = date('YmdHis_');
        $image .= basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        if ($_FILES["image"]["size"] > 5000000) {
            $uploadOk = 0;
        }
        if (
            $imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            $okFlag = FALSE;
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            } else {
                $okFlag = FALSE;
            }
        }
    } else {
        $image = $_POST['image'];
    }

    $sql = "SELECT * FROM vetDetails WHERE bmdc_registered_number = '$bmdc_reg_num' OR email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['msg'] = "This registration number or email is already in use!!";
        $_SESSION['type'] = "danger";
        header('Location:../vet-registration');
    } else {
        $sql = "INSERT INTO `vetDetails`(`full_name`,`bmdc_registered_number`, `email_address`, `gender`,`pro_pic`,`location_id`) 
                VALUES ('$fullname','$bmdc_reg_num','$email','$gender','$image','$location')";

        if ($conn->query($sql)) {
            $_SESSION['msg'] = "You will receive a mail after admin approval!!";
            $_SESSION['type'] = "success";
            header('Location:../vet-registration');
        } else {
            $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
            $_SESSION['type'] = "danger";
            header('Location:../vet-registration');
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
        header('Location:../dashboard');
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
        header('Location:../dashboard');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:../dashboard');
    }
}
