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
    <title>Change Your Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Profile Dropdown Menu Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link href='//fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Exo+2:400,700,100' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>

<body>
    <div class="card" style="width:25rem; margin: auto; background: transparent; border: none;">
        <h1>Change Your Password</h2>
        <div class="card-body">
            <?php
                if(isset($_SESSION["nopass"]) and $_SESSION["nopass"] === "Your Current Password is Incorrect") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nopass']}</p>";
                    echo "</div>";
                }
                if(isset($_SESSION["nopass"]) and $_SESSION["nopass"] === "Your Passwords don't match") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nopass']}</p>";
                    echo "</div>";
                }
                if(isset($_SESSION["nopass"]) and $_SESSION["nopass"] === "Your Password Changed Successfully") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nopass']}</p>";
                    echo "</div>";
                }
                if(isset($_SESSION["nopass"]) and $_SESSION["nopass"] === "Unknown Error") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nopass']}</p>";
                    echo "</div>";
                }
            ?>
            <form action="change-password.php" method="POST">
                <div class="form-group">
                    <label for="current_password">Current Password:</label>
                    <input class="form-control" type="password" name="current_password" id="current_password" placeholder="Enter Current Password" required>                
                    <label for="new_password">New Password:</label>
                    <input class="form-control" type="password" name="new_password" id="new_password" placeholder="Enter New Password" required>
                    <label for="confirm_password">Confirm New Password:</label>
                    <input class="form-control" type="password" name="new_password_confirm" id="new_password_confirm" placeholder="Confirm New Password" required>
                    <br>
                    <button class="btn btn-success form-control" type="submit">Change Password</button>
                </div>
            </form>
            <a href="index.php"><button class="btn btn-danger">Back to Profile</button></a>
        </div>
    </div>
</body>

</html>