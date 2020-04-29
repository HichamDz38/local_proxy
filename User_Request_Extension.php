<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="css/index-style1.css">
    <link rel="stylesheet" href="css/index-style.css">
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

                        .p-t-10 {
                            padding-top: 10px;
                            margin: 10px 10px;
                            padding: 10px 10px;
                            max-width: -100px;
                        }

                        .p-t-9 {
                            position: relative;
                            padding-top: 10px;
                            margin: 10px 10px;
                            padding: 10px 10px;
                            max-width: -50px;
                        }

                    </style>
                </head>

                <body>
                    <div id="custom-header">
                        <p>
                            Request Extension
                        </p>
                    </div>
                    <form action="/action_page.php">
                        <div class="container">
                            <!-- <div>
                    <p>Request Extension</p>
               </div> -->
                            <hr>

                            <div class="mid-table">

                                <span style="display: inline-flex" class="fie">
                                    <label for="" style="display: inline-block;"><b>User Name*:</b></label>
                                    <input type="text" placeholder="Enter User Name" name="name" required style="display: inline-block;">
                                </span>

                                <span style="display: inline-flex" class="fie">
                                    <label for="psw" style="display: inline-block;"><b>Password*:</b></label>
                                    <input type="password" placeholder="Enter Password" name="psw" required style="display: inline-block;">
                                </span>
                                <hr style="margin-bottom: -5px;">

                                <span style="display: inline-flex" class="fie">
                                    <label for="" style="display: inline-block;"><b>Choose Your Extension Limit Type*:</b></label>

                                    <label class="radio-container">Data limit extension
                                        <input type="radio" name="Amount"><span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">Time limit extension
                                        <input type="radio" name="Amount"><span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">Unlimited
                                        <input type="radio" name="Amount"><span class="checkmark"></span>
                                    </label>
                                </span>
                                <hr style="margin-top: 8px;">

                                <span style="display: inline-flex" class="fie">
                                    <label for="" style="display: inline-block;"><b>The amount in megabits*:</b></label>
                                    <input type="text" placeholder="Enter Amount In megabits" name="text" required style="display: inline-block;">
                                </span>

                                <span style="display: inline-flex" class="fie">
                                    <label for="" style="display: inline-block;"><b>The amount in hours*:</b></label>
                                    <input type="text" placeholder="Enter Amount In Hours" name="text" required style="display: inline-block;">
                                </span>

                                <span style="display: inline-flex" class="fie">
                                    <label for="" style="display: inline-block;"><b>Write the reason for the request:</b></label>
                                    <input type="text" placeholder="Enter The Reason" name="text" required style="display: inline-block;">
                                </span>
                                <button type="submit" class="registerbtn" style="background-color: dodgerblue;">Send</button>

                            </div>

                            <!-- <label for="email"><b>Enter your name*:</b></label>
                <input type="text" placeholder="Enter User Name" name="name" required>

                <label for="psw"><b>Enter your password*:</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <label for="psw-repeat"><b>Choose Your Extension Limit Type</b></label><p></p>
                <div class="p-t-10">
                 <label class="radio-container ">Data limit extension   
                <input type="radio" checked="checked" name="Amount">
                 <span class="checkmark" ></span>
                 </label>
                </div>
                <div class="p-t-9">
                 <label class="radio-container" > Time limit extension
                 <input type="radio" name="Amount">
                <span class="checkmark"></span>
                </label>
                </div>    
                <div class="p-t-9">
                 <label class="radio-container" > Unlimited
                 <input type="radio" name="Amount">
                <span class="checkmark"></span>
                </label>
                </div>
                <label for="psw"><b>The amount in megabits*:</b></label>
                <input type="password" placeholder="Enter amount in megabits" name="psw" required>
                <label for="email"><b>The amount in hours*:</b></label>
                <input type="text" placeholder="Enter amount in hours" name="email" required>
                <hr>
                <label for="psw-repeat"><b>Write the reason for the request:</b></label>
                <input type="password" placeholder="" name="psw-repeat" required>
                <button type="submit" class="registerbtn" style="background-color: dodgerblue;">Send</button> -->
                        </div>


                    </form>

                </body>

            </div>
        </div>
    </div>

</body>

</html>
