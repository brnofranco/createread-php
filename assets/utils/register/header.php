<header>
    <a href='../index.php'>
        <img class='nav-logo' src='../public/logo.png' alt='logo reciclottech'>
    </a>
     
    <nav>
        <a class="tabs" href="../index.php">Home</a>
        <?php
            if (isset($_SESSION["email"])) {
                echo "<a class='tabs' href='../read.php'>Ver peças</a>";
                echo "<a class='tabs' href='product.php'>Cadastrar peça</a>";
                if (($_SESSION["email"])=="admin@admin.com") {
                    echo "<a class='tabs' href='location.php'>Cadastrar local</a>";
                    echo "<a class='tabs' href='location.php'>Locais Cadastrados</a>";
                }
                echo "<a class='tabs logout' href='../assets/database/logout.php'>Deslogar</a>";
            } else {
                echo "<a class='tabs' href='../login.php'>Login</a>";
                echo "<a class='tabs' href='../signin.php'>Registrar</a>";
            }
        ?>
    </nav>
</header>