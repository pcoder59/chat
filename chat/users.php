<?php
    $roomid = $_REQUEST["id"];
    $conn = new mysqli("localhost", "chat", "chat123@here321", "chat");
    $query = "select * from chat"."${roomid}";
    $result = $conn->query($query);
    $res = "";
    while($row = $result->fetch_assoc()) {
        $res .= "<li class='active'>";
            $res .= "<div class='d-flex bd-highlight'>";
                $res .= "<div class='img_cont'>";
                    $res .= "<img src='../profile/images/users/".$row['username']."' class='rounded-circle user_img_msg'>";
                    $res .= "<span class='online_icon'></span>";
                $res .= "</div>";
                $res .= "<div class='user_info'>";
                    $res .= "<span>${row['username']}</span>";
                    $res .= "<p>${row['username']} is online</p>";
                $res .= "</div>";
            $res .= "</div>";
        $res .= "</li>";
    }
    echo $res;
?>