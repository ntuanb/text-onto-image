<?php

require_once('functions.php');

if (isset($_POST['username'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == '') {

        $_SESSION['auth'] = 1;

        header('Location: '. 'test1.php');
        die();

    }

}

$message = 'Incorrect username or password.';

header('Location: ' . 'index.php?m=' . $message);
die();
