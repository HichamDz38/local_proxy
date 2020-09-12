<?php
    include "session.php";
    require "conn.php";
    $conn = mysqli_connect($server, $user , $pass, $database);
    // Checking for connection errors
    if (!$conn) {
        die($error = "Connection failed");
    }else{
        $sql="UPDATE user set Internet_status=1 where User_Name='".$username."'";
        if ($conn->query($sql) === TRUE) {
            header("location:user_homepage.php");
        } else {
            echo $sql;
        }
        
        $conn->close();
    }
?>