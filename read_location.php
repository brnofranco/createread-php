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
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody> 
            
            <?php

                $query = mysqli_query($con, "SELECT * FROM locations");

                while ($data=mysqli_fetch_array($query)){
                    echo "<tr>
                    <td>".$data['name']."</td>
                    <td>".$data['category']."</td>
                    <td>".$data['address']."</td>
                    <td>".$data['cep']."</td>
                    <td><img src='".$data['image_path']."'></td>
                    <td>
                    <a href='update_location.php?acao=Update&id=".$data['id']."'><img src='./public/icons/pencil.svg'></a>
                    <a href='modify.php?acao=Excluir&id=".$data['id']."'><img src='./public/icons/eraser.svg'></a>
                    </td>
                    </tr>
                    ";
                }
               
            
                
            ?>
            </tbody>
        </table>

        <a class="button-create-new" href="./register_location.php">Cadastrar novo</a>
        
    </div>
</body>
</html>
