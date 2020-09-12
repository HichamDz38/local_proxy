<?php
    include("session.php");
    if($admin!=1){
        header("location:user_homepage.php");
    }

    if(isset($_GET['id'])){
        // connecting to the server (local host)
        require "conn.php";
        $conn = mysqli_connect($server, $user , $pass, $database);
        //To prevent SQL injection
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
        // Checking for connection errors
        if (!$conn) {
        die($error = "Connection failed");
        }
        else{  
            $sql = "select * from  user where User_Id='".$id."'" ;
            //echo $sql;
            $result=mysqli_query($conn, $sql);
            if($result){
                $row = mysqli_fetch_array($result);

                $user=$row['User_Name'];
                $first_name=$row['User_FName'];
                $last_name=$row['User_LName'];
                $email=$row['Email'];
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
    <title>User_Details</title>
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
                         <img src="icons/admin.png" class="idCardIcon">
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
                    <a href="Change_Password_admin.php">
                        <li class="sidebar-text"><img src="icons/password_icon.png" class="sidebar-icon">Change Password</li>
                    </a>
                    <a href="edit_profile_admin.php">
                        <li class="sidebar-text"><img src="icons/password_icon.png" class="sidebar-icon">Edit Profile</li>
                    </a>
                    <a href="Admin_User_Interface.php">
                        <li class="sidebar-text"><img src="icons/add_user_icon.png" class="sidebar-icon">Users</li>
                    </a>
                    <a href="admin_Device_Interface.php">
                        <li class="sidebar-text"><img src="icons/add_device_icon.png" class="sidebar-icon">Devices</li>
                    </a>
                    <a href="Report_Interface.php">
                        <li class="sidebar-text"><img src="icons/report_icon.png" class="sidebar-icon">Report</li>
                    </a>
                    <a href="Sessions_Interface.php">
                        <li class="sidebar-text"><img src="icons/session_icon.png" class="sidebar-icon">Sessions</li>
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
                             <label for="username"   style="display: inline-block;"><b>User Name*:</b></label>
                             <input type="text" readonly value='<?=$user ;?>' name="username" required style="display: inline-block;">
                         </span>

                         <span style="display: inline-flex" class="fie">
                             <label for="email" style="display: inline-block;"><b>Email*:</b></label>
                             <input type="email" readonly value='<?=$email; ?>' name="email" required style="display: inline-block;">
                         </span>

                         <span style="display: inline-flex" class="fie">
                             <label for="fname" style="display: inline-block;"><b>First Name*:</b></label>
                             <input type="text" readonly value='<?=$first_name; ?>' name="fname" required style="display: inline-block;">
                         </span>

                         <span style="display: inline-flex" class="fie">
                             <label for="lname" style="display: inline-block;"><b>Last Name*:</b></label>
                             <input type="text" readonly value='<?=$last_name; ?>' name="lname" required style="display: inline-block;">
                         </span>
                     <hr>
                     
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


                        
