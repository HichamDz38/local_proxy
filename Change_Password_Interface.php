 <?php

$error = $pswdError = $correct = '';

    if(isset($_POST['submit'])){
        // connecting to the server (local host)
        $conn = mysqli_connect("localhost", "root", "", "network_limiter1");
        //To prevent SQL injection
        $fName = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
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
            $sql = "UPDATE user SET Password = '".$newPswd1."' WHERE User_FName = '".$fName."' AND Email = '".$email."' AND Password = '".$oldPswd."'" ;
            
            if(mysqli_query($conn, $sql)){
                if(mysqli_affected_rows($conn) == 0){
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

 <head>
     <link rel="stylesheet" href="css/user_homepage.css">
     <link rel="stylesheet" href="css/index-style1.css">
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
                     <a href="admin_homepage.php">
                         <li class="sidebar-text"><img src="icons/home_icon.png" class="sidebar-icon">Home</li>
                     </a>
                     <a href="Change_Password_Interface.php">
                         <li class="sidebar-text"><img src="icons/password_icon.png" class="sidebar-icon">Change Password</li>
                     </a>
                     <a href="Add_User_Interface.php">
                         <li class="sidebar-text"><img src="icons/add_user_icon.png" class="sidebar-icon">Add User</li>
                     </a>
                     <a href="Block_User_Interface.php">
                         <li class="sidebar-text"><img src="icons/block_user_icon.png" class="sidebar-icon">Block User</li>
                     </a>
                     <a href="Add_Device_Interface.php">
                         <li class="sidebar-text"><img src="icons/add_device_icon.png" class="sidebar-icon">Add Device</li>
                     </a>
                     <a href="Block_Device_Interface.php">
                         <li class="sidebar-text"><img src="icons/block_device_icon.png" class="sidebar-icon">Block Device</li>
                     </a>
                     <a href="Check_Request_Interface.php">
                         <li class="sidebar-text"><img src="icons/request_icon.png" class="sidebar-icon">Requests</li>
                     </a>
                     <a href="Report_Interface.php">
                         <li class="sidebar-text"><img src="icons/report_icon.png" class="sidebar-icon">Report</li>
                     </a>
                     <a href="Sessions_Interface.php">
                         <li class="sidebar-text"><img src="icons/session_icon.png" class="sidebar-icon">Sessions</li>
                     </a>
                     <a href="loginPage_plus.php">
                         <li class="sidebar-text"><img src="icons/logout_icon.png" class="sidebar-icon">Sign Out</li>
                     </a>
                 </ul>
             </div>

             <div id="rightside">
                 <form autocomplete="off" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                     <div class="mid-table">

                         <span style="display: inline-flex" class="fie">
                             <label for="" style="display: inline-block;"><b>User First Name*:</b></label>
                             <input type="text" placeholder="Enter User Name" name="name" required style="display: inline-block;">
                         </span>

                         <span style="display: inline-flex" class="fie">
                             <label for="psw" style="display: inline-block;"><b>Email*:</b></label>
                             <input type="text" placeholder="Enter Email" name="email" required style="display: inline-block;">
                         </span>

                         <span style="display: inline-flex" class="fie">
                             <label for="email" style="display: inline-block;"><b>Old Password*:</b></label>
                             <input type="password" placeholder="Enter the odl password" name="old-pswd" required style="display: inline-block;">
                         </span>

                         <span style="display: inline-flex" class="fie">
                             <label for="email" style="display: inline-block;"><b>New Password*:</b></label>
                             <input type="password" placeholder="Enter the new password" name="new-pswd1" required style="display: inline-block;">
                         </span>

                         <span style="display: inline-flex" class="fie">
                             <label for="email" style="display: inline-block;"><b>Confirm Password*:</b></label>
                             <input type="password" placeholder="Enter the new password again" name="new-pswd2" required style="display: inline-block;">
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