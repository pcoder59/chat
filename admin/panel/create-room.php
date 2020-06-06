<?php
    session_start();
    $_SESSION["file"] = "";
    if(!isset($_SESSION["login"]) || !isset($_SESSION["username"])) {
        $_SESSION["error"] = "Please Login to Continue";
        header("location: ../");
        die();
    }
    $path = $_FILES["image"]["name"];
    if(isset($path) && !empty($path)) {
        $target_dir = "../../chat/img/";
        $uploadOk = 1;
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check === false) {
            $uploadOk = 0;
        }
        if($uploadOk === 0) {
            $_SESSION["file"] = "File is not an image.";
            header("location: chatrooms.php");
            die();
        }
    } else {
        $target_dir = "../../chat/img/";
        $uploadOk = 1;
    }
    $conn = new mysqli("localhost","chat","chat123@here321","chat");
    $chatname = $_POST["name"];
    $chatname = str_replace(' ', '_', $chatname);
    $query = "select roomid FROM chatrooms WHERE roomname = '${chatname}'";
    $result = $conn->query($query);
    if($result->num_rows > 0) {
        $_SESSION["file"] = "Room Already Exists";
        header("location: chatrooms.php");
        die();
    } else {
        $chatdescription = $_POST["description"];
        date_default_timezone_set('Asia/Kolkata');
        $time = date("H:i:s");
        $query = "INSERT INTO chatrooms (roomname, roomdescription, createdtime) VALUES ('${chatname}', '${chatdescription}', '${time}')";
        if($conn->query($query)) {
            if(isset($path) && !empty($path)) {
                $query = "select roomid FROM chatrooms WHERE roomname = '${chatname}'";
                $result = $conn->query($query);
                while($row = $result->fetch_assoc()) {
                    $target_file =$target_dir . $row["roomid"];
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $sql = "CREATE TABLE chat".$row['roomid']." (
                            username VARCHAR(25) NOT NULL
                            )";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "CREATE TABLE ".$chatname."chat (
                                    username VARCHAR(25) NOT NULL,
                                    message TEXT,
                                    timestamp TEXT,
                                    messageid INT(2) AUTO_INCREMENT,
                                    PRIMARY KEY (messageid)
                                    )";
                                    if($conn->query($sql)) {
                                        $_SESSION["file"] = "Success";
                                        header("location: chatrooms.php");
                                        die();
                                    } else {
                                        echo $conn->error;
                                        $_SESSION["file"] = "Database Failure";
                                        //header("location: chatrooms.php");
                                        die();
                                    }
                            } else {
                                echo $conn->error;
                                $_SESSION["file"] = "Database Failure";
                                //header("location: chatrooms.php");
                                die();
                            }
                    } else {
                        $_SESSION["file"] = "Error Uploading Files!";
                        header("location: chatroooms.php");
                        die();
                    }
                }
            } else {
                $query = "select roomid FROM chatrooms WHERE roomname = '${chatname}'";
                $result = $conn->query($query);
                while($row = $result->fetch_assoc()) {
                    $target_file =$target_dir . $row["roomid"];
                    copy("../../profile/images/pro.png", $target_file);
                    $sql = "CREATE TABLE chat".$row['roomid']." (
                        username VARCHAR(25) NOT NULL
                        )";
                    if ($conn->query($sql) === TRUE) {
                        $sql = "CREATE TABLE ".$chatname."chat (
                            username VARCHAR(25) NOT NULL,
                            message TEXT,
                            timestamp TEXT,
                            messageid INT(2) AUTO_INCREMENT,
                            PRIMARY KEY (messageid)
                            )";
                            if($conn->query($sql)) {
                                $_SESSION["file"] = "Success";
                                header("location: chatrooms.php");
                                die();
                            } else {
                                echo $conn->error;
                                $_SESSION["file"] = "Database Failure";
                                //header("location: chatrooms.php");
                                die();
                            }
                    } else {
                        echo $conn->error;
                        $_SESSION["file"] = "Database Failure";
                        //header("location: chatrooms.php");
                        die();
                    }
                }
            }
        }
        else {
            $_SESSION["file"] = "INSERT ERROR";
            $_SESSION["error"] = $conn->error;
            header("location: chatrooms.php");
            die();
        }
    }
    