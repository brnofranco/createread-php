<?php
    $con = mysqli_connect('localhost','root','','reciclottech');

    session_start();

    @$submit = $_POST["submit"];

    $email = $_POST["email"];
    $password = $_POST["password"];
    
    if ($submit) {
        $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
        $data = mysqli_fetch_array($query);

        if ($email == $data["email"] && $password == $data["password"]) {
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
            header("Location: ../..");
        } else {
            header ("Location: ../../login.php?error=1");
        }
    }

?>