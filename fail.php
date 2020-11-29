<?php
session_start();
$_SESSION['msg'] = "Payment failed or cancelled!";
$_SESSION['type'] = "danger";
header('Location:my-appointment');
