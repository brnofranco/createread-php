<?php 
    include("./assets/sessions/session_admin.php"); 
    $pic = '';
	if (isset($_GET['acao']) && $_GET['acao']=="cadastrar"){
		$foto = $_FILES['foto'];	
		$redim = new Redimensiona();
		$src=$redim->Redimensionar($foto, 200, "./public/locations");
	}
    //var_dump($pic);
    $id=$_GET["id"];
    $query = mysqli_query($con,"SELECT * FROM locations WHERE id=".$id);
    $data = mysqli_fetch_array($query);
    
    $name=$data['name'];
    $category=$data['category'];
    $address=$data['address'];
    $cep=$data['cep'];
    $picture=$data['image_path'];
    
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
    
    <form method="get" enctype="multipart/form-data" action="modify.php?id=<?php echo $id; ?>">
        <section class="form-data">
        <input type="hidden" name="id" value=<?php echo $id; ?> />
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
                        if($category==$option->id){
                            echo "<option selected value='".$option->id."'>".$option->title." </option>";
                        }else{
                            echo "<option value='".$option->id."'>".$option->title."</option>";
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
            <label for="imagem">Enviar imagem:</label>
            <input type="file" name="foto" accept="image/*" id="pic" class="form-control" value="<?php echo $picture; ?>">
            <input type="hidden" name="acao" value="cadastrar" />
            <input type="hidden" name="pic" value=<?php echo $pic; ?> />
        </div>
            <input type="submit" name="acao" value="Alterar" /> <input type="submit" name="acao" value="Cancelar" />
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
