<?php
    if(isset($_GET['id']) AND (isset($_GET['f']))){
        echo $_GET['id'],"<br>";
        echo $_GET['f'],"<br>";
        require "conn.php";
        $conn = mysqli_connect($server, $user , $pass, $database);
        // Checking for connection errors
        if (!$conn) {
            die($error = "Connection failed");
            echo "error";
        }else{
            $sql="UPDATE device SET Device_status='".$_GET['f']."' WHERE id='".$_GET['id']."'";
            if(mysqli_query($conn, $sql)){
                if(mysqli_affected_rows($conn) == 0){
                $error = "Device could not updated <br>" . mysqli_error($conn);
                echo $error,"<br>";
                echo $sql;
                goto jump;
                }
                header("location:admin_Device_Interface.php");  
                
            }else{
                echo $sql;
            }
        jump:
        mysqli_close($conn);  
        }
    }
?>