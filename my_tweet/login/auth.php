<?php
require_once '../app.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

$_SESSION['login'] = $_POST;
$user = new User();
$user->bind($_POST);

if ($auth_user = $user->auth($user->value['email'], $user->value['password'])) {
    $_SESSION['auth_user'] = $auth_user;
    header('Location: ../');
} else {
    header('Location: ./');
}
