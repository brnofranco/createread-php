<?php include("./assets/sessions/session_user.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include("./assets/utils/head.php"); ?>
    <title>Cadastrar peça - Reciclottech</title>
</head>
<body>
    <?php include("./assets/utils/header.php"); ?> 

    <form method="post">
        <section class="form-data">
            <h2>Cadastrar dados do produto</h2>
    
            <div class="input-form">
                <label for="titulo">Título do produto</label>
                <input type="text" name="titulo" id="titulo" required>
            </div>

            <div class="input-form">
                <label for="categoria"><span>Selecione a categoria principal do local</span></label>
                <select id="categoria" name="categoria">
                    <?php
                        $xml = simplexml_load_file('./assets/data/category.xml');
                        foreach($xml->category as $category){
                            echo "<option value='".$category->name."'>".$category->name."</option>";
                        } 
                    ?>
                </select>
            </div>

            <div class="input-form">
                <label for="quantidade">Quantidade de produtos</label>
                <input type="number" name="quantidade" id="quantidade" required>
            </div>
    
            <div class="input-form">
                <label for="date">Data de descarte</label>
                <input type="date" name="date" id="date" required>
            </div>
    
            <input class="button-fill-green" type="submit" name="submit" value="Cadastrar" />
        </section>
    </form>
</body>
</html>

<?php

    if (isset($_POST["titulo"])) {
        $title = $_POST["titulo"];
    }
    if (isset($_POST["categoria"])) {
        $category = $_POST["categoria"];
    }
    if (isset($_POST["quantidade"])) {
        $quantity = $_POST["quantidade"];
    }
    if (isset($_POST["date"])) {
        $date = $_POST["date"];
    }
    $user = $_SESSION["email"];
    @$submit = $_POST["submit"];

    if ($submit) {
        if ($submit == "Cadastrar") {
            mysqli_query($con, "INSERT into products(user, title, category, quantity, date) VALUES('$user', '$title', '$category', '$quantity', '$date')");
            header("Location:read_product.php");
        } else {
            echo  "<script>alert('Erro ao enviar os dados.');</script>";
        }
    }

?>