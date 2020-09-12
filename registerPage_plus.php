<?php
    session_start();
    $error=FALSE;
    $error_code="";    
    if(isset($_POST['submit'])){
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password1']) || empty($_POST['password2'])) {
            $error=TRUE;        
            $error_code = "All fields must be filled";
        }elseif (! empty($_POST['name']) && ! ctype_alpha($_POST['name'])) {
            $error=TRUE;        
            $error_code= 'Name field should only contain letters';
        }elseif( ! empty($_POST['password1']) && ! empty($_POST['password2']) && $_POST['password1'] !== $_POST['password2'] ){
            $error=TRUE;        
            $error_code = 'Passwords are not mached';
        }elseif(! empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false){
            $error=TRUE;        
            $error_code = 'Wrong email format';
        }else{
            $correct = 'Your inforamtion will be sent to the admin<br>You will get notified about the registeration status';
            $username   =$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password1'];
            $sql_user = "SELECT * FROM user WHERE User_Name='$username'";
            $sql_email = "SELECT * FROM user WHERE  Email='$email'";
            $res_u = mysqli_query($db, $sql_u);
            $res_e = mysqli_query($db, $sql_e);
            if (mysqli_num_rows($res_u) > 0) {
                $error=TRUE;
                $error_code = "username already taken"; 	
            }else if(mysqli_num_rows($res_e) > 0){
                $error=TRUE;
                $error_code = "email already taken"; 	
            }
        }

        if(!$error){
            require "conn.php";
            $conn = mysqli_connect($server, $user , $pass, $database);

            if (!$conn) {
                die($error = "Connection failed");
            }
            else{ 
                $sql = "INSERT INTO user (  User_Name, Email, Password)    VALUES ('".$username."','".$email."', '".md5($password)."')" ;
                if(mysqli_query($conn, $sql)){
                    $query = "User added succesfully<br> wait for admin admission";
                    $fName = $password = $email ='';
                }
                else{
                    $query = "User could not added <br>".$sql;
                }
                mysqli_close($conn);  
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="css/registerStyle_plus.css">
</head>

<body>
    <div class="register-form">
        <div class="form">
            <div class="">
                <img src="icons/reg.png" class="idCardIcon">
            </div>

            <div id="header" style="background-color:white; text-align: center">
                <p id="header-text"><span style="color: #0000a0;font-weight:bold">Registeration</span></p>
            </div>
            <form class="register-form" autocomplete="off" method="POST" action="">
                <label>username*: </label>
                <input type="text" required pattern="[a-zA-Z][a-zA-Z0-9]+" minlength="4" maxlength="10" placeholder="uer-name" name="name" />
                <label>e-mail*: </label>
                <input type="email" required pattern="[a-zA-Z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-zA-Z]{2,}$" name="email" placeholder="email address" />
                <label>password*: </label>
                <input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password1" placeholder="password" />
                <label>Confirm password*: </label>
                <input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password2" placeholder="confirm password" />
                <br>
                <div id="message2">
                    <!-- Message will show here after submitting -->
                    <span style="color:red;"><?= $error_code ; ?></span>
                    <span style="color:limegreen;"><?= $query ; ?></span>
                </div>
                <br>
                <button type="submit" name="submit" value="login">Register</button>
                <p class="message">You have an Account? <a href="loginPage_plus.php">Login now!</a></p>
            </form>
            <!-- <form class="login-form">
            <input type="text" placeholder="Enter your Username"/>
            <input type="password" placeholder="Enter your Password"/>
            <div class="forget">
                <label><input type="checkbox">Remember Me</label>
                <label style=""><a href="#">Forget Password</a></label>
            </div>
            <button>Login</button>
            <p class="message">Don't have an account? <a href="#">Register now!</a></p>
          </form> -->
        </div>
    </div>
</body>

</html>
