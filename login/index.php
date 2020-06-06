<?php
    session_start();
    if(isset($_SESSION["login"]) || isset($_SESSION["username"]) and !isset($_SESSION["admin"])) {
        header("location: ../chat/chatrooms.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="login.php" method="POST">
                    <?php
                        if(isset($_SESSION["created"]) and $_SESSION["created"] === TRUE) {
                            $_SESSION["created"] = "";
                            echo "<div class='alert alert-danger alert-dismissible'>";
                            echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                            echo "<p>Your Account Was Created. You can now Log In</p>";
                            echo "</div>";
                        }
                        if(isset($_SESSION["message"]) and $_SESSION["message"] === "nodetails") {
                            $_SESSION["message"] = "";
                            echo "<div class='alert alert-danger alert-dismissible'>";
                            echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                            echo "<p>Please Enter All the details</p>";
                            echo "</div>";
                        }
                        if(isset($_SESSION["userpass"]) and $_SESSION["userpass"] === "Invalid Username or Password!") {
                            $_SESSION["userpass"] = "";
                            echo "<div class='alert alert-danger alert-dismissible'>";
                            echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                            echo "<p>Invalid Username or Password!</p>";
                            echo "</div>";
                        }
                        if(isset($_SESSION["error"]) and $_SESSION["error"] === "Please Log In to Continue") {
                            $_SESSION["error"] = "";
                            echo "<div class='alert alert-danger alert-dismissible'>";
                            echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                            echo "<p>Please Log In to Continue</p>";
                            echo "</div>";
                        }
                        if(isset($_SESSION["notimage"]) and $_SESSION["notimage"] === "File is not Image") {
                            $_SESSION["notimage"] = "";
                            echo "<div class='alert alert-danger alert-dismissible'>";
                            echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                            echo "<p>File is not Image</p>";
                            echo "<p>Your Account Was Created Without Profile Pic. Please Login and Add it in Settings.";
                            echo "</div>";
                        }
                        if(isset($_SESSION["imagesize"]) and $_SESSION["imagesize"] === "Sorry, Filesize Must Be less than 5 MB") {
                            $_SESSION["imagesize"] = "";
                            echo "<div class='alert alert-danger alert-dismissible'>";
                            echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                            echo "<p>Sorry, Filesize Must Be less than 5 MB</p>";
                            echo "<p>Your Account Was Created Without Profile Pic. Please Login and Add it in Settings.";
                            echo "</div>";
                        }
                        if(isset($_SESSION["imagetype"]) and $_SESSION["imagetype"] === "Sorry, only JPG, JPEG, PNG files are allowed.") {
                            $_SESSION["imagetype"] = "";
                            echo "<div class='alert alert-danger alert-dismissible'>";
                            echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                            echo "<p>Sorry, only JPG, JPEG, PNG files are allowed.</p>";
                            echo "<p>Your Account Was Created Without Profile Pic. Please Login and Add it in Settings.";
                            echo "</div>";
                        }
                        if(isset($_SESSION["uploadimage"]) and $_SESSION["uploadimage"] === "There was an Error Uploading The Image") {
                            $_SESSION["uploadimage"] = "";
                            echo "<div class='alert alert-danger alert-dismissible'>";
                            echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                            echo "<p>There was an Error Uploading The Image</p>";
                            echo "<p>Your Account Was Created Without Profile Pic. Please Login and Add it in Settings.";
                            echo "</div>";
                        }
                    ?>
                    <span class="login100-form-title">
						Member Login
					</span>

                    <div class="wrap-input100 validate-input" data-validate="Valid username is required: ex@abc.xyz">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
							Login
						</button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="../register/">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>