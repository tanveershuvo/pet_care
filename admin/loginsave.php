<?php
session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();
if (isset($_POST["submit"])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, md5($_POST['password']));
  $sql = "SELECT * FROM users where email ='$email' AND password='$password'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
  if ($result->num_rows > 0) {
    $_SESSION['email'] = $row['email'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['id'] = $row['id'];
    if ($row['role'] == 1) {
      $_SESSION['isAdmin'] = true;
      header('Location:dashboard');
    } elseif ($row['role'] == 2) {
      $_SESSION['isVet'] = true;
      header('Location:vet-dashboard');
    } else {
      header('Location:index');
      $_SESSION['msg'] = 'Login invalid';
    }
  } else {
    header('Location:index');
    $_SESSION['msg'] = 'Login invalid';
  }
}

if (isset($_POST["setup"])) {
  $id = mysqli_real_escape_string($conn, $_POST['vet_id']);
  $password = mysqli_real_escape_string($conn, md5($_POST['password']));

  $sql = "SELECT * FROM vetdetails where id = '$id'";

  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
  $email = $row['email_address'];
  $name = $row['full_name'];

  $sql = "INSERT INTO users (email,name,password,role) VALUES ('$email','$name','$password',2)";
  if ($conn->query($sql)) {
    $last_id = $conn->insert_id;
    $sql = "UPDATE vetdetails SET user_id = '$last_id'";
    if ($conn->query($sql)) {
      $_SESSION['msg'] = 'Account setup Complete! Now sign in!';
    } else {
      $_SESSION['msg'] = 'Invalid Operation';
    }
    header('Location:index');
  }
}
