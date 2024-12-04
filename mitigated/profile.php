<?php
    declare(strict_types = 1);
    require_once(__DIR__ . '/user.php');
    require_once(__DIR__ . '/templates.php');

    session_set_cookie_params(0, '/', 'localhost', true, true);
    session_start();

    if (!isset($_SESSION['id'])) {
        header("Location: index.php");
        die();
    }

    $db = new PDO('sqlite:' . __DIR__ . '/database.db');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $id = (int) $_GET['id'];

    if ($id !== $_SESSION['id']) {
        header("Location: profile.php?id=" . $_SESSION['id']);
        die();
    }

    $user = User::getUser($db, $id);
    $username = $user->getUsername();

    profile(false, $username);
?>
