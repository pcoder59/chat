<?php
    session_start();
    $deleteid = $_GET["id"];
    $deletename = $_GET["roomname"];
    $conn = new mysqli("localhost", "chat", "chat123@here321", "chat");
    if($conn->connect_error) {
        $_SESSION["notfound"] = "Connection Error";
        header("location: chatrooms.php");
        die();
    } else {
        $query = "delete from chatrooms where roomid = '${deleteid}'";
        if($conn->query($query)) {
            $query = "drop table chat"."${deleteid}";
            if($conn->query($query)) {
                $file = "../../chat/img/" . "${deleteid}";
                if (file_exists($file)) {
                    unlink($file);
                }
                $query = "drop table ${deletename}chat";
                if($conn->query($query)) {
                    echo "${deletename}chat";
                    $_SESSION["notfound"] = "Success";
                    header("location: chatrooms.php");
                    die();
                }
                else {
                    echo $conn->error;
                    $_SESSION["notfound"] = "Database Error";
                    //header("location: chatrooms.php");
                    die();
                }
            }
            else {
                echo $conn->error;
                $_SESSION["notfound"] = "Database Error";
                //header("location: chatrooms.php");
                die();
            }
        } else {
            $_SESSION["notfound"] = "Cannot Delete";
            header("location: chatrooms.php");
            die();
        }
    }