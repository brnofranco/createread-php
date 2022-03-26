<?php
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
    }

    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }

    if (isset($_POST["name"])) {
        $file = fopen('data/data.txt','a');
        
        if ($file == false) die('Não foi possível criar o arquivo.');
    
        $data = "$name;$email\n";
        fwrite($file, $data);
    
        fclose($file);
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="https://i.pinimg.com/originals/95/b3/e1/95b3e17356f0fbf21ba964bd82f9b5b9.png" type="image/x-icon">
    <title>Dados</title>
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
    
    <h1>Dados cadastrados</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $file = fopen('data/data.txt','r');

                if ($file == false) die('Não foi possível ler os dados.');

                while (!feof($file)) {
                    $line = fgets($file);

                    if ($line != "") {
                        $separator = explode(";", $line);
                        
                        $name = $separator[0];
                        $email = $separator[1];
    
                        echo "<tr>
                                <td>$name</td>
                                <td>$email</td>
                              </tr>";
                    }
                }
                fclose($file);
            ?>
        </tbody>
    </table>

    <button>
        <a href="./create.php">Cadastrar novo</a>
    </button>
</body>
</html>