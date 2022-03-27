<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="https://images.emojiterra.com/google/noto-emoji/v2.034/512px/267b.png" type="image/x-icon">
    <title>Criar</title>
</head>
<body>
    <header>
        <bold> <a href="./index.php">Recicla Tech</a> </bold>
        <nav>
            <a class="tabs" href="./index.php">Home</a>
            <a class="tabs" href="./create.php">Cadastrar</a>
            <a class="tabs" href="./read.php">Ver</a>
        </nav>
    </header>
    
    <form action="read.php" method="post">

        <h1>Cadastrar dados pessoais:</h1>

        <label for="name">Nome</label>
        <input type="text" name="name" id="name" required>

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>

        <label for="telefone">Telefone</label>
        <input type="tel" name="telefone" id="telefone" pattern="[0-9]{2}-[0-9]{5}-[0-9]{4}" required>

        <h1>Cadastrar dados dos porodutos:</h1>

        <label for="titulo">Título do produto:</label>
        <input type="text" name="titulo" id="titulo" required>

        <label for="categoria"><span>Selecione a categoria:</span></label>
        <select id="categoria" name="categoria">
            <option value="Periféricos">Periféricos</option>
            <option value="Placas de circuitos">Placas de circuitos</option>
            <option value="Baterias e Pilhas">Baterias e Pilhas</option>
            <option value="Fios">Fios</option>
            <option value="Celulares">Celulares</option>
            <option value="Eletrodomésticos">Eletrodomésticos</option>
            <option value="Rádios">Rádios</option>
            <option value="Televisores">Televisores</option>
            <option value="Outros">Outros</option>
        </select>

        <label for="quantidade">Quantidade de produtos:</label>
        <input type="number" name="quantidade" id="quantidade" required>

        <label for="date">Data de descarte</label>
        <input type="date" name="date" id="date" required>


        <input type="submit" name="submit" value="Enviar Dados" />
    </form>

</body>
</html>