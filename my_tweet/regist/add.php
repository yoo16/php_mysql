<?php
require_once '../app.php';

//POSTリクエストチェック
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: input.php');
    exit;
}

//ユーザ登録
if ($data = $_SESSION['regist']) {
    $user = new User();
    if ($user->insert($data)) {
        header('Location: result.php');
        exit;
    } else {
        header('Location: input.php');
        exit;
    }
}
