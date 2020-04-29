<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="css/user_homepage.css">
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
                    <a href="user_homepage.php">
                        <li class="sidebar-text"><img src="icons/home_icon.png" class="sidebar-icon">Home</li>
                    </a>
                    <a href="Change_Password_Interface.php">
                        <li class="sidebar-text"><img src="icons/password_icon.png" class="sidebar-icon">Change Password</li>
                    </a>
<!--
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
-->
                    <a href="loginPage_plus.php">
                        <li class="sidebar-text"><img src="icons/logout_icon.png" class="sidebar-icon">Sign Out</li>
                    </a>
                </ul>
            </div>

            <div id="rightside" align="left">

                <table id="icons-table">
                    <tr>
                        <td><img src="icons/pause_icon.png"><br><a class="icon-text">Pause</a></td>
                        <td rowspan="2"><img src="icons/on_off_icon.png"><br><a class="icon-text">On/Off</a></td>
                        <td rowspan="3"><img src="icons/extension.png"><br><a class="icon-text">Request Extension</a></td>
                    </tr>
                    <tr>
                        <td><img src="icons/resume_icon.png"><br><a class="icon-text">Resume</a></td>
                    </tr>
                </table>

                <div id="table-title">
                    <a>Users Devices</a>
                </div>

                <table id="users-table">
                    <tr>
                        <th>User ID</th>
                        <th>Device Status</th>
                        <th>User Name</th>
                        <th>MAC Address</th>
                        <th>Daily Limit</th>
                    </tr>
                    <tr>
                        <td>‎</td>
                        <td>‎</td>
                        <td>‎</td>
                        <td>‎</td>
                        <td>‎</td>
                    </tr>
                    <tr>
                        <td>‎</td>
                        <td>‎</td>
                        <td>‎</td>
                        <td>‎</td>
                        <td>‎</td>
                    </tr>
                    <tr>
                        <td>‎</td>
                        <td>‎</td>
                        <td>‎</td>
                        <td>‎</td>
                        <td>‎</td>
                    </tr>
                    <tr>
                        <td>‎</td>
                        <td>‎</td>
                        <td>‎</td>
                        <td>‎</td>
                        <td>‎</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
