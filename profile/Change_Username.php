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
    <title>Change Your Username</title>
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
        <h1>Your Username is: <?=$_SESSION["username"]?></h2>
        <div class="card-body">
            <?php
                if(isset($_SESSION["nouser"]) and $_SESSION["nouser"] === "Please Enter A Username") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nouser']}</p>";
                    echo "</div>";
                }
                if(isset($_SESSION["nouser"]) and $_SESSION["nouser"] === "Username already Exists. Please enter another username.") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nouser']}</p>";
                    echo "</div>";
                }
                if(isset($_SESSION["nouser"]) and $_SESSION["nouser"] === "Your Username Is Updated Successfully.") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nouser']}</p>";
                    echo "</div>";
                }
                if(isset($_SESSION["nouser"]) and $_SESSION["nouser"] === "Unknown Error") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nouser']}</p>";
                    echo "</div>";
                }
            ?>
            <div class="alert alert-warning">
                <p>Warning: Changing Username will Affect Your Old Chat Messages!</p>
            </div>
            <form action="change-user.php" method="POST">
                <div class="form-group">
                    <label for="username">Change Your Username:</label>
                    <input class="form-control" type="text" name="username" id="username" placeholder="Enter New Username" required>
                    <br>
                    <button class="btn btn-success form-control" type="submit">Change Username</button>
                </div>
            </form>
            <a href="index.php"><button class="btn btn-danger">Back to Profile</button></a>
        </div>
    </div>
</body>

</html>