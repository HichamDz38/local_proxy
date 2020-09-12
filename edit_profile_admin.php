<?php
include("session.php");
$error = $pswdError = $correct = '';
    if($admin!=1){
        header("location:user_homepage.php");
    }

if(isset($_POST['submit'])){
    // connecting to the server (local host)
    require "conn.php";
    $conn = mysqli_connect($server, $user , $pass, $database);
    //To prevent SQL injection
    $fName = mysqli_real_escape_string($conn, $_POST['fname']);
    $lName = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user = mysqli_real_escape_string($conn, $_POST['username']);

    
    
    if($newPswd1 <> $newPswd2){
        $pswdError = 'Passwords are not matched';
        goto jump;
    }
    
    // Checking for connection errors
    if (!$conn) {
    die($error = "Connection failed");
    }
    else{  
        $sql = "UPDATE admin SET FName = '".$fName."' ,Email = '".$email."' ,LName = '".$lName."' ,User_Name = '".$user."' where Admin_Id='".$user_id."'" ;
        //echo $sql;
        if(mysqli_query($conn, $sql)){
            if(mysqli_affected_rows($conn) == 0){
                $error = "Profile could not updated <br>Check your input<br>" . mysqli_error($conn);
                goto jump;
            }
            $correct = "Profile updated succesfully";

            $_SESSION["user"]=$user;
            $_SESSION["first_name"]=$fName;
            $_SESSION["last_name"]=$lName;
            $_SESSION["email"]=$email;
            include('session.php');
            //header("location:edit_profile_admin.php");
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
    <title>Edit_Profile</title>
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
             <form autocomplete="off" method="POST" name="Form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
                 <div class="mid-table">
                        <span style="display: inline-flex" class="fie">
                             <label for="username"  style="display: inline-block;"><b>User Name*:</b></label>
                             <input type="text" required pattern="[a-zA-Z][a-zA-Z0-9]+" minlength="4" maxlength="10" value='<?=$username ;?>' name="username" required style="display: inline-block;">
                         </span>

                         <span style="display: inline-flex" class="fie">
                             <label for="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" style="display: inline-block;"><b>Email*:</b></label>
                             <input type="email" value='<?=$email; ?>' name="email" required style="display: inline-block;">
                         </span>

                         <span style="display: inline-flex" class="fie">
                             <label for="fname" style="display: inline-block;"><b>First Name*:</b></label>
                             <input type="text" required pattern="[A-Za-z]+"   minlength="4" maxlength="10" value='<?=$first_name; ?>' name="fname" required style="display: inline-block;">
                         </span>

                         <span style="display: inline-flex" class="fie">
                             <label for="lname" style="display: inline-block;"><b>Last Name*:</b></label>
                             <input type="text" required pattern="[A-Za-z]+"   minlength="4" maxlength="10" value='<?=$last_name; ?>' name="lname" required style="display: inline-block;">
                         </span>
                     <hr>
                     <button type="submit" name="submit" class="registerbtn" style="background-color: dodgerblue;">Edit profile</button>
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


                        
