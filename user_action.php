<?php
    if(isset($_GET['id']) AND (isset($_GET['f']))){
        require "conn.php";
        $conn = mysqli_connect($server, $user , $pass, $database);
        // Checking for connection errors
        if (!$conn) {
            die($error = "Connection failed");
            echo "error";
        }else{
            $sql="UPDATE user SET User_Status='".$_GET['f']."' WHERE User_Id='".$_GET['id']."'";
            if(mysqli_query($conn, $sql)){
                if(mysqli_affected_rows($conn) == 0){
                $error = "Profile could not updated <br>Check your input<br>" . mysqli_error($conn);
                echo $sql;
                goto jump;
                }
                header("location:Admin_User_Interface.php");
            }else{
                echo $sql;
            }
        jump:
        mysqli_close($conn);  
        }
    }
?>