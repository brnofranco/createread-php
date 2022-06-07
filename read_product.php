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
        <h1>Peças cadastradas</h1>
        <table aria-label="peças cadastradas">
            <?php
                $user = $_SESSION["email"];
                $query = mysqli_query($con, "SELECT * FROM products WHERE user = '$user'");
                        
                if (mysqli_fetch_array($query)) {
                    echo "<thead>
                            <tr>
                                <th>Título</th>
                                <th>Categoria</th>
                                <th>Quantidade</th>
                                <th>Data</th> 
                                <th>Onde descartar</th>
                            </tr>
                        </thead>
                        <tbody>";

                    $query = mysqli_query($con, "SELECT * FROM products WHERE user = '$user'");

                    while ($data=mysqli_fetch_array($query)){
                        echo "<tr>
                            <td>".$data['title']."</td>
                            <td>".$data['category']."</td>
                            <td>".$data['quantity']."</td>
                            <td>".strftime('%d/%m/%Y', strtotime($data['date']))."</td>
                            <td>
                                <a class='redirect-link' href='./discard.php?category=".$data['category']."'>Ver locais</a>
                            </td>
                        </tr>
                        ";
                    }
                } else {
                    echo "<h3 class='not-found'>Parece que você ainda não tem peças cadastradadas.</h3>";
                }
            ?>
            </tbody>
        </table>
        <a class="button-fill-green" href="./register_product.php">Cadastrar novo</a>
    </div>
</body>
</html>
