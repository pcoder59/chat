<?php
    session_start();
    if(!isset($_SESSION["login"]) || !isset($_SESSION["username"])) {
        $_SESSION["error"] = "Please Log In to Continue";
        header("location: ../login/");
        die();
    }
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <meta name="keywords" content="Profile Dropdown Menu Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link href='//fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Exo+2:400,700,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!--content-->
    <h1>Profile Dropdown Menu</h1>
    <ul class="content">
        <li class="menu">
            <ul>
                <li class="button"><a href="#">Profile<span class="icon"> </span></a></li>
                <li class="dropdown">
                    <ul class="icon-navigation">
                        <li><a href="Change_Pic.php">Change your pic</a></li>
                        <li><a href="Change_Username.php">Change your username</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu">
            <ul>
                <li class="button"><a href="#">Chat<span class="icon stat"> </span></a></li>
                <li class="dropdown">
                    <ul class="icon-navigation">
                        <li><a href="../chat/chatrooms.php">Go to Chat<span class="fa fa-comment"></span></a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu">
            <ul>
                <li class="button"><a href="#">Settings<span class="icon msg"> </span> </a></li>
                <li class="dropdown">
                    <ul class="icon-navigation">
                        <li><a href="Change_Password.php">Change Password<span><img src="images/key.png" /></span></a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu info">
            <ul>
                <li class="button"><a href="#">Logout<span class="icon signout"> </span> </a></li>
                <li class="dropdown">
                    <ul class="icon-navigation">
                        <li><a href="../chat/logout.php">Sign out</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <!--/content-->
    <!--copyrights-->
    <div class="copy-right">
        <p>&copy; 2015 Profile Dropdown Menu. All rights reserved | Template by <a href="http://w3layouts.com" target="_blank">w3layouts</a> </p>
    </div>
    <!--/copyrights-->
</body>

</html>