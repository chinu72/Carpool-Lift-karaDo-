<?php
    require_once "conn.php";
    session_start();
    if(session_destroy())
    {
        header("Location: minipro/SignLogin/login.php");
    }
?>