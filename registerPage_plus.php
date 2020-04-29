<?php

$nameError = $emailError = $passError = $error = $correct = '';
       
if(isset($_POST['submit'])){
    
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password1']) || empty($_POST['password2'])) {
        $error = "All fields must be filled";
    }
        
        if (! empty($_POST['name']) && ! ctype_alpha($_POST['name'])) {
            $nameError = 'Name field should only contain letters';
        }
        if( ! empty($_POST['password1']) && ! empty($_POST['password2']) && $_POST['password1'] !== $_POST['password2'] ){
            $passError = 'Passwords are not mached';
        }
        if(! empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false){
            $emailError = 'Wrong email format';
        }
        if($nameError == '' && $emailError == '' && $passError == '' && $error == ''){
            $correct = 'Your inforamtion will be sent to the admin<br>You will get notified about the registeration status';
        }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/registerStyle_plus.css">
    <title>Document</title>
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
            <form class="register-form" autocomplete="off" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <label>Enter your name*: </label><input type="text" placeholder="name" name="name" />
                <label>Enter your e-mail*: </label><input type="email" name="email" placeholder="email address" />
                <label>Enter your password*: </label><input type="password" name="password1" placeholder="password" />
                <label>Confirm your password*: </label><input type="password" name="password2" placeholder="confirm password" />
                <br>
                <div id="message2">
                    <!-- Message will show here after submitting -->
                    <span style="color:red;"><?= $nameError . $error .'<br>' . $emailError . '<br>' . $passError; ?></span>
                    <span style="color:limegreen;"><?= $correct; ?></span>
                </div>
                <br>
                <button type="submit" name="submit" value="login">Register</button>
                <p class="message"><a href="#">Sign-up as a Guest</a></p>
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
