<?php
require_once 'models/Item.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['id'])) return;

    $item = new Item();
    $posts = $item->check($_POST);
    $errors = $item->validate($posts);

    //演習：商品コード重複チェック

    $_SESSION['item'] = $posts;
    $_SESSION['errors'] = $errors;

    if (!$errors && $item->findById($posts['id'])) {
        if ($item->update($posts)) {
            unset($_SESSION['item']);
        }
    }
    header("Location: list.php");
}
