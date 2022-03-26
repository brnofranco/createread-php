<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="https://i.pinimg.com/originals/95/b3/e1/95b3e17356f0fbf21ba964bd82f9b5b9.png" type="image/x-icon">
    <title>Projeto P1</title>
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

    <h1>Projeto P1 - Criação e leitura de arquivo</h1>
    <button>
        <a href="./create.php">Cadastrar</a>
    </button>
    <button>
        <a href="./read.php">Ver dados cadastrados</a>
    </button>
    <h2>
        <?php
            setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            echo strftime('%d de %B de %Y', strtotime('today'));
        ?>
    </h2>
</body>
</html>