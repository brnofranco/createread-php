<header>
    <a class='nav-logo' href='./'>
        <img src='public/logo.png' alt='logo reciclottech'>
    </a>
     
    <nav>
        <a class="tabs" href="./">Home</a>

        <?php
            if (isset($_SESSION["email"])) {
                echo "<div class='dropdown'>";
                echo "<span>Peças</span>";
                echo "<div class='dropdown-content'>";
                echo "<a class='tabs' href='read_product.php'>Peças cadastradas</a>";
                echo "<a class='tabs' href='register_product.php'>Cadastrar peça</a>";
                echo "</div></div>";

                if (($_SESSION["email"])=="admin@admin.com") {
                    echo "<div class='dropdown'>";
                    echo "<span>Locais</span>";
                    echo "<div class='dropdown-content'>";
                    echo "<a class='tabs' href='read_location.php'>Locais cadastrados</a>";
                    echo "<a class='tabs' href='register_location.php'>Cadastrar local</a>";
                    echo "</div></div>";
                }

                echo "<a class='tabs logout' href='assets/database/logout.php'>Deslogar</a>";

            } else {
                echo "<a class='tabs' href='login.php'>Login</a>";
                echo "<a class='tabs' href='signin.php'>Registrar</a>";
            }
        ?>
    </nav>
</header>