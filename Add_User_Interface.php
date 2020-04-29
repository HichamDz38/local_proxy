<?php

    $fName = $lName = $password = $email = $limitType = $email_error = $error = $correct = '';

if(isset($_POST['submit'])){
        // connecting to the server (local host)
        $conn = mysqli_connect("localhost", "root", "", "network_limiter1");
        //To prevent SQL injection
//        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $fName = mysqli_real_escape_string($conn, $_POST['Fname']);
        $lName = mysqli_real_escape_string($conn, $_POST['Lname']);
        $password = mysqli_real_escape_string($conn, $_POST['psw']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $limitType = mysqli_real_escape_string($conn, $_POST['Amount']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount-number']);
        
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
        // Wrong email
            $email_error = 'Incorrect email';
            goto jump;
        }
    
        // Checking for connection errors
        if (!$conn) {
        die($error = "Connection failed");
        }
        else{  
            $sql = "INSERT INTO user (  User_FName, User_LName, Email, Password, User_Type, Daily_Limit, Status, Limit_Type)    VALUES ('".$fName."', '".$lName."', '".$email."', '".$password."', 'User', '".$amount."', 'Active', '".$limitType."')" ;
            
            if(mysqli_query($conn, $sql)){
                $correct = "User added succesfully";
                $fName = $lName = $password = $email = $limitType = $amount = '';
            }
            else{
                $error = "User could not added <br>Check your input";
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
                <!-- <head>
            <met
            
            .form .register-form label{
              display: inline-block;
              clear: left;
              width: 200px;
              text-align: left;
              margin-left: -60px;
            }
            a name="viewport" content="width=device-width, initial-scale=1">
            </head> -->
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

                </style>

                <body>

                    <form autocomplete="off" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                        <div class="container">
                            <a href="Add_Device_Interface.php"><button type="button" class="device">Device</button></a>
                            <a href="Add_User_Interface.php"><button type="button" class="User">User</button></a>
                            <hr>
                            <div class="mid-table">
                                
<!--
                               <span style="display: inline-flex" class="fie">
                                    <label for="" style="display: inline-block;"><b>User Id*:</b></label>
                                    <input type="number" placeholder="Enter Id" name="id" required style="display: inline-block;" maxlength="10" min="1">
                                </span>
-->
                                
                                <span style="display: inline-flex" class="fie">
                                    <label for="" style="display: inline-block;"><b>User First Name*:</b></label>
                                    <input type="text" placeholder="Enter User Name" name="Fname" required style="display: inline-block;" maxlength="35">
                                </span>
                                   
                                <span style="display: inline-flex" class="fie">
                                    <label for="" style="display: inline-block;"><b>User Last Name*:</b></label>
                                    <input type="text" placeholder="Enter User Name" name="Lname" required style="display: inline-block;" maxlength="35">
                                </span>

                                <span style="display: inline-flex" class="fie">
                                    <label for="psw" style="display: inline-block;"><b>Password*:</b></label>
                                    <input type="password" placeholder="Enter Password" name="psw" required style="display: inline-block;" maxlength="15" pattern=".{6,}" title="Input string should be between 8 - 15 characters">
                                </span>

                                <span style="display: inline-flex" class="fie">
                                    <label for="email" style="display: inline-block;"><b>Email*:</b></label>
                                    <input type="text" placeholder="Enter Email" name="email" required style="display: inline-block;" maxlength="45">
                                </span>
                                <hr>

                                <span style="display: inline-flex" class="fie">
                                    <label for="" style="display: inline-block;"><b>Limit Type*:</b></label>

                                    <label class="radio-container">Time (Minutes)
                                        <input type="radio" value="Time" name="Amount"><span class="checkmark"></span>
                                    </label>

                                    <label class="radio-container">Data (Megabytes)
                                        <input type="radio" value="Data" name="Amount"><span class="checkmark"></span>
                                    </label>
                                </span>
                                <hr style="margin-top: 10px;">

                                <span style="display: inline-flex" class="fie">
                                    <label for="" style="display: inline-block;"><b>Amount*:</b></label>
                                    <input type="number" placeholder="Enter Amount" name="amount-number" required style="display: inline-block;" max="720" min="0">
                                </span>

                            </div>
                            <!-- <label for="psw-repeat"><b>Amount*:</b></label><p></p>
                <div class="p-t-10">
                 <label class="radio-container ">Data   
                <input type="radio" checked="checked" name="Amount">
                 <span class="checkmark" ></span>
                 </label>
                </div>
                  <div class="p-t-9">
                 <label class="radio-container" > Time
                 <input type="radio" name="Amount">
                <span class="checkmark"></span>
                </label>
                </div> -->

                            <!-- <hr>
                <label for="psw-repeat"><b>Amount</b></label>
                <input type="password" placeholder="Enter Amount" name="psw-repeat" required> -->
                            <button type="submit" name="submit" class="registerbtn" style="background-color: dodgerblue;">Add</button>
                            <br>
                            <div style="text-align: center">   
                        <!-- Message will show here after submitting -->
                            <span style="color:red;"><?= $email_error . '<br>' . $error; ?></span>
                            <span style="color:limegreen;"><?= $correct; ?></span>
                            </div>
                        </div>


                    </form>

                </body>

            </div>
        </div>
    </div>

</body>

</html>
