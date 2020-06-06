<?php
    session_start();
    $to = "admin@premrajr.com";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $msg = $_POST["issues"];
    $sub = "Contact From Nerd's Chat";
    $message = "Name: ".$name."\nEmail: ".$email."\nMessage: ".$msg;
    mail($to, $sub, $message);
    $_SESSION["mailed"] = "sent";
    header("location: index.php");
    die();