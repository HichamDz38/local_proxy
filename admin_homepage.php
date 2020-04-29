<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" media="screen and (max-width: 1000px)" href="css/index-style.css">
    <link rel="stylesheet" media="screen and (max-width: 1500px)" href="css/index-style-max.css">
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
                    <a href="loginPage_plus.php">
                        <li class="sidebar-text"><img src="icons/logout_icon.png" class="sidebar-icon">Sign Out</li>
                    </a>
                </ul>
            </div>

            <div id="rightside">

                <table id="icons-table">
                    <tr>
                        <td><a href="Add_User_Interface.php" /><img src="icons/add_user_icon2.png" class="rightside-icons">
                            <br>
                            <a class="icon-text" href="Add_User_Interface.php">Add User</a></td>
                        <td><a href="Add_Device_Interface.php" /><img src="icons/add_device_icon2.png" class="rightside-icons">
                            <br>
                            <a class="icon-text" href="Add_Device_Interface.php">Add Device</a></td>
                        <td><a href="Check_Request_Interface.php" /><img src="icons/request_icon2.png" class="rightside-icons">
                            <br>
                            <a class="icon-text" href="Check_Request_Interface.php">Requests</a></td>
                        <td><a href="Report_Interface.php" /><img src="icons/report_icon2.png" class="rightside-icons">
                            <br>
                            <a class="icon-text" href="Report_Interface.php">Reports</a></td>
                    </tr>
                    <tr>
                        <td><a href="Block_User_Interface.php" /><img src="icons/block_user_icon2.png" class="rightside-icons">
                            <br>
                            <a class="icon-text" href="Block_User_Interface.php">Block User</a></td>
                        <td><a href="Block_Device_Interface.php" /><img src="icons/block_device_icon2.png" class="rightside-icons">
                            <br>
                            <a class="icon-text" href="Block_Device_Interface.php">Block Device</a></td>
                        <td><a href="Change_Password_Interface.php" /><img src="icons/password_icon2.png" class="rightside-icons">
                            <br>
                            <a class="icon-text" href="Change_Password_Interface.php">Change Password</a></td>
                        <td><a href="Sessions_Interface.php" /><img src="icons/session_icon2.png" class="rightside-icons">
                            <br>
                            <a class="icon-text" href="Sessions_Interface.php">Sessions</a></td>
                    </tr>
                </table>

                <div id="table-title">
                    <a>Users List</a>
                </div>

                <div id="table-container">
                    <?php

                    $sql = "SELECT * FROM user";
                    $conn = mysqli_connect("localhost", "root", "", "network_limiter1");
                    $result = mysqli_query($conn,$sql)or die();

                    echo '<table id="users-table" border="1">';
                //        <th>Users List</th>
                    echo "<tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>E-mail</th>
                    <th>User Type</th>
                    <th>Daily Limit</th>
                    <th>Limit Type</th>
                    <th>Status</th>
                    </tr>";

                    while($row = mysqli_fetch_array($result)) {
                        $id = $row['User_Id'];
                        $fName = $row['User_FName'];
                        $lName = $row['User_LName'];
                        $email = $row['Email'];
                        $userType = $row['User_Type'];
                        $dailyLimit = $row['Daily_Limit'];
                        $status = $row['Status'];
                        $limitType = $row['Limit_Type'];

                        if($limitType == 'Time')
                            $dailyLimit = $dailyLimit . ' Minutes';
                        else
                            $dailyLimit = $dailyLimit . ' Megabytes';

                        echo "<tr><td>".$id."</td><td>".$fName."</td><td>".$lName."</td><td>".$email."</td><td>".$userType."</td><td>".$dailyLimit."</td><td>".$limitType."</td><td>".$status."</td></tr>";
                    } 

                    echo "</table>";
                    mysqli_close($conn);

                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
