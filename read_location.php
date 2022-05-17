<?php include("./assets/sessions/session_admin.php"); ?>
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
                    <th>Imagem</th>
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
                        $pic = $separator[4];
    
                        echo "<tr>
                                <td>$name</td>
                                <td>$categoria</td>
                                <td>$endereco</td>
                                <td>$cep</td>
                                <td><img src='$pic'></td>
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
