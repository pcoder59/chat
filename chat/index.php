<?php
    session_start();
    if(!isset($_SESSION["login"]) || !isset($_SESSION["username"])) {
        $_SESSION["error"] = "Please Log In to Continue";
        header("location: ../login/");
        die();
    }
    $conn = new mysqli("localhost", "chat", "chat123@here321", "chat");
    if($conn->connect_error) {
        echo "<div class='alert alert-danger alert-dismissible'>";
        echo "<button type='button' class='close' data-dismiss='alert'>&times</button>";
        echo "<p>Some Error Has Occured</p>";
        echo "</div>";
    } else {
        if(!isset($_GET['id'])) {
            header("location: chatrooms.php");
            die();
        }
        $roomid = $_GET['id'];
        $query = "select * from chatrooms where roomid='${roomid}'";
        $result = $conn->query($query);
        while($row = $result->fetch_assoc()) {
            $id = $row['roomid'];
            $name = $row['roomname'];
            $description = $row['roomdescription'];
            $time = $row['createdtime'];
        }
        
        $query = "select * from chat"."${roomid}";
        $result = $conn->query($query);
        $flag = 0;
        while($row = $result->fetch_assoc()) {
            if($row['username'] === $_SESSION["username"]){
                $flag = 1;
            }
        }
        if($flag === 0) {
            $query = "insert into chat"."${roomid}"." (username) values ('${_SESSION['username']}')";
            $conn->query($query);
        }
        $username = $_SESSION["username"];
    }
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>Chat</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
</head>
<!--Coded With Love By Mutiullah Samim-->

<body>
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-8 col-xl-6 chat">
                <div class="card">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <img src="<?="../chat/img/${id}"?>" class="rounded-circle user_img">
                                <span class="online_icon"></span>
                            </div>
                            <div class="user_info">
                                <span><?=$name?></span>
                                <p> Messages</p>
                            </div>
                        </div>
                        <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="action_menu">
                            <ul>
                                <a href="../profile/">
                                    <li><i class="fas fa-user-circle"></i> Your Profile</li>
                                    <li><i class="fas fa-user-circle"></i><a href="leave-chat.php?id=<?=$roomid?>"> Leave Chat</a></li>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body msg_card_body">
                        
                    </div>
                    <div class="card-footer">
                        <form>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text attach_btn"></span>
                                </div>
                                <textarea name="" class="form-control type_msg" placeholder="Type your message..."></textarea>
                                <div class="input-group-append">
                                    <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <button class="btn btn-danger"><a href="leave-chat.php?id=<?=$roomid?>">Leave Chat</a></button>
                </div>
            </div>
            <div class="col-md-4 col-xl-3 chat">
                <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header">
                        <div class="input-group">
                            <input type="button" value="Users" name="" class="form-control search">
                        </div>
                    </div>
                    <div class="card-body contacts_body">
                        <ui class="contacts">
                            
                        </ui>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>

        </div>
    </div>
    <script>
        var roomid = "<?=$roomid?>";
        var id = "<?=$name?>";
        var user = "<?=$username?>";
    </script>
    <script src="js/script.js"></script>
</body>

</html>