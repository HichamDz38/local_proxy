<!DOCTYPE html>
<?php
    include("session.php");
    if($admin==1){
        header("location:admin_homepage.php");
    }    
?>
<html>

    <head>
        <title>User_Home_page</title>
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
                        <a href="Change_Password_user.php">
                            <li class="sidebar-text"><img src="icons/password_icon.png" class="sidebar-icon">Change Password</li>
                        </a>
                        <a href="edit_profile_user.php">
                            <li class="sidebar-text"><img src="icons/password_icon.png" class="sidebar-icon">Edit Profile</li>
                        </a>
                        <a href="logout.php">
                            <li class="sidebar-text"><img src="icons/logout_icon.png" class="sidebar-icon">Sign Out</li>
                        </a>
                    </ul>
                </div>

                <div id="rightside" align="left">
                        
                    <div id="table-title">
                        <div>
                            <?php
                                require "conn.php";
                                $conn = mysqli_connect($server, $user , $pass, $database);
                                // Checking for connection errors
                                if (!$conn) {
                                    die($error = "Connection failed");
                                }else{
                                    $sql="SELECT Internet_status FROM user WHERE User_Name='".$username."'";
                                    $result=mysqli_query($conn,$sql);
                                    if ((mysqli_num_rows($result)>0)) {
                                        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                                        $net=$row["Internet_status"];
                                    } else {
                                        echo $sql;
                                    }
        
                                    $conn->close();
                                }
                                if($net==1){
                                    echo '<a href="pause.php" class="icon-text"><img src="icons/pause_icon.png"><br>Pause</a>';
                                }else{
                                    echo '<a href="resume.php" class="icon-text"><img src="icons/resume_icon.png"><br>Resume</a>';
                                }
                            ?>
                        </div>
                        <a>Users Devices</a>
			<form autocomplete="off" method="POST" action="add_device.php">
                            <div class="mid-table">

                                <span style="display: inline-flex" class="fie">
                                    <label for="mac" style="display: inline-block;"><b>Mac address*:</b></label>
                                    <input type="text" required pattern="([0-9a-fA-F]{2}[:-]){5}[0-9a-fA-F]{2}" minlength="17" maxlength="17"placeholder="Enter the Mac address" name="mac" required style="display: inline-block;">
                                </span>
                                <span style="display: inline-flex" class="fie">
                                    <label for="name" style="display: inline-block;"><b>device name*:</b></label>
                                    <input type="text" required pattern="[a-zA-Z][a-zA-Z0-9]+" minlength="4" maxlength="10" placeholder="Enter the name" name="name" required style="display: inline-block;">
                                </span>
                                <button type="submit" name="submit" class="registerbtn" style="background-color: dodgerblue;">add device</button>
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


                    <table id="users-table">
                        <tr>
                            <th>Device Name</th>
                            <th>MAC Address</th>
                            <th>Device Status</th>
                            <th>data usage(MB)</th>
                            <th>delete</th>
                        </tr>
                        <?php
                            require "conn.php";
                            $conn = mysqli_connect($server, $user , $pass, $database);
                            // Checking for connection errors
                            if (!$conn) {
                                die($error = "Connection failed");
                                echo "error";
                            }else{
                                $sql="SELECT * FROM device WHERE user_id='".$user_id."'";
                                if($result=mysqli_query($conn,$sql)){
                                    while($row = mysqli_fetch_object($result)) {
                                        $did=$row->id;
                                        $mac=$row->MAC_address;
                                        $dstat=$row->Device_status;
		                        if($dstat==1){
						$dstat="active";
					}else{
						$dstat="blocked";}
                                        $actdata=floor($row->actual_data/1048576);
                                        $dname=$row->device_name;
                                        echo "<tr>";
                                        echo "<td>‎".$dname."</td>";
                                        echo "<td>‎".$mac."</td>";
                                        echo "<td>‎".$dstat."</td>";
                                        echo "<td>‎".$actdata."</td>";
                                        echo "<td>‎<a href='delete_device.php?id=".$did."'>delete</a></td>";
                                        echo "</tr>";
                                    }
                                } 
    
                                $conn->close();
                            }
                        ?>
                        
                    </table>
                </div>
            </div>
        </div>

    </body>

</html>

