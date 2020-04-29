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

                        .p-t-10 {
                            padding-top: 10px;
                            margin: 10px 10px;
                            padding: 10px 10px;
                            max-width: -100px;
                        }

                        .p-t-9 {
                            padding-top: 10px;
                            margin: 10px 10px;
                            padding: 10px 10px;
                            max-width: -50px;
                        }

                    </style>
                </head>

                <body>

                    <form action="/action_page.php">
                        <div class="container">
                            <hr>
                            <label for="psw-repeat"><b>Report Time*:</b></label>
                            <p></p>
                            <div class="p-t-10">
                                <label class="radio-container ">Day
                                    <input type="radio" checked="checked" name="Amount">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="p-t-9">
                                <label class="radio-container"> Week
                                    <input type="radio" name="Amount">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="p-t-9">
                                <label class="radio-container"> Month
                                    <input type="radio" name="Amount">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="registerbtn">Generate</button>
                        </div>


                    </form>

                </body>

            </div>
        </div>
    </div>

</body>

</html>
