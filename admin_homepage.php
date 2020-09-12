<!DOCTYPE html>

<html>
<?php
    include("session.php");
    if($admin!=1){
        header("location:user_homepage.php");
    }
?>
<head>
    <title>Admin_Home_page</title>
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

                <table id="icons-table">
                    <tr>
                        <td><a href="Admin_User_Interface.php" /><img src="icons/add_user_icon2.png" class="rightside-icons">
                            <br>
                            <a class="icon-text" href="Add_User_Interface.php">Users</a></td>
                        <td><a href="admin_Device_Interface.php" /><img src="icons/add_device_icon2.png" class="rightside-icons">
                            <br>
                            <a class="icon-text" href="Add_Device_Interface.php">Devices</a></td>
                        <td><a href="Report_Interface.php" /><img src="icons/report_icon2.png" class="rightside-icons">
                            <br>
                            <a class="icon-text" href="Report_Interface.php">Reports</a></td>
                    </tr>
                    <tr>
                        <td><a href="edit_profile_admin.php" /><img src="icons/password_icon2.png" class="rightside-icons">
                            <br>
                            <a class="icon-text" href="edit_profile_admin.php">Edit Profile</a></td>
                        <td><a href="Change_Password_admin.php" /><img src="icons/password_icon2.png" class="rightside-icons">
                            <br>
                            <a class="icon-text" href="Change_Password_admin.php">Change Password</a></td>
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
                    require "conn.php";
                    $sql = "SELECT * FROM user";
                    $conn = mysqli_connect($server, $user , $pass, $database);
                    $result = mysqli_query($conn,$sql)or die();

                    echo '<table id="users-table" border="1">';
                //        <th>Users List</th>
                    echo "<tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>E-mail</th>
                    <th>Daily Limit(MB)</th>
                    <th>Status</th>
                    </tr>";

                    while($row = mysqli_fetch_array($result)) {
                        $id = "<a href='user_detaills.php?id=".$row['User_Id']."'>".$row['User_Name']."</a>";
                        $fName = $row['User_FName'];
                        $lName = $row['User_LName'];
                        $email = $row['Email'];
                        //$userType = $row['User_Type'];
                        $dailyLimit = floor($row['Daily_Limit']/1048576);
                        $stat = $row['User_Status'];
                        if ($stat==1){
                            $stat="active";
                        }elseif ($stat==0){
                            $stat="‎blocked";
                        }

                        echo "<tr><td>".$id."</td><td>".$fName."</td><td>".$lName."</td><td>".$email."</td><td>".$dailyLimit."</td><td>".$stat."</td></tr>";
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
