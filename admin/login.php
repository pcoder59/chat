<?php
    session_start();
    if(count($_POST)>0) {
        $conn = new mysqli("localhost","chat","chat123@here321","chat");
        $query = "SELECT * FROM admins WHERE username='" . $_POST["username"] . "' and password = '". md5($_POST["pass"])."'";
        $result = $conn->query($query);
        $count  = $result->num_rows;
        if($count==0) {
            $_SESSION["message"] = "Invalid Username or Password!";
            header("location: index.php");
            die();
        } else {
            $_SESSION["message"] = "You are successfully authenticated!";
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["admin"] = TRUE;
            $_SESSION["login"] = TRUE;
            header("location: panel/");
            die();
        }
    } else {
        $_SESSION["message"] = "nodetails";
        header("location: index.php");
        die();
    }