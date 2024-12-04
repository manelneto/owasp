<?php declare(strict_types = 1);
function common($vulnerable) {
    $title = $vulnerable ? 'Vulnerável' : 'Mitigado';
    $class = $vulnerable ? 'vulnerable' : 'mitigated'; ?>
    <!DOCTYPE html>
    <html lang="en-US">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Segurança de Redes 2024 &ndash; Site <?=$title?></title>
            <link rel="stylesheet" href="style.css">
        </head>

        <body class="<?=$class?>">
            <header>
                <h1><a href="index.php">Segurança de Redes 2024 &ndash; Site <?=$title?></a></h1>
            </header>
            <?php if (isset($_SESSION['message'])) { ?>
                <div>
                    <p><strong><?=$_SESSION['message']?></strong></p>
                </div>
            <?php }
            unset($_SESSION['message']);
} ?>


<?php function index($title) {
    common($title); ?>
            <main>
                <section>
                    <h2>Iniciar Sessão</h2>
                    <form action="login.php" method="post">
                        <label for="username-login">Nome de Utilizador</label>
                        <input id="username-login" type="text" name="username" placeholder="Nome de Utilizador" required>
                        <label for="password-login">Palavra-Passe</label>
                        <input id="password-login" type="password" name="password" placeholder="Palavra-Passe" required>
                        <button type="submit">Entrar</button>
                    </form>
                </section>
                <section>
                    <h2>Criar Conta</h2>
                    <form action="register.php" method="post">
                        <label for="username-register">Nome de Utilizador</label>
                        <input id="username-register" type="text" name="username" placeholder="Nome de Utilizador" required>
                        <label for="password-register">Palavra-Passe</label>
                        <input id="password-register" type="password" name="password" placeholder="Palavra-Passe" required>
                        <button type="submit">Registar</button>
                    </form>
                </section>
            </main>
        </body>
    </html>
<?php } ?>

<?php function profile($title, $username) {
    common($title); ?>
            <main>
                <section>
                    <h2>Página Pessoal</h2>
                    <h3><?=$username?></h3>
                    <form action="logout.php" method="post">
                        <button type="submit">Terminar Sessão</button>
                    </form>
                </section>
            </main>
        </body>
    </html>
<?php } ?>
