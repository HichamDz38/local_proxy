<?php
    if(isset($_GET['id'])){

        require "conn.php";
        $conn = mysqli_connect($server, $user , $pass, $database);
        // Checking for connection errors
        if (!$conn) {
            die($error = "Connection failed");
            echo "error";
        }else{
            $sql="DELETE FROM device WHERE id='".$_GET['id']."'";
            if($result=mysqli_query($conn,$sql)){
                header("location:user_homepage.php");
            } else{
                echo $sql;
            }

            

            $conn->close();
        }
    }
?>