<?php
    require_once(__DIR__ . '/user.php');

    session_start();

    $db = new PDO('sqlite:' . __DIR__ . '/database.db');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $id = $_GET['id'];
    $user = User::getUser($db, $id);
    $username = $user->getUsername();
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Segurança de Redes 2024 &ndash; Site Vulnerável</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="vulnerable">
        <header>
            <h1><a href="index.php">Segurança de Redes 2024 &ndash; Site Vulnerável</a></h1>
        </header>
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
