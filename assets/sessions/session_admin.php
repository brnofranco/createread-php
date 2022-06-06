<?php
    include("./assets/database/connection.php");

    session_start();

    if ($_SESSION["email"]!="admin@admin.com") {
       header("Location: ./"); 
    }
?>