<?php
    session_start();
    $id = $_GET["id"];
    $username = $_SESSION["username"];
    $conn = new mysqli("localhost", "chat", "chat123@here321", "chat");
    $query="delete from chat" . $id . " where username='" . "$username'";
    if($conn->query($query)) {
        header("location: chatrooms.php");
        die();
    } else {
        echo $conn->error;
    }
?>