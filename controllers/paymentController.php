<?php
ini_set('session.gc_maxlifetime', 57600);
ini_set('session.cookie_lifetime', 57600);
ini_set('session.cache_expire', 57600);
session_start();

$_SESSION['vet_id'] = $_POST['vet_id'];
$_SESSION['date'] = $_POST['date'];
$_SESSION['slot'] = $_POST['slot'];
$_SESSION['charge'] = $_POST['charge'];
$_SESSION['cus_name'] = $_POST['cus_name'];
$_SESSION['cus_mail'] =  $_POST['cus_mail'];
header('Location:../checkout.php');
exit;
