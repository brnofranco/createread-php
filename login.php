<?php 
    include("./assets/sessions/session.php");
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
    } else {
        $error = false;
    }

    if (isset($_GET['success'])) {
        $success = $_GET['success'];
    } else {
        $success = false;
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
                <form method="POST">
                    <section class="form-data">

                        <?php
                            if ($success) {
                                echo "<span class='connection-success'>Conta criada com sucesso! Entre para continuar.</span><br>";
                            }
                        ?>
                        
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
                        
                        <p>Não tem cadastro? <a class="redirect-link" href='signin.php'>Registrar agora</a></p>

                        <input class="button-fill-green" type="submit" name="submit" value="Entrar" />
                    </section>
                </form>
            </section>
            
        </div>
    </main>

<?php
   @$submit = $_POST["submit"];

   @$email = $_POST["email"];
   @$password = $_POST["password"];
   
   if ($submit) {
       if ($submit == "Entrar") {
            $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
            $data = mysqli_fetch_array($query);
    
            if ($email == $data["email"] && $password == $data["password"]) {
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                header("Location: ./");
            } else {
                header ("Location: login.php?error=1");
            }
       }
   }
?>

</body>
</html>