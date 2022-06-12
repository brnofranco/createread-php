<?php include("./assets/sessions/session_admin.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php  include(".\assets\utils\head.php"); ?>
    <title>Locais - Reciclottech</title>
</head>
<body>
    <?php include(".\assets\utils\header.php"); ?>
    <div class="table-content">
        <h1>Locais de descarte cadastrados</h1>
        <table aria-label="locais de descarte">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Categoria Recebida</th>
                    <th>Endereço</th>
                    <th>CEP</th>
                    <th>Foto</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody> 
            
            <?php
                function Mask($mask,$str) {
                    $str = str_replace(" ","",$str);
                    for($i=0;$i<strlen($str);$i++) $mask[strpos($mask,"#")] = $str[$i];
                    return $mask;
                }

                $query = mysqli_query($con, "SELECT * FROM locations");

                while ($data=mysqli_fetch_array($query)) {
                    echo "<tr>
                            <td>".$data['name']."</td>
                            <td>".$data['category']."</td>
                            <td>".$data['address']."</td>
                            <td>".Mask("#####-###", $data['cep'])."</td>
                            <td>
                                <img src='".$data['image_path']."'>
                            </td>
                            <td>
                                <a href='update_location.php?id=".$data['id']."'><img style='width: 35px' src='./public/icons/pencil.svg'></a>
                                <a href='delete.php?id=".$data['id']."'><img style='width: 30px' src='./public/icons/eraser.svg'></a>
                            </td>
                          </tr>";
                }
            ?>
            </tbody>
        </table>

        <a class="button-fill-green" href="./register_location.php">Cadastrar novo</a>
        
    </div>
</body>
</html>
