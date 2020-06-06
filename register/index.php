<?php
    session_start();
?>
<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>Creative Colorlib SignUp Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <?php
            if(isset($_SESSION["errorMessage"]) && $_SESSION["errorMessage"] == "All fields are required.") {
                $_SESSION["errorMessage"] = "";
                echo "<div class='alert alert-danger alert-dismissible'>";
                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                echo "<p>All fields are required.</p>";
                echo "</div>";
            }
            if(isset($_SESSION["errorMessage"]) && $_SESSION["errorMessage"] == 'Passwords should be same.') {
                $_SESSION["errorMessage"] = "";
                echo "<div class='alert alert-danger alert-dismissible'>";
                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                echo "<p>Passwords should be same.</p>";
                echo "</div>";
            }
            if(isset($_SESSION["errorMessage"]) && $_SESSION["errorMessage"] == "Accept terms and conditions.") {
                $_SESSION["errorMessage"] = "";
                echo "<div class='alert alert-danger alert-dismissible'>";
                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                echo "<p>Accept terms and conditions.</p>";
                echo "</div>";
            }
            if(isset($_SESSION["errorMessage"]) && $_SESSION["errorMessage"] == "Connection Error") {
                $_SESSION["errorMessage"] = "";
                echo "<div class='alert alert-danger alert-dismissible'>";
                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                echo "<p>Connection Error</p>";
                echo "<p>${_SESSION['error']}</p>";
                echo "</div>";
            }
            if(isset($_SESSION["errorMessage"]) && $_SESSION["errorMessage"] == "User already exists.") {
                $_SESSION["errorMessage"] = "";
                echo "<div class='alert alert-danger alert-dismissible'>";
                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                echo "<p>User already exists.</p>";
                echo "</div>";
            }
            if(isset($_SESSION["errorMessage"]) && $_SESSION["errorMessage"] == "Error" && isset($_SESSION['error'])) {
                $_SESSION["errorMessage"] = "";
                echo "<div class='alert alert-danger alert-dismissible'>";
                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                echo "<p>Error</p>";
                echo "<p>${_SESSION['error']}</p>";
                echo "</div>";
            }
        ?>
        <h1>SignUp Form</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="signup.php" method="post" enctype="multipart/form-data">
                    <input class="text" value="<?php if(isset($_POST['Username'])) echo $_POST['Username'];?>" type="text" name="Username" placeholder="Username" required="">
                    <br>
                    <select name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="secret">Secret</option>
                    </select>
                    <br><br>
                    <label for="image">Profile Pic(optional):</label>
                    <br>
                    <input type="file" name="image" id="image">
                    <br><br>
                    <input class="text" type="password" name="password" placeholder="Password" required="">
                    <input class="text w3lpass" type="password" name="confirm_password" placeholder="Confirm Password" required="">
                    <div class="wthree-text">
                        <label class="anim">
							<input name="terms" type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
                        <div class="clear"> </div>
                    </div>
                    <input type="submit" value="SIGNUP">
                </form>
                <p>Have an Account? <a href="../login"> Login Now!</a></p>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
        </div>
        <!-- //copyright -->
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- //main -->
</body>

</html>