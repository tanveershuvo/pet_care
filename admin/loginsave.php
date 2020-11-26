<?php
session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();
if (isset($_POST["submit"])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, md5($_POST['password']));
  $sql = "SELECT * FROM users where email ='$email' AND password='$password' AND role = 1";
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
  if ($result->num_rows > 0 && $row['role'] == 1) {
    $_SESSION['isLoggedIn'] = TRUE;
    $_SESSION['email'] = $row['email'];
    $_SESSION['name'] = $row['name'];
    header('Location:dashboard');
  } else {
    header('Location:index');
    $_SESSION['msg'] = 'Login invalid';
  }
}

if (isset($_POST["submit"])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, md5($_POST['password']));
  $sql = "SELECT * FROM users where email ='$email' AND password='$password' AND role = 1";
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
  if ($result->num_rows > 0 && $row['role'] == 1) {
    $_SESSION['isLoggedIn'] = TRUE;
    $_SESSION['email'] = $row['email'];
    $_SESSION['name'] = $row['name'];
    header('Location:dashboard');
  } else {
    header('Location:index');
    $_SESSION['msg'] = 'Login invalid';
  }
}
