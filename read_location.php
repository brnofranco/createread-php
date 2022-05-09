<?php
    include("./assets/sessions/session_admin.php");
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
    }
    if (isset($_POST["categoria"])) {
        $categoria = $_POST["categoria"];
    }
    if (isset($_POST["endereco"])) {
        $endereco = $_POST["endereco"];
    }
    if (isset($_POST["cep"])) {
        $cep = $_POST["cep"];
    }

    if (isset($_POST["name"])) {
        $file = fopen('assets/data/location.txt','a');
        
        if (!$file) {
            die('Não foi possível criar o arquivo.');
        }
    
        $data = "$name;$categoria;$endereco;$cep;\n";
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
                    <th>Categoria Recebida</th>
                    <th>Endereço</th>
                    <th>CEP</th>
                </tr>
            </thead>
            <tbody> 
            
            <?php
                $file = fopen('./assets/data/location.txt','r');

                if (!$file) {
                    die('Não foi possível ler os dados.');
                }

                while (!feof($file)) {
                    $line = fgets($file);

                    if ($line != "") {
                        $separator = explode(";", $line);
                        
                        $name = $separator[0];
                        $categoria = $separator[1];
                        $endereco = $separator[2];
                        $cep = $separator[3];
    
                        echo "<tr>
                                <td>$name</td>
                                <td>$categoria</td>
                                <td>$endereco</td>
                                <td>$cep</td>
                              </tr>
                              ";
                    }
                }
                fclose($file);
            ?>
            </tbody>
        </table>

        <a class="button-create-new" href="./register_location.php">Cadastrar novo</a>
        
    </div>
</body>
</html>
