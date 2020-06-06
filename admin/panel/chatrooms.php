<?php
    session_start();
    if(!isset($_SESSION["login"]) || !isset($_SESSION["username"])) {
        $_SESSION["error"] = "Please Login to Continue";
        header("location: ../");
        die();
    }
    $conn = new mysqli("localhost","chat","chat123@here321","chat");
    $query = "select roomid, roomname, roomdescription from chatrooms";
    $result = $conn->query($query);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Chatrooms</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>



    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/25-01.jpg" />
                    </a>
                </div>

                <span class="logout-spn">
                    <a href="logout.php" style="color:#fff;">LOGOUT</a>

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="index.php"><i class="fa fa-desktop "></i>Dashboard </a>
                    </li>
                    <li class="active-link">
                        <a href="chatrooms.php"><i class="fa fa-table "></i>Create Chatrooms  </a>
                    </li>
                    <li>
                        <a href="users.php"><i class="fa fa-edit "></i>See Users </a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Create and Manage Chatrooms</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Create Chat</h5>
                        <?php
                            if(isset($_SESSION["file"]) && $_SESSION["file"] == "File is not an image.") {
                                $_SESSION["file"] = "";
                                echo "<div class='alert alert-danger alert-dismissible'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                                echo "<p>File is not an image.</p>";
                                echo "</div>";
                            }
                            if(isset($_SESSION["file"]) && $_SESSION["file"] == "Room Already Exists") {
                                $_SESSION["file"] = "";
                                echo "<div class='alert alert-danger alert-dismissible'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                                echo "<p>Room Already Exists</p>";
                                echo "</div>";
                            }
                            if(isset($_SESSION["file"]) && $_SESSION["file"] == "Insert Error") {
                                $_SESSION["file"] = "";
                                echo "<div class='alert alert-danger alert-dismissible'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                                echo "<p>Insert Error</p>";
                                echo "</div>";
                            }
                            if(isset($_SESSION["file"]) && $_SESSION["file"] == "Error Uploading Files!") {
                                $_SESSION["file"] = "";
                                echo "<div class='alert alert-danger alert-dismissible'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                                echo "<p>Error Uploading Files!</p>";
                                echo "</div>";
                            }
                            if(isset($_SESSION["file"]) && $_SESSION["file"] == "Success") {
                                $_SESSION["file"] = "";
                                echo "<div class='alert alert-danger alert-dismissible'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                                echo "<p>The Newchatroom Was Successfully Created.</p>";
                                echo "</div>";
                            }
                            if(isset($_SESSION["file"]) && $_SESSION["file"] == "Database Failure") {
                                $_SESSION["file"] = "";
                                echo "<div class='alert alert-danger alert-dismissible'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                                echo "<p>Database Failure</p>";
                                echo "</div>";
                            }
                        ?>
                        <form action="create-room.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="image">Chatroom Avatar (optional):</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <label for="image">Chatroom Name:</label>
                                <input type="text" class="form-control" placeholder="Chat Name" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="image">Chatroom Description:</label>
                                <input type="text" class="form-control" placeholder="Chat Description" id="description" name="description">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success form-control" id="submit" name="submit">Create Chat</button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            if(isset($_SESSION["notfound"]) && $_SESSION["notfound"] == "Connection Error") {
                                $_SESSION["notfound"] = "";
                                echo "<div class='alert alert-danger alert-dismissible'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                                echo "<p>Connection Error</p>";
                                echo "</div>";
                            }
                            if(isset($_SESSION["notfound"]) && $_SESSION["notfound"] == "Cannot Delete") {
                                $_SESSION["notfound"] = "";
                                echo "<div class='alert alert-danger alert-dismissible'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                                echo "<p>Cannot Delete</p>";
                                echo "</div>";
                            }
                            if(isset($_SESSION["notfound"]) && $_SESSION["notfound"] == "Success") {
                                $_SESSION["notfound"] = "";
                                echo "<div class='alert alert-danger alert-dismissible'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                                echo "<p>The Chatroom Was Successfully Deleted</p>";
                                echo "</div>";
                            }
                            if(isset($_SESSION["notfound"]) && $_SESSION["notfound"] == "Database Error") {
                                $_SESSION["notfound"] = "";
                                echo "<div class='alert alert-danger alert-dismissible'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
                                echo "<p>Database Error</p>";
                                echo "</div>";
                            }
                        ?>
                        <h5>Rooms</h5>
                        <?php
                            echo "<table class='table'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Image</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Description</th>";
                                        echo "<th>Delete</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                        echo "<td>";
                                            echo "<img class='tableimage' src='../../chat/img/" . "${row['roomid']}'>";
                                        echo "</td>";
                                        echo "<td>";
                                            echo "${row['roomname']}";
                                        echo "</td>";
                                        echo "<td>";
                                            echo "${row['roomdescription']}";
                                        echo "</td>";
                                        echo "<td>";
                                            echo "<a href='delete.php?id=${row['roomid']}&roomname=${row['roomname']}'>Delete</a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                        ?>
                    </div>
                        
                </div>        

            </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <div class="footer">


        <div class="row">
            <div class="col-lg-12">
                &copy; 2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;"
                    target="_blank">www.binarytheme.com</a>
            </div>
        </div>
    </div>


    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

</html>