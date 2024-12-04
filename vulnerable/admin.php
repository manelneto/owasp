<?php
    declare(strict_types = 1);
    require_once(__DIR__ . '/templates.php');

    session_set_cookie_params(0, '/', 'localhost', true, true);
    session_start();

    admin(true);
?>
