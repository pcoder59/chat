<?php
    session_start();
    $path = $_FILES["image"]["name"];
    if(isset($path) and !empty($path)) {
        $target_dir = "../profile/images/users/";
        $target_file = $target_dir.$_SESSION["username"];
        $imageFileType = strtolower(pathinfo($path,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            if ($_FILES["image"]["size"] > 5000000) {
                $_SESSION["nopic"] = "File Size Must Be Less than 5MB";
                header("location: Change_Pic.php");
                die();
            } 
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $_SESSION["nopic"] = "Sorry, only JPG, JPEG, PNG files are allowed.";
                header("location: Change_Pic.php");
                die();
            } 
            if (file_exists($target_file)) {
                unlink($target_file);
            } 
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $_SESSION["nopic"] = "Your Pic Was Changed Successfully";
                header("location: Change_Pic.php");
                die();
            } else {
                $_SESSION["nopic"] = "Unknown Error Changing Pic";
                header("location: Change_Pic.php");
                die();
            }
        } else {
            $_SESSION["nopic"] = "The File is not an Image!";
            header("location: Change_Pic.php");
            die();
        }
    }
    else {
        $_SESSION["nopic"] = "Please Choose a File to Upload";
        header("location: Change_Pic.php");
        die();
    }