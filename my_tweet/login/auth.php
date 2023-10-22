<?php
require_once '../app.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

$user = new User();
$post = $user->check($_POST);
$_SESSION['login'] = $post;

if ($auth_user = $user->auth($post['email'], $post['password'])) {
    //ログイン成功
    $_SESSION['auth_user'] = $auth_user;
    header('Location: ../');
    exit;
} else {
    //ログイン失敗
    $_SESSION['errors']['login_invalid'] = "ユーザ名またはパスワードが間違っています。";
    header('Location: ./');
    exit;
}
