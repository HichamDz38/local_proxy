 <?php

    $error = $pswdError = $correct = '';

    if(isset($_POST['submit'])){
        // connecting to the server (local host)
        require "conn.php";
        include("session.php");
        $conn = mysqli_connect($server, $user , $pass, $database);
        //To prevent SQL injection
        
        $oldPswd = mysqli_real_escape_string($conn, $_POST['old-pswd']);
        $newPswd1 = mysqli_real_escape_string($conn, $_POST['new-pswd1']);
        $newPswd2 = mysqli_real_escape_string($conn, $_POST['new-pswd2']);
        
        if($newPswd1 <> $newPswd2){
            $pswdError = 'Passwords are not matched';
            goto jump;
        }
        
        // Checking for connection errors
        if (!$conn) {
        die($error = "Connection failed");
        }
        else{  
            $sql = "UPDATE user SET Password = '".md5($newPswd1)."' WHERE User_Id = '".$user_id."' AND Password = '".md5($oldPswd)."'" ;
            
            if(mysqli_query($conn, $sql)){
                if(mysqli_affected_rows($conn) == 0){
                    //echo $sql;
                    $error = "Password could not updated <br>Check your input<br>" . mysqli_error($conn);
                    goto jump;
                }
                $correct = "Password updated succesfully";
            }
            else{
                $error = mysqli_error($conn);
            }
        jump:
        mysqli_close($conn);  
        }
}
// ---------------------------------------------------------------------

//    $con=mysqli_connect("localhost","root","","network_limiter1");
//
//    if (mysqli_connect_errno()) {
//      echo "Failed to connect to MySQL: " . mysqli_connect_error();
//      exit();
//    }
//
//    $sql = "SELECT User_FName, Email FROM user";
//    $result = mysqli_query($con,$sql);
//
//    // Numeric array
//    $row = mysqli_fetch_array($result, MYSQLI_NUM);
////    printf ("%s (%s)\n", $row[0], $row[1]);
//    echo $row[0] . ' | ' . $row[1];
//    echo '<br>Size = ' . sizeof($row);
//    // Associative array
////    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
////    printf ("%s (%s)\n", $row["Lastname"], $row["Age"]);
//
//    // Free result set
//    mysqli_free_result($result);
//
//    mysqli_close($con);
?>


 <!DOCTYPE html>
 <html>
<?php
 include("session.php");
 if($admin==1){
        header("location:admin_homepage.php");
    }
?>
 <head>
    <title>Change_Password</title>
    <link rel="stylesheet" media="screen and (max-width: 1000px)" href="css/index-style.css">
    <link rel="stylesheet" media="screen and (max-width: 1500px)" href="css/index-style-max.css">
 </head>
 <style>
     .mid-table {
         padding: 70px;
     }

     .mid-table span input {
         /* [type="date"]*/
         margin-top: 10px;
     }

     .mid-table span label {
         margin-top: 20px;
         width: 300px;
     }

     .registerbtn {
         padding: 16px 120px;
         margin: 8px 130px;
     }
 </style>

 <body>


     <div id="mainContainer">

         <div id="interface">
             <div id="header">
                 <div>
                     <div class="menu">
                         <!-- <img src="icons/menu.png" class="idCardIcon"> -->
                     </div>

                     <div id="inner-header">
                         <a id="header-text">Network Limiter</a>
                     </div>

                     <div class="admIcon">
                         <figure>
                             <img src="icons/user.png" class="idCardIcon">
                             <figcaption>User</figcaption>
                         </figure>
                     </div>
                 </div>
             </div>

             <div id="sidebar">
                 <ul>
                     <a href="user_homepage.php">
                         <li class="sidebar-text"><img src="icons/home_icon.png" class="sidebar-icon">Home</li>
                     </a>
                     <a href="Change_Password_user.php">
                         <li class="sidebar-text"><img src="icons/password_icon.png" class="sidebar-icon">Change Password</li>
                     </a>
                     <a href="edit_profile_user.php">
                        <li class="sidebar-text"><img src="icons/password_icon.png" class="sidebar-icon">Edit Profile</li>
                     </a>
                     <a href="logout.php">
                         <li class="sidebar-text"><img src="icons/logout_icon.png" class="sidebar-icon">Sign Out</li>
                     </a>
                 </ul>
             </div>

             <div id="rightside">
                 <form autocomplete="off" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                     <div class="mid-table">

                         <span style="display: inline-flex" class="fie">
                             <label for="old-pswd" style="display: inline-block;"><b>Old Password*:</b></label>
                             <input type="password" placeholder="Enter the odl password" name="old-pswd" required style="display: inline-block;">
                         </span>

                         <span style="display: inline-flex" class="fie">
                             <label for="new-pswd1" style="display: inline-block;"><b>New Password*:</b></label>
                             <input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter the new password" name="new-pswd1" required style="display: inline-block;">
                         </span>

                         <span style="display: inline-flex" class="fie">
                             <label for="pswd2" style="display: inline-block;"><b>Confirm Password*:</b></label>
                             <input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter the new password again" name="new-pswd2" required style="display: inline-block;">
                         </span>
                         <hr>
                         <button type="submit" name="submit" class="registerbtn" style="background-color: dodgerblue;">Change Password</button>
                         <br>
                         <div style="text-align: center">
                             <!-- Message will show here after submitting -->
                             <span style="color:red;"><?= $pswdError . '<br>' . $error; ?></span>
                             <span style="color:limegreen;"><?= $correct; ?></span>
                         </div>

                     </div>
                 </form>
             </div>
         </div>
     </div>

 </body>

 </html>
