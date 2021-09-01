<?php
require_once 'models/Item.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item = new Item();
    $posts = $item->check($_POST);
    $errors = $item->validate($posts);

    //TODO 演習：商品コード重複チェック

    //セッション登録
    $_SESSION['item'] = $posts;
    $_SESSION['errors'] = $errors;
    if (!$errors && $item->insert($posts)) {
        unset($_SESSION['item']);
        header('Location: list.php');
    } else {
        header('Location: input.php');
    }
}