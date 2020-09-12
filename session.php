<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("location:loginPage_plus.php");
    }
    $admin=$_SESSION["admin"];
    $username=$_SESSION["user"];
    $first_name=$_SESSION["first_name"];
    $last_name=$_SESSION["last_name"];
    $email=$_SESSION["email"];
    $internet=$_SESSION["internet"];
    $user_id=$_SESSION['user_id'];
    
?>