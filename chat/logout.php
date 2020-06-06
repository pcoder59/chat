<?php
    session_start();
    $_SESSION["login"] = FALSE;
    $_SESSION["username"] = "";
    session_destroy();
    header("location: ../");
    die();