<?php
    session_start();
    $name = $_REQUEST["id"];
    $conn = new mysqli("localhost", "chat", "chat123@here321", "chat");
    $query = "select username, message, timestamp from ".$name."chat";
    $result = $conn->query($query);
    $res = "";
    while($row=$result->fetch_assoc()) {
        if($row["username"] != $_SESSION["username"]) {
            $res .= "<div class='d-flex justify-content-start mb-4'>";
                $res .= "<div class='img_cont_msg'>";
                    $res .= "<img src='../profile/images/users/".$row['username']."' class='rounded-circle user_img_msg'>";
                $res .= "</div>";
                $res .= "<div class='msg_cotainer'>";
                    $res .= "<p>${row['message']}</p>";
                $res .= "</div>";
            $res .= "</div>";
        } else {
            $res .= "<div class='d-flex justify-content-end mb-4'>";
                $res .= "<div class='msg_cotainer_send'>";
                    $res .= "<p>${row['message']}</p>";
                $res .= "</div>";
                $res .= "<div class='img_cont_msg'>";
                    $res .= "<img src='../profile/images/users/".$row['username']."' class='rounded-circle user_img_msg'>";
                $res .= "</div>";
            $res .= "</div>";
        }
    }
    echo $res;
?>