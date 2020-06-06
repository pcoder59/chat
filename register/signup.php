<?php
    session_start();
    $path = $_FILES["image"]["name"];
    $conn = new mysqli("localhost","chat","chat123@here321","chat");
    if($conn->connect_error) {
        $_SESSION["errorMessage"] = "Connection Error";
        $_SESSION["error"] = $conn->connection_error;
        header("location: index.php");
        die();
    }
    function validateMember()
    {
        $valid = true;
        foreach ($_POST as $key => $value) {
            if (empty($_POST[$key])) {
                $valid = false;
            }
        }
        
        if($valid == true) {
            if ($_POST['password'] != $_POST['confirm_password']) {
                $_SESSION["errorMessage"] = 'Passwords should be same.';
                $valid = false;
            }
            
            if (! isset($_SESSION["errorMessage"])) {
                if (! isset($_POST["terms"])) {
                    $_SESSION["errorMessage"] = "Accept terms and conditions.";
                    $valid = false;
                }
            }
        }
        else {
            $_SESSION["errorMessage"] = "All fields are required.";
            header("location: index.php");
            die();
        }
        
        if ($valid == false) {
            header("location: index.php");
            die();
        }
        $_SESSION["errorMessage"] = "";
        return;
    }
    validateMember();
        
    $username = filter_var($_POST["Username"], FILTER_SANITIZE_STRING);
    $displayName = $username;
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    function isMemberExists($conn, $username)
    {
        $query = "select * FROM users WHERE username='${username}'";
        $result = $conn->query($query);
        if($result->num_rows === '0')
            $exists = 1;
        else
            $exists = 0;
        $query = "select * FROM admins WHERE username='${username}'";
        $result = $conn->query($query);
        if($result->num_rows === '0')
            $exists = 1;
        else
            $exists = 0;
        return $exists;
    }

    function insertMemberRecord($conn, $username, $displayName, $password)
    {
        $passwordHash = md5($password);
        $query = "INSERT INTO users (username, displayname, password) VALUES ('${username}', '${displayName}', '${passwordHash}')";
        $result = $conn->query($query);
        if($result === TRUE){
            $_SESSION["created"] = TRUE;
            return 0;
        }
        else {
            $_SESSION["errorMessage"] = "Error";
            $_SESSION["error"] = $conn->error;
            return 1;
        }
    }
    
    if (empty($_SESSION["errorMessage"])) {
        $memberCount = isMemberExists($conn, $username);
        if ($memberCount == 0) {
            $insertId = insertMemberRecord($conn, $username, $displayName, $password);
            if ($insertId === 0) {
                $_SESSION["errorMessage"] = "";
                $_SESSION["message"] = "";
                if(isset($path) && !empty($path)) {
                    echo "Here";
                    $target_dir = "../profile/images/users/";
                    $query = "select username from users where username='${username}'";
                    $result = $conn->query($query);
                    while($row = $result->fetch_assoc()) {
                        $target_file = $target_dir . $row["username"];
                        $check = getimagesize($_FILES["image"]["tmp_name"]);
                        if($check !== false) {
                            echo "CheckHere";
                            if ($_FILES["image"]["size"] > 5000000) {
                                echo "SizeHere";
                                $_SESSION["imagesize"] = "Sorry, Filesize Must Be less than 5 MB";
                                $target_dir = "../profile/images/users/";
                                $query = "select username from users where username='${username}'";
                                $result = $conn->query($query);
                                while($row = $result->fetch_assoc()) {
                                    $target_file = $target_dir . $row["username"];
                                    copy("../profile/images/profile.png", $target_file);
                                }
                                header("Location: ../login/");
                                die();
                            } 
                            $imageFileType = strtolower(pathinfo($path,PATHINFO_EXTENSION));
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                                echo "TypeHere";
                                $_SESSION["imagetype"] = "Sorry, only JPG, JPEG, PNG files are allowed.";
                                $target_dir = "../profile/images/users/";
                                $query = "select username from users where username='${username}'";
                                $result = $conn->query($query);
                                while($row = $result->fetch_assoc()) {
                                    $target_file = $target_dir . $row["username"];
                                    copy("../profile/images/profile.png", $target_file);
                                }
                                header("Location: ../login/");
                                die();
                            } 
                            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                                echo "File Successfully Uploaded";
                                header("Location: ../login/");
                                die();
                            } else {
                                echo "Problem";
                                $_SESSION["uploadimage"] = "There was an Error Uploading The Image";
                                $target_dir = "../profile/images/users/";
                                $query = "select username from users where username='${username}'";
                                $result = $conn->query($query);
                                while($row = $result->fetch_assoc()) {
                                    $target_file = $target_dir . $row["username"];
                                    copy("../profile/images/profile.png", $target_file);
                                }
                                header("Location: ../login/");
                                die();
                            }
                        } else {
                            $_SESSION["notimage"] = "File is not Image";
                            $target_dir = "../profile/images/users/";
                            $query = "select username from users where username='${username}'";
                            $result = $conn->query($query);
                            while($row = $result->fetch_assoc()) {
                                $target_file = $target_dir . $row["username"];
                                copy("../profile/images/profile.png", $target_file);
                            }
                            header("Location: ../login/");
                            die();
                        }
                    }
                } else {
                    $target_dir = "../profile/images/users/";
                    $query = "select username from users where username='${username}'";
                    $result = $conn->query($query);
                    while($row = $result->fetch_assoc()) {
                        $target_file = $target_dir . $row["username"];
                        copy("../profile/images/profile.png", $target_file);
                    }
                }
                header("Location: ../login/");
                die();
            }
            else {
                header("location: index.php");
                die();
            }
        }
        else {
            $_SESSION["errorMessage"] = "User already exists.";
            header("location: index.php");
            die();
        }
    }