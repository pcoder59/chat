<?php
    session_start();
    $username = $_POST["username"];
    $username_now = $_SESSION["username"];
    if(!empty($username)) {
        $conn = new mysqli("localhost", "chat", "chat123@here321", "chat");
        $query = "select username from users where username='${username}'";
        $result = $conn->query($query);
        if($result->num_rows === 0) {
            $query = "select username from admins where username='${username}'";
            $result = $conn->query($query);
            if($result->num_rows === 0) {
                echo "Here";
                $query = "update users set username='${username}' where username='${username_now}'";
                if($conn->query($query)) {
                    $_SESSION["nouser"] = "Your Username Is Updated Successfully.";
                    $_SESSION["username"] = $username;
                    rename("../profile/images/users/".$username_now, "../profile/images/users/".$username);
                    header("location: Change_Username.php");
                    die();
                } else {
                    echo $conn->error;
                    $_SESSION["nouser"] = "Unknown Error";
                    header("location: Change_Username.php");
                    die();
                }
            } else {
                $_SESSION["nouser"] = "Username already Exists. Please enter another username.";
                header("location: Change_Username.php");
                die();
            }
        } else {
            $_SESSION["nouser"] = "Username already Exists. Please enter another username.";
            header("location: Change_Username.php");
            die();
        }
    } else {
        $_SESSION["nouser"] = "Please Enter A Username";
        header("location: Change_Username.php");
        die();
    }