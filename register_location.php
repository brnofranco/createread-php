<?php include("./assets/sessions/session_admin.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include("./assets/utils/head.php"); ?>
    <title>Cadastrar Local - Reciclottech</title>
</head>
<body>
    <?php include("./assets/utils/header.php"); ?>

    <form method="post">
        <section class="form-data">
            <h2>Cadastrar dados do local de descarte</h2>
    
            <div class="input-form">
                <label for="name">Nome do local</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="input-form">
                <label for="categoria"><span>Selecione a categoria principal do local</span></label>
                <select id="categoria" name="categoria">
                    <?php
                        $xml = simplexml_load_file('./assets/data/category.xml');
                        foreach($xml->category as $category){
                            echo "<option value='".$category->id."'>".$category->title."</option>";
                        } 
                    ?>
                </select>
            </div>
    
            <div class="input-form">
                <label for="endereco">Endereço do local</label>
                <input type="text" name="endereco" id="endereco" required>
            </div>

            <div class="input-form">
                <label for="cep">CEP</label>
                <input type="number" name="cep" id="cep" required>
            </div>

            <div class="input-form">
                <form method="POST" enctype="multipart/form-data">
                    <label for="imagem">Enviar imagem:</label>
                <input type="file" name="pic" accept="image/*" id="pic" class="form-control" required>
            </div> 
            
            <input type="submit" name="submit" value="Enviar Dados" />
        </section>
    </form>
</body>
</html>

<?php
 if(isset($_FILES['pic']))
 {
    $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = './images/'; //Diretório para uploads
 
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    echo '<div class="alert alert-success" role="alert" align="center">
          <img src="./images/' . $new_name . '" class="img img-responsive img-thumbnail" width="200"> 
          <br>
          Imagem enviada com sucesso!
          <br>
          <a href="exemplo_upload_de_imagens.php">
          <button class="btn btn-default">Enviar nova imagem</button>
          </a></div>';
 } ?>

