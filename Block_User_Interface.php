 <?php

$error = $correct = '';

    if(isset($_POST['submit'])){
        // connecting to the server (local host)
        $conn = mysqli_connect("localhost", "root", "", "network_limiter1");
        //To prevent SQL injection
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $fName = mysqli_real_escape_string($conn, $_POST['fName']);
        
        // Checking for connection errors
        if (!$conn) {
        die($error = "Connection failed");
        }
        else{  
            $sql = "UPDATE user SET Status = 'Blocked' WHERE User_FName = '".$fName."' AND User_Id = '".$id."'" ;
            
            if(mysqli_query($conn, $sql)){
                if(mysqli_affected_rows($conn) == 0){
                    $error = "User could not be blocked <br>Check your input<br>" . mysqli_error($conn);
                    goto jump;
                }
                $correct = "User blocked succesfully";
            }
            else{
                $error = mysqli_error($conn);
            }
        jump:
        mysqli_close($conn);  
        }
}

?>


 <!DOCTYPE html>

 <html>

 <head>
     <link rel="stylesheet" href="css/index-style1.css">
 </head>

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
                             <img src="icons/Admin.png" class="idCardIcon">
                             <figcaption>Admin</figcaption>
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

             <div id="rightside" align="left">

                 <head>
                     <meta name="viewport" content="width=device-width, initial-scale=1">
                     <style>
                         .User {
                             background-color: dodgerblue;
                             color: white;
                             padding: 16px 155px;
                             margin: 5px 0;
                             border: none;
                             cursor: pointer;
                             width: -100%;
                             opacity: 0.9;
                         }

                         .User:hover {
                             opacity: 1;
                         }

                         .device {
                             background-color: skyblue;
                             color: white;
                             padding: 16px 20px;
                             margin: 5px 0;
                             border: none;
                             cursor: pointer;
                             width: 50%;
                             opacity: 0.9;
                         }

                         .device:hover {
                             opacity: 1;
                         }

                         input[type=text],
                         input[type=password] {
                             width: 95%;
                             padding: 15px;
                             margin: 5px 0 22px 0;
                             display: inline-block;
                             border: none;
                             background: #f1f1f1;
                         }

                         .registerbtn {
                             padding: 16px 120px;
                         }

                     </style>
                 </head>

                 <body>

                     <form autocomplete="off" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                         <div class="container">
                             <a href="Block_Device_Interface.php"><button type="button" class="device">Device</button></a>
                             <a href="Block_User_Interface.php"><button type="button" class="User">User</button></a>
                             <hr>

                             <label for="email"><b>User ID*:</b></label>
                             <input type="text" placeholder="Enter User Name" name="id" required>

                             <label for="email"><b>User First Name*:</b></label>
                             <input type="text" placeholder="Enter User Name" name="fName" required>

                             <button type="submit" name="submit" class="registerbtn">Block User</button>
                         </div>
                         <br>
                         <div style="text-align: center">
                             <!-- Message will show here after submitting -->
                             <span style="color:red;"><?= $error; ?></span>
                             <span style="color:limegreen;"><?= $correct; ?></span>
                         </div>


                     </form>

                 </body>

             </div>
         </div>
     </div>

 </body>

 </html>
