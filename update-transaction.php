<?php
session_start();
$u_id = $_SESSION['id'];
$tran_id = $_SESSION['tran_id'];
echo $tran_id;
exit;
$v_id = $_SESSION['vet_id'];
$date = $_SESSION['date'];
$slot = $_SESSION['slot'];

$sql = "INSERT INTO `appointment` (`user_id`, `vet_id`, `date`, `slot_id`, `payment_status`,`transaction_id`) VALUES ('$u_id', '$v_id', '$date', '$slot', '$status', '$tran_id')";

$sql2 = "INSERT INTO `transactions` (`transaction_id`, `amount`, `payment_method`, `payment_date`) VALUES ('$tran_id', '$amount', '$card_type', '$tran_date')";
if ($conn->query($sql) && $conn->query($sql2)) {
    $_SESSION['msg'] = "New appointment created! Payment Successfull";
    $_SESSION['type'] = "success";
    header('Location:my-appointment');
}
