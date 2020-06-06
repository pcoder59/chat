<?php
    session_start();
    $_SESSION["created"] = "";
    if(count($_POST)>0) {
        $check = md5($_POST["pass"]);
        $conn = new mysqli("localhost","chat","chat123@here321","chat");
        $query = "SELECT * FROM users WHERE username='" . $_POST["username"] . "' and password = '". $check . "'";
        $result = $conn->query($query);
        $count  = $result->num_rows;
        if($count==0) {
            $_SESSION["userpass"] = "Invalid Username or Password!";
            header("location: index.php");
            die();
        } else {
            echo "Here";
            $_SESSION["message"] = "You are successfully authenticated!";
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["login"] = TRUE;
            header("location: ../chat/chatrooms.php");
            die();
        }
    } else {
        $_SESSION["message"] = "nodetails";
        header("location: index.php");
        die();
    }