<?php include("./assets/sessions/session.php"); ?>
<!DOCTYPE html>
<head>
    <?php include(".\assets\utils\head.php"); ?>
    <title>Home - Reciclottech</title>
</head>
<body>
    <?php include(".\assets\utils\header.php"); ?>
    <main>
        <div class="main-content">
            <h1>
                Cadastre seu <strong>lixo eletrônico</strong> e ajude o meio ambiente
            </h1>
            <section class="main-content-info">
                <p>
                    O lixo eletrônico ou tecnológico, como o próprio nome diz, é aquele proveniente de materiais eletrônicos.
                </p>
                <p>
                    Com o avanço da tecnologia no mundo moderno, há um excesso de lixo eletrônico o qual pode causar diversos impactos negativos no meio ambiente.
                </p>
            </section>
            <section class="main-content-cards">
                <?php
                    $iconsFile = file_get_contents('public/icons.json');
                    $data = json_decode($iconsFile);
                    
                    foreach ($data->icons as &$icon) {
                        echo '<div class="card">';
                        echo    '<img src="'.$icon->path.'" alt="'.$icon->alt.'">';
                        echo    '<h5>'.$icon->title.'</h5>';
                        echo '</div>';
                    }
                ?>
            </section>
        </div>
        <div class="main-image">
            <img class="main-image-img" src="./public/nature.svg" alt="nature">
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