<?php
session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();

if (isset($_POST['adoption_add'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $location = 1;
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact_info = mysqli_real_escape_string($conn, $_POST['contact_info']);
    $user_id = $_SESSION['id'];

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
        if ($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
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


    $sql = "INSERT INTO `adoptionPost`(`title`, `description`, `image`,`address`,`contact_info`,`location_id`, `user_id`) 
            VALUES ('$title','$description','$image','$address','$contact_info','$location','$user_id')";
    //echo $sql;exit;
    if ($conn->query($sql)) {
        $_SESSION['msg'] = "Adoption post created successfully";
        $_SESSION['type'] = "success";
        header('Location:../adoption-post-list.php');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:../adoption-post-list.php');
    }
}

if (isset($_POST['adoption_edit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $location = 1;
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact_info = mysqli_real_escape_string($conn, $_POST['contact_info']);
    $user_id = $_POST['id'];

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
        if ($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
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
    $sql = "UPDATE adoptionPost SET title = '$title',description = '$description',
            image = '$image',address='$address',contact_info = '$contact_info',location_id = '$location' WHERE id = '$user_id'";

    //echo $sql;exit;
    if ($conn->query($sql)) {
        $_SESSION['msg'] = "Adoption post edited successfully";
        $_SESSION['type'] = "info";
        header('Location:../adoption-post-list.php');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:../adoption-post-list.php');
    }


}

if (isset($_POST['adopted'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $sql = "UPDATE adoptionPost SET status = 1 WHERE id = '$id'";
    if ($conn->query($sql)) {
        $_SESSION['msg'] = "Adoption done successfully";
        $_SESSION['type'] = "info";
        header('Location:../adoption-post-list.php');
    } else {
        $_SESSION['msg'] = "Something went Wrong!!Try again Later!";
        $_SESSION['type'] = "danger";
        header('Location:../adoption-post-list.php');
    }

}