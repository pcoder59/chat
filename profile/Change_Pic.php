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
    <title>Change Your Pic</title>
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
        <img class="card-img-top" src="../profile/images/users/<?=$_SESSION["username"]?>" alt="Card image" style="border-radius: 50%;">
        <div class="card-body">
            <?php
                if(isset($_SESSION["nopic"]) and $_SESSION["nopic"] === "Please Choose a File to Upload") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nopic']}</p>";
                    echo "</div>";
                }
                if(isset($_SESSION["nopic"]) and $_SESSION["nopic"] === "The File is not an Image!") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nopic']}</p>";
                    echo "</div>";
                }
                if(isset($_SESSION["nopic"]) and $_SESSION["nopic"] === "File Size Must Be Less than 5MB") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nopic']}</p>";
                    echo "</div>";
                }
                if(isset($_SESSION["nopic"]) and $_SESSION["nopic"] === "Sorry, only JPG, JPEG, PNG files are allowed.") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nopic']}</p>";
                    echo "</div>";
                }
                if(isset($_SESSION["nopic"]) and $_SESSION["nopic"] === "Your Pic Was Changed Successfully") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nopic']}. You May need to refresh this page.</p>";
                    echo "</div>";
                }
                if(isset($_SESSION["nopic"]) and $_SESSION["nopic"] === "Unknown Error Changing Pic") {
                    echo "<div class='alert alert-danger alert-dismissible'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                    echo "<p>${_SESSION['nopic']}</p>";
                    echo "</div>";
                }
            ?>
            <h1>Change Your Pic</h1>
            <form action="change-pic.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="form-control" type="file" name="image" id="image">
                    <br>
                    <button class="btn btn-success form-control" type="submit">Change Pic</button>
                </div>
            </form>
            <a href="index.php"><button class="btn btn-danger">Back to Profile</button></a>
        </div>
    </div>
</body>

</html>