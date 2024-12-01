<?php
    require_once(__DIR__ . '/user.php');

    $db = new PDO('sqlite:' . __DIR__ . '/database.db');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = User::login($db, $username, $password);

    if ($user) {
        session_set_cookie_params(0, '/', 'localhost', true, true);
        session_start();
        $_SESSION['id'] = $user->getId();
        header('Location: profile.php?id=' . $user->getId());
    }
    else
        header('Location: index.php');
?>
