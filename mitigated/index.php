<?php
    declare(strict_types = 1);
    require_once(__DIR__ . '/templates.php');

    session_set_cookie_params(0, '/', 'localhost', true, true);
    session_start();

    if (isset($_SESSION['id'])) {
        header('Location: profile.php?id=' . $_SESSION['id']);
        die();
    }

    index(false);
?>
