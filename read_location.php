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

    if (isset($_POST["pic"])) {
        $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
        $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = './images/'; //Diretório para uploads
        
        move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
        $pic = $new_name;
    }

    if (isset($_POST["name"])) {
        $file = fopen('assets/data/location.txt','a');
        
        if (!$file) {
            die('Não foi possível criar o arquivo.');
        }
    
        $data = "$name;$categoria;$endereco;$cep;$pic;\n";
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
                                <td><img src='./images/'$pic></td>
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
