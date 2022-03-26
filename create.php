<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="https://i.pinimg.com/originals/95/b3/e1/95b3e17356f0fbf21ba964bd82f9b5b9.png" type="image/x-icon">
    <title>Criar</title>
</head>
<body>
    <header>
        <bold>Projeto</bold>
        <nav>
            <a class="tabs" href="./index.php">Home</a>
            <a class="tabs" href="./create.php">Cadastrar</a>
            <a class="tabs" href="./read.php">Ver</a>
        </nav>
    </header>
    <hr>
    
    <h1>Cadastrar dados</h1>

    <form action="read.php" method="post">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" required>

        <label for="name">E-mail</label>
        <input type="email" name="email" id="email" required>

        <input type="submit" name="submit" value="Enviar Dados" />
    </form>

</body>
</html>