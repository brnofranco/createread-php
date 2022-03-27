<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="https://i.pinimg.com/originals/95/b3/e1/95b3e17356f0fbf21ba964bd82f9b5b9.png" type="image/x-icon">
    <title>Criar</title>
</head>
<body>
    <header>
        <bold>Projeto</bold>
        <nav>
            <a class="tabs" href="./index.php">Home</a>
            <a class="tabs" href="./create.php">Cadastrar</a>
            <a class="tabs" href="./read.php">Ver</a>
        </nav>
    </header>
    <hr>
    


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
            <option value="periferico">Periféricos</option>
            <option value="placa">Placas de circuitos</option>
            <option value="pilha">Baterias e Pilhas</option>
            <option value="fios">Fios</option>
            <option value="celular">Celulares</option>
            <option value="eletrodomestico">Eletrodomesticos</option>
            <option value="radio">Rádios</option>
            <option value="televisor">Televisores</option>
            <option value="outros">Outros</option>
        </select>

        <label for="quantidade">Quantidade de produtos:</label>
        <input type="number" name="quantidade" id="quantidade" required>

        <label for="date">Data de descarte</label>
        <input type="date" name="date" id="date" required>


        <input type="submit" name="submit" value="Enviar Dados" />
    </form>

</body>
</html>