<?php
    $conn = new mysqli("localhost", "chat", "chat123@here321", "chat");
    switch($_REQUEST['action']) {
        case "sendMessage":
            $chat = $_REQUEST["id"];
            $user = $_REQUEST["user"];
            $timestamp = date("Y-m-d H:i:s");
            $query = "insert into " . "${chat}" . "chat (username, message, timestamp) values ('${user}', '${_REQUEST['message']}', '${timestamp}')";
            $conn->query($query);
        break;

        case "loadMessage":
            $chat = $_REQUEST["id"];
            $user = $_REQUEST["user"];
            $query = "select username, message, timestamp from " . "${chat}" . "chat";
            $chat = "";
            $result = $conn->query($query);
            while($row = $result->fetch_assoc()) {
                $chat .= $row["message"];
            }
            echo $chat;
        break;
    }
?>