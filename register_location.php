<?php include("./assets/sessions/session_admin.php"); 

	if (isset($_POST['acao']) && $_POST['acao']=="cadastrar"){
		$foto = $_FILES['foto'];	
		$redim = new Redimensiona();
		$src=$redim->Redimensionar($foto, 200, "./public/locations");
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include("./assets/utils/head.php"); ?>
    <title>Cadastrar Local - Reciclottech</title>
</head>
<body>
    <?php include("./assets/utils/header.php"); ?>

    <form method="post" enctype="multipart/form-data">
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
                <input type="text" name="endereco" id="endereco" placeholder="Ex: Av. União dos Ferroviários, 1760 - Centro, Jundiaí - SP" required>
            </div>

            <div class="input-form">
                <label for="cep">CEP</label>
                <input type="number" name="cep" id="cep" placeholder="Somente números" required>
            </div>

            <div class="input-form">
                <label for="imagem">Enviar imagem:</label>
                <input type="file" name="foto" accept="image/*" id="pic" class="form-control" required>
                <input type="hidden" name="acao" value="cadastrar" />
            </div>             
            <input class="button-fill-green" type="submit" name="submit" value="Enviar Dados" />
        </section>
    </form>
</body>
</html>

<?php
    class Redimensiona{
        
        public function Redimensionar($imagem, $largura, $pasta){
            
            $name = md5(uniqid(rand(),true));
            
            if ($imagem['type']=="image/jpeg"){
                $img = imagecreatefromjpeg($imagem['tmp_name']);
            }else if ($imagem['type']=="image/gif"){
                $img = imagecreatefromgif($imagem['tmp_name']);
            }else if ($imagem['type']=="image/png"){
                $img = imagecreatefrompng($imagem['tmp_name']);
            }
            $x   = imagesx($img);
            $y   = imagesy($img);
            $altura = ($largura * $y)/$x;
            
            $nova = imagecreatetruecolor($largura, $altura);
            imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
            
            if ($imagem['type']=="image/jpeg"){
                $local="$pasta/$name".".jpg";
                imagejpeg($nova, $local);
            }else if ($imagem['type']=="image/gif"){
                $local="$pasta/$name".".gif";
                imagejpeg($nova, $local);
            }else if ($imagem['type']=="image/png"){
                $local="$pasta/$name".".png";
                imagejpeg($nova, $local);
            }		
            global $pic;
            $pic = $local;
            imagedestroy($img);
            imagedestroy($nova);	
            
            return $local;
        }
    }

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

    @$submit = $_POST["submit"];
    
    if ($submit) {
        if ($submit == "Enviar Dados") {
            mysqli_query($con, "INSERT into locations(name, category, address, cep,image_path) VALUES('$name', '$categoria', '$endereco', '$cep', '$pic')");
            echo "<script>alert('Local de descarte criado com sucesso!'),history.back()</script>";
            header("Location:read_location.php");
        } else {
            echo  "<script>alert('Erro ao enviar os dados.');</script>";
        }
    }

?>