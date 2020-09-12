<?php

    $fName = $lName = $password = $email = $limitType = $email_error = $error = $correct = '';
    if(isset($_POST['new_limit'])){
        require "conn.php";
        $conn = mysqli_connect($server, $user , $pass, $database);
        $new_limit = mysqli_real_escape_string($conn, $_POST['new_limit']);
        $userId = mysqli_real_escape_string($conn, $_POST['userId']);

        if (!$conn) {
            die($error = "Connection failed");
            }
            else{  
                $sql = "UPDATE user SET Daily_Limit='".$new_limit."'  where User_Id='".$userId."'" ;
                if(mysqli_query($conn, $sql)){
                    $correct = "User added succesfully";
                }
                else{
                    $error = "User could not added <br>Check your input";
                }
             mysqli_close($conn);  
            }
    }

?>
<!DOCTYPE html>
<?php
    include("session.php");
    if($admin!=1){
        header("location:user_homepage.php");
    }

?>
<html>

<head>
    <title>Devices</title>
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


                <div id="table-title">
                    <a>Devices List</a>
                </div>

                <div id="table-container">
                    <?php
                    require "conn.php";
                    $sql = "SELECT device.*,user.User_Name  FROM `device` INNER join user on device.user_id=user.User_Id order by device.User_Id";
                    $conn = mysqli_connect($server, $user , $pass, $database);
                    $result = mysqli_query($conn,$sql)or die();

                    echo '<table id="users-table" border="1">';
                //        <th>Users List</th>
                    echo "<tr>
                    <th>User name</th>
                    <th>device Name</th>
                    <th>Mac Address</th>
                    <th>Device status</th>
                    </tr>";
                    $i=1;
                    while($row = mysqli_fetch_array($result)) {
                        $id = $row['id'];
                        $DName = $row['device_name'];
                        $UName = $row['User_Name'];
                        $Mac=$row['MAC_address'];
                        $status = $row['Device_status'];
                        if ($status==1){
                            $status="<a href='device_action.php?f=0&id=".$id."'>active</a>";
                        }elseif ($status==0){
                            $status="‎<a href='device_action.php?f=1&id=".$id."'>blocked</a>";
                        }


                        echo "<tr><td>".$UName."</td><td>".$DName."</td><td>".$Mac."</td><td>".$status."</td></tr>";
                    $i++;
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
