<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include(".\assets\utils\head.php"); ?>
    <title>Cadastrar - Reciclottech</title>
</head>
<body>
    <?php include(".\assets\utils\header.php"); ?>
    <form action="read.php" method="post">
        <section class="form-data">
            <h2>Cadastrar dados dos produtos</h2>
    
            <div class="input-form">
                <label for="titulo">Título do produto</label>
                <input type="text" name="titulo" id="titulo" required>
            </div>

            <div class="input-form">
                <label for="categoria"><span>Selecione a categoria do produto</span></label>
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
                <label for="quantidade">Quantidade de produtos</label>
                <input type="number" name="quantidade" id="quantidade" required>
            </div>
    
            <div class="input-form">
                <label for="date">Data de descarte</label>
                <input type="date" name="date" id="date" required>
            </div>
            
            <input type="submit" name="submit" value="Enviar Dados" />
        </section>
    </form>
</body>
</html>