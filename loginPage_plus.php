<?php

$error = ''; // A variable to store error meassage

if(isset($_POST['submit'])){
    if(empty($_POST['name']) || empty($_POST['password'])){
        $error = "All fields must be filled";
    }
    else{ // Admin table
        $username = $_POST['name'];
        $password = $_POST['password'];
        // connecting to the server
        $conn = mysqli_connect("localhost", "root", "", "network_limiter1");
        // Checking for connection errors
        if (!$conn) {
        die($error = "Connection failed");
        }else{
            $result = mysqli_query($conn, "SELECT * FROM admin WHERE FName='$username' AND Password = '$password'");
            if( (mysqli_num_rows($result) == 0)){ // No mached data
                $error = "Wrong user name or password";
                mysqli_close($conn);
            }else{
                mysqli_close($conn);
                // Redirect to other page
                header("Location: admin_homepage.php"); 
            }
        }
        // User table
        $username = $_POST['name'];
        $password = $_POST['password'];
        // connecting to the server
        $conn = mysqli_connect("localhost", "root", "", "network_limiter1");
        // Checking for connection errors
        if (!$conn) {
        die($error = "Connection failed");
        }else{
            $result = mysqli_query($conn, "SELECT * FROM user WHERE User_FName='$username' AND Password = '$password'");
            if( (mysqli_num_rows($result) == 0)){ // No mached data
                $error = "Wrong user name or password";
                mysqli_close($conn);
            }else{
                mysqli_close($conn);
                // Redirect to other page
                header("Location: user_homepage.php"); 
            }
        }
    } // else end
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style_plus.css">
    <title>Document</title>
</head>

<body>
    <div class="login-page">
        <div class="form">
<!--
            <div class="">
                <img src="icons/id_Card.png" class="idCardIcon">
            </div>
-->

            <div id="header" style="background-color:white; text-align: center">
                <p id="header-text"><span style="color: #0000a0;font-weight:bold">Login</span> <span style="color: gray;font-weight:200px">to your account</span></p>
            </div>
            <div class="container">
                <h3>Login</h3>
                <div class="line"></div>
            </div>
            <!-- <br><br> -->
            <form autocomplete="off" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="text" placeholder="Enter your Username" name="name" />
                <input type="password" placeholder="Enter your Password" name="password" />
                <!-- Showing error message -->
                <span style="color: red"><?php echo $error; ?></span><br>
                   
                <div class="forget">
                    <!-- <label><p class="message"><a href="#">Forget Password</a></p></label> -->
                    <label><input type="checkbox">Remember Me</label>
                    <label style=""><a href="#">Forget Password</a></label>
                </div>
                <button type="submit" name="submit" value="Login">Login</button><br><br>
                <p class="message">Don't have an account? <a href="registerPage_plus.php">Register now!</a></p>
            </form>
        </div>
    </div>
</body>

</html>
