<?php
    session_start();
    if(!isset($_SESSION['login-status']) || !$_SESSION['login-status']) {
        // print_r();
        header("location: auth/login.php");
    }
