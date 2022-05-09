<?php include("./assets/sessions/session_admin.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include("./assets/utils/head.php"); ?>
    <title>Cadastrar Local - Reciclottech</title>
</head>
<body>
    <?php include("./assets/utils/header.php"); ?>
    <form action="read_location.php" method="post">
        <section class="form-data">
            <h2>Cadastrar dados do local de descarte</h2>
    
            <div class="input-form">
                <label for="name">Nome do local</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="input-form">
                <label for="categoria"><span>Selecione a categoria principal do local</span></label>
                <select id="categoria" name="categoria">
                    <option value="Periféricos">Periféricos</option>
                    <option value="Placas de circuitos">Placas de circuitos</option>
                    <option value="Baterias e Pilhas">Baterias e Pilhas</option>
                    <option value="Fios">Fios</option>
                    <option value="Celulares">Celulares</option>
                    <option value="Eletrodomésticos">Eletrodomésticos</option>
                    <option value="Rádios">Rádios</option>
                    <option value="Televisores">Televisores</option>
                    <option value="Outros">Qualquer outro tipo de produto</option>
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
            
            <input type="submit" name="submit" value="Enviar Dados" />
        </section>
    </form>
</body>
</html>
