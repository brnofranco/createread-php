<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="https://images.emojiterra.com/google/noto-emoji/v2.034/512px/267b.png" type="image/x-icon">
    <title>Home - Reciclottech</title>
</head>
<body>
    <header>
        <bold> <a href="./index.php">Reciclottech</a> </bold>
        <nav>
            <a class="tabs" href="./index.php">Home</a>
            <a class="tabs" href="./read.php">Ver peças</a>
            <a class="tabs" href="./create.php">Cadastrar peça</a>
        </nav>
    </header>
    <main>
        <div class="main-content">
            <h1>
                Cadastre seu <strong>lixo eletrônico</strong> e ajude o meio ambiente
            </h1>
            <section class="main-content-info">
                <p>
                    O lixo eletrônico (e-lixo) ou tecnológico, como o próprio nome indica, é aquele proveniente de materiais eletrônicos. Ele também é conhecido pela sigla RAEE (Resíduos de Aparelhos Eletroeletrônicos).
                </p>
                <p>
                    Com o avanço da tecnologia no mundo moderno, há um excesso de lixo eletrônico os quais podem causar diversos impactos negativos no meio ambiente.
                </p>
            </section>
            <section class="main-content-cards">
                <div class="card">
                    <img src="./images/computerIcon.svg" alt="computer icon">
                    <h5>Computadores</h5>
                </div>
                <div class="card">
                    <img src="./images/batteryIcon.svg" alt="computer icon">
                    <h5>Baterias</h5>
                </div>
                <div class="card">
                    <img src="./images/motherboardIcon.svg" alt="computer icon">
                    <h5>Placas gerais</h5>
                </div>
                <div class="card">
                    <img src="./images/fridgeIcon.svg" alt="computer icon">
                    <h5>Eletrodoméstico</h5>
                </div>
            </section>
        </div>
        <div class="main-image">
            <img class="main-image-img" src="./images/nature.svg" alt="nature">
        </div>
    </main>
    <footer>
        <?php
            setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            echo strftime('<h4>Jundiaí, %d de %B de %Y</h4>', strtotime('today'));
        ?>
        <span> - </span>
        <h4>Desenvolvido por Bruno Franco e Murilo Carbol.</h4>
    </footer>
</body>
</html>