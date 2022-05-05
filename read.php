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
        $date = strftime('%d/%m/%Y', strtotime($_POST["date"]));
    }

    if (isset($_POST["name"])) {
        $file = fopen('assets/data/data.txt','a');
        
        if (!$file) {
            die('Não foi possível criar o arquivo.');
        }
    
        $data = "$name;$email;$telefone;$titulo;$categoria;$quantidade;$date\n";
        fwrite($file, $data);
    
        fclose($file);
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
        $path = ".\\"; 
        include(".\assets\utils\head.php"); 
    ?>
    <title>Peças - Reciclottech</title>
</head>
<body>
    <?php include(".\assets\utils\header.php"); ?>
    <div class="table-content">
        <h1>Peças cadastradas</h1>
        <table aria-label="peças cadastradas">
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
                $file = fopen('assets/data/data.txt','r');

                if (!$file) {
                    die('Não foi possível ler os dados.');
                }

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

        <a class="button-create-new" href="./create.php">Cadastrar novo</a>
        
    </div>
</body>
</html>
