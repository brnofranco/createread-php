<?php 
    include("./assets/sessions/session_admin.php"); 

    global $id;
    $id=$_GET["id"];
    $query = mysqli_query($con,"SELECT * FROM locations WHERE id=".$id);
    $data = mysqli_fetch_array($query);
    
    $name=$data['name'];
    $category=$data['category'];
    $address=$data['address'];
    $cep=$data['cep'];
    $picture=$data['image_path'];
    $pic=$data['image_path'];
    
	if (isset($_POST['acao']) && $_POST['acao']=="cadastrar"){
		$foto = $_FILES['foto'];
        var_dump($foto['name']);
        if($foto['name'] == ""){
            echo "foto está vazia";
        }else{
            $redim = new Redimensiona();
            $src=$redim->Redimensionar($foto, 200, "./public/locations");
            unlink($picture);
        }
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
    <?php include("./assets/utils/header.php"); ?>
    
    <form method="POST" enctype="multipart/form-data">
        <section class="form-data">
            <h2>Atualizar dados cadastrados</h2>

            <div class="input-form">
                <label for="name">Nome do local</label>
                <input type="text" name="name" id="name" value="<?php echo $name; ?>" required>
            </div>
        
            <div class="input-form">
                <label for="categoria"><span>Selecione a categoria principal do local</span></label>
                <select id="categoria" name="categoria" value="<?php echo $category; ?>">
                    <?php
                        $xml = simplexml_load_file('./assets/data/category.xml');
                        foreach($xml->category as $option){
                            if ($category==$option->name){
                                echo "<option selected value='".$option->name."'>".$option->name." </option>";
                            } else {
                                echo "<option value='".$option->name."'>".$option->name."</option>";
                            }
                        } 
                    ?>
                </select>
            </div>

            <div class="input-form">
                <label for="endereco">Endereço do local</label>
                <input type="text" name="endereco" id="endereco" value="<?php echo $address; ?>" required>
            </div>

            <div class="input-form">
                <label for="cep">CEP</label>
                <input type="number" name="cep" id="cep" value="<?php echo $cep; ?>" required>
            </div>
            
            <div class="input-form">
                <label for="imagem">Imagem:</label>
                <input type="file" name="foto" accept="image/*" id="pic" class="form-control">
                <input type="hidden" name="acao" value="cadastrar" />
            </div>

            <div class="buttons">
                <input class="button-fill-green" type="submit" name="submit" value="Alterar" />
                <input class="button-fill-red" type="submit" name="submit" value="Cancelar" />
            </div>

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
        $namenew = $_POST["name"];
    }
    if (isset($_POST["categoria"])) {
        $categorianew = $_POST["categoria"];
    }
    if (isset($_POST["endereco"])) {
        $endereconew = $_POST["endereco"];
    }
    if (isset($_POST["cep"])) {
        $cepnew = $_POST["cep"];
    }

    @$submit = $_POST["submit"];

    if ($submit) {
        if ($submit == "Alterar") {
            $sql = "UPDATE locations SET
						name='$namenew', 
						category='$categorianew',
						address='$endereconew',
						cep='$cepnew',
						image_path='$pic'
						WHERE id='$id'";

            $query = mysqli_query($con,$sql) or die (mysqli_error());
            mysqli_close($con);
        }
        header("Location: read_location.php");
    }

?>