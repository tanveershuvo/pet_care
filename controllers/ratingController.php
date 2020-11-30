<?php
session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();
if (isset($_POST['rating'])) {
    $rate = $_POST['rate'];
    $vet_id = $_POST['vet_id'];
    $transaction_id = $_POST['transaction_id'];

    $sql = "UPDATE appointment SET rating = '$rate' WHERE transaction_id = '$transaction_id'";
    $conn->query($sql);
    $data = "SELECT SUM(rating) as 'rating' , COUNT(rating) as 'total' FROM `appointment` WHERE vet_id = '$vet_id'";
    $res = $conn->query($data);
    $r = mysqli_fetch_assoc($res);
    $rating = $r['rating'] / $r['total'];
    $sqlr = "UPDATE vetdetails SET avg_rating = '$rating' WHERE user_id = '$vet_id'";
    $conn->query($sqlr);

    $_SESSION['msg'] = "Thanks for your feedback!";
    $_SESSION['type'] = "success";
    header('Location:../my-appointment');
}
