<!DOCTYPE html>
<head>
    <?php include(".\assets\utils\head.php"); ?>
    <title>Login - Reciclottech</title>
</head>
<body>
    <?php include(".\assets\utils\header.php"); ?>
    <main>
        <div class="main-content">
            <section class="main-content-info">
                <form method="POST">
                    <section class="form-data">
                        <h2>Criar conta</h2>
                        
                        <div class="input-form">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        
                        <div class="input-form">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                
                        <div class="input-form">
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" id="cep" required>
                        </div>

                        <div class="input-form">
                            <label for="password">Senha</label>
                            <input type="password" name="password" id="password" required>
                        </div>

                        <p>Já tem cadastro? <a class="register-link" href='login.php'>Logar agora</a></p>

                        <input type="submit" name="submit" value="Cadastrar" />
                    </section>
                </form>

            </section>
            
        </div>
        
    </main>
</body>
</html>

<?php
    include("assets/database/connection.php");

    if (isset($_POST["name"])) {
        $name = $_POST["name"];
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }

    if (isset($_POST["cep"])) {
        $cep = $_POST["cep"];
    }

    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }

    @$submit = $_POST["submit"];
    
    if ($submit) {
        if ($submit == "Cadastrar") {
            mysqli_query($con, "INSERT into users(name, email, cep, password) VALUES('$name', '$email', '$cep', '$password')");
            echo "<script>alert('Conta criada com sucesso'),history.back()</script>";
            header("Location:login.php");
        } else {
            echo  "<script>alert('Erro ao enviar os dados.');</script>";
        }
    }
?>