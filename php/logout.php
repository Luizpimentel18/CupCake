<?php
    session_start();
    unset($_SESSION["name"]);
    unset($_SESSION["email"]);
    unset($_SESSION["tipo"]);
    session_destroy();
    header("location: login.php");
    exit;