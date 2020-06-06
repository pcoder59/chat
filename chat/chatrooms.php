<?php
    session_start();
    if(!isset($_SESSION["login"]) || !isset($_SESSION["username"])) {
        $_SESSION["error"] = "Please Log In to Continue";
        header("location: ../login/");
        die();
    }
    $conn = new mysqli("localhost", "chat", "chat123@here321", "chat");
    if($conn->connect_error) {
        echo "<div class='alert alert-danger alert-dismissible'>";
        echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
        echo "<p>Some Error Has Occured</p>";
        echo "</div>";
    } else {
        $query = "select * from chatrooms";
        $result = $conn->query($query);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Rooms</title>
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

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Chat</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../profile/">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

        <?php
            if($result != FALSE) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='media border p-3'>";
                    echo "<img src='../chat/img/${row['roomid']}' class='mr-3 mt-3 rounded-circle' style='width:60px;'>";
                    echo "<div class='media-body'>";
                    echo "<a href='index.php?id=${row['roomid']}'>";
                        echo "<h4>${row['roomname']} <small><i>Created on ${row['createdtime']}</i></small></h4>";
                    echo "</a>";
                    echo "<p>${row['roomdescription']}</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        ?>

</body>

</html>
