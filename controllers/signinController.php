<?php
session_start();
include_once("../dbConnection/dbCon.php");
$conn = connect();
if(isset($_POST['signin'])){
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $password= mysqli_real_escape_string($conn,md5($_POST['password']));
    $sql="SELECT * FROM users where email ='$email' AND password='$password'";
    //echo $sql;exit;
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    if($result->num_rows>0 && $row['role']==3){
        $_SESSION['isLoggedIn']=TRUE;
        $_SESSION['email']=$row['email'];
        $_SESSION['name']=$row['name'];
        $_SESSION['id']=$row['id'];
        header('Location:../index.php');
    }else{
        $_SESSION['msg'] = 'Login invalid';
        $_SESSION['type'] = "danger";
        header('Location:../signin.php');
    }
}