<?php
    include("./assets/database/connection.php");

    session_start();

    if (!isset($_SESSION["email"])) {
       header("Location: login.php"); 
    }
?>