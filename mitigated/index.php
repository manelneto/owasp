<?php
    session_start();
    if (isset($_SESSION['id'])) {
        header('Location: profile.php?id=' . $_SESSION['id']);
        die();
    }
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Segurança de Redes 2024 &ndash; Site Vulnerável</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="mitigated">
        <header>
            <h1><a href="index.php">Segurança de Redes 2024 &ndash; Site Vulnerável</a></h1>
        </header>
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
