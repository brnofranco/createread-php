<?php 
    include("./assets/sessions/session.php");
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
    } else {
        $error = false;
    }
?>
<!DOCTYPE html>
<head>
    <?php include(".\assets\utils\head.php"); ?>
    <link href="toastr.css" rel="stylesheet"/>
    <title>Login - Reciclottech</title>
</head>
<body>
    <?php include(".\assets\utils\header.php");?>
    <main>
        <div class="main-content">
            <section class="main-content-info">
                <form method="POST" action="./assets/database/login_session.php">
                    <section class="form-data">
                        <h2>Fazer Login</h2>
                        
                        <div class="input-form">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" required>
                        </div>

                        <div class="input-form">
                            <label for="password">Senha</label>
                            <input type="password" name="password" id="password" required>
                        </div>

                        <?php
                            if ($error) {
                                echo "<span class='connection-error'>E-mail ou senha inválidos!</span><br>";
                            }
                        ?>
                        
                        <span>Não tem cadastro? <a class="register-link" href='signin.php'>Registrar agora</a></span>

                        <input type="submit" name="submit" value="Entrar" />
                    </section>
                </form>
            </section>
            
        </div>
    </main>

<?php
   /*  if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }

    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }

    @$submit = $_POST["submit"];
    
    if ($submit) {
        $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
        $data = mysqli_fetch_array($query);

        if ($data["email"] == null) {
            if ($email == $data["email"] && $password == $data["password"]) {
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                header("Location: ./");
            }
        } else {
            echo "<script language='javascript'>";
            echo "alert('Login ou senha inválidos!');";
            echo "</script>";
        }
    } */
?>

</body>
</html>