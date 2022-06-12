<?php include("./assets/sessions/session_user.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
        include(".\assets\utils\head.php"); 
        $category = $_GET["category"];
        $product = $_GET["product"];
    ?>
    <title>Descartar - Reciclottech</title>
</head>
<body>
    <?php include(".\assets\utils\header.php"); ?>
    <div class="locations-container">
        <div class="locations-title">
            <?php 
                echo "<h1>Locais de descarte para \"$product\"</h1>"; 
                echo "<h2>Os seguintes locais permitem que você descarte peças do tipo \"$category\".</h2>"
            ?>
        </div>
        <?php
            function Mask($mask,$str){
                $str = str_replace(" ","",$str);
                for($i=0;$i<strlen($str);$i++) $mask[strpos($mask,"#")] = $str[$i];
                return $mask;
            }

            $query = mysqli_query($con, "SELECT * FROM locations WHERE category = '$category'");
                  
            if (mysqli_fetch_array($query)) {
                $query = mysqli_query($con, "SELECT * FROM locations WHERE category = '$category'");
                while ($data=mysqli_fetch_array($query)){
                    echo "<div class='locations-box'>
                            <img src='".$data['image_path']."' alt='".$data['name']."'>
                            <div class='locations-box-content'>
                                <h2>".$data['name']."</h2>
                                <div class='locations-box-content-info'>
                                    <p><b>Endereço:</b> ".$data['address']."</p>
                                    <p><b>CEP:</b> ".Mask("#####-###", $data['cep'])."</p>
                                </div>
                            </div>
                        </div>
                    ";
                }
                
            } else {
                echo "<center>
                    <h3 class='not-found'>Não há locais cadastrados para descartar esta peça.</h3>
                </center>";
            }
        ?>
        <a class="button-back" href="./read_product.php">Voltar</a>
    </div>
</body>
</html>
