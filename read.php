<?php
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    if (isset($_POST["telefone"])) {
        $telefone = $_POST["telefone"];
    }
    if (isset($_POST["titulo"])) {
        $titulo = $_POST["titulo"];
    }
    if (isset($_POST["categoria"])) {
        $categoria = $_POST["categoria"];
    }
    if (isset($_POST["quantidade"])) {
        $quantidade = $_POST["quantidade"];
    }
    if (isset($_POST["date"])) {
        $date = $_POST["date"];
    }

    if (isset($_POST["name"])) {
        $file = fopen('data/data.txt','a');
        
        if ($file == false) die('Não foi possível criar o arquivo.');
    
        $data = "$name;$email;$telefone;$titulo;$categoria;$quantidade;$date\n";
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
    <link rel="shortcut icon" href="https://images.emojiterra.com/google/noto-emoji/v2.034/512px/267b.png" type="image/x-icon">
    <title>Dados</title>
</head>
<body>
    <header>
        <bold> <a href="./index.php">Recicla Tech</a> </bold>
        <nav>
            <a class="tabs" href="./index.php">Home</a>
            <a class="tabs" href="./create.php">Cadastrar</a>
            <a class="tabs" href="./read.php">Ver</a>
        </nav>
    </header>
    <div class="table-content">
        <h1>Dados cadastrados:</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                    <th>Data</th> 
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
                        $titulo = $separator[3];
                        $categoria = $separator[4];
                        $quantidade = $separator[5];
                        $date = $separator[6];
    
                        echo "<tr>
                                <td>$name</td>
                                <td>$email</td>
                                <td>$titulo</td>
                                <td>$categoria</td>
                                <td>$quantidade</td>
                                <td>$date</td>
                              </tr>
                              ";
                    }
                }
                fclose($file);
            ?>
            </tbody>
        </table>

        <button>
            <a href="./create.php">Cadastrar novo</a>
        </button>
    </div>
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