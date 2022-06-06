<?php include("./assets/sessions/session_user.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
        include(".\assets\utils\head.php"); 
    ?>
    <title>Peças - Reciclottech</title>
</head>
<body>
    <?php include(".\assets\utils\header.php"); ?>
    <div class="table-content">
        <h1>Peças - Reciclottech</h1>
        <table aria-label="peças cadastradas">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                    <th>Data</th> 
                    <th>Onde descartar</th>
                </tr>
            </thead>
            <tbody> 
            
            <?php
                $user = $_SESSION["email"];
                $query = mysqli_query($con, "SELECT * FROM products WHERE user = '$user'");
                        
                while ($data=mysqli_fetch_array($query)){
                    echo "<tr>
                    <td>".$data['title']."</td>
                    <td>".$data['category']."</td>
                    <td>".$data['quantity']."</td>
                    <td>".strftime('%d/%m/%Y', strtotime($data['date']))."</td>
                    <td><a class='discard-link' href='./discard.php?category=".$data['category']."'>Descartar</a></td>
                    </tr>
                    ";
                }
            ?>
            </tbody>
        </table>

        <a class="button-create-new" href="./register_product.php">Cadastrar novo</a>
        
    </div>
</body>
</html>
