<?php
    session_start();
    $username = $_SESSION["username"];
    $old_password = md5($_POST["current_password"]);
    $conn = new mysqli("localhost", "chat", "chat123@here321", "chat");
    $query = "select password from users where username='${username}'";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc()) {
        $password = $row["password"];
        if($password != $old_password) {
            $_SESSION["nopass"] = "Your Current Password is Incorrect";
            header("location: Change_Password.php");
            die();
        }
    }
    $new_password = md5($_POST["new_password"]);
    $confirm_password = md5($_POST["new_password_confirm"]);
    if($new_password != $confirm_password) {
        $_SESSION["nopass"] = "Your Passwords don't match";
        header("location: Change_Password.php");
        die();
    } else {
        $query = "update users set password='${new_password}' where username='${username}'";
        if($conn->query($query)) {
            $_SESSION["nopass"] = "Your Password Changed Successfully";
            header("location: Change_Password.php");
            die();
        } else {
            $_SESSION["nopass"] = "Unknown Error";
            header("location: Change_Password.php");
            die();
        }
    }