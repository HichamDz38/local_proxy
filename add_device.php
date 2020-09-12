<?php
    include("session.php");
    if(isset($_POST['submit'])){
        // connecting to the server (local host)
        require "conn.php";
        $conn = mysqli_connect($server, $user , $pass, $database);
        //To prevent SQL injection
        $dname = mysqli_real_escape_string($conn, $_POST['name']);
        $mac = mysqli_real_escape_string($conn, $_POST['mac']);

        // Checking for connection errors
        if (!$conn) {
        die($error = "Connection failed");
        }
        else{  
            $sql = "INSERT INTO device   (  MAC_address, device_name, user_id)    VALUES ('".$mac."','".$dname."', '".$user_id."')" ;
            if(mysqli_query($conn, $sql)){
                if(mysqli_affected_rows($conn) == 0){
                    $error = "Profile could not updated <br>Check your input<br>" . mysqli_error($conn);
                    goto jump;
                }
                $correct = "Profile updated succesfully";
                header("location:user_homepage.php");
            }
            else{
                $error = mysqli_error($conn);
                echo $sql;
            }
        jump:
        mysqli_close($conn);  
        }
    }
?>