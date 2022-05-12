<?php include("./assets/sessions/session.php"); ?>
<!DOCTYPE html>
<head>
    <?php include(".\assets\utils\head.php"); ?>
    <link href="toastr.css" rel="stylesheet"/>
    <title>Login - Reciclottech</title>
</head>
<body>
    <?php include(".\assets\utils\header.php"); ?>
    <main>
        <div class="main-content">
            <h1>
                Faça seu login ou cadastre-se agora.
            </h1>
            <section class="main-content-info">
                <form method="POST">
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

                        <a href='signin.php'>Registrar agora</a>
                        <input type="submit" name="submit" value="Logar" />
                    </section>
                </form>
            </section>
        </div>
    </main>
    <footer>
        <?php
            setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            echo strftime('<h4>Jundiaí, %d de %B de %Y</h4>', strtotime('today'));
        ?>
        <span> - </span>
        <h4>Desenvolvido por Bruno Franco e Murilo Carbol.</h4>
    </footer>
</body>
</html>

<?php
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }

    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }

    @$submit = $_POST["submit"];
    
    if ($submit) {
        session_start();

        $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
        $data = mysqli_fetch_array($query);

        if ($email == $data["email"] && $password == $data["password"]) {
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
            header("Location:index.php");
        } else {
            header("Location:login.php");
        }
    }
?>