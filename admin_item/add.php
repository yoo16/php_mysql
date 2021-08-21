<?php
require_once 'config.php';
require_once 'connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item = check($_POST);
    $_SESSION['item'] = $item;
    $_SESSION['errors'] = $errors = validate($item);
    if ($errors) {
        header('Location: input.php');
    } else {
        insert($pdo, $item);
        if (isset($_SESSION['item'])) unset($_SESSION['item']);
        header('Location: list.php');
    }
}

function check($posts)
{
    if (empty($posts)) return;
    foreach ($posts as $column => $post) {
        $posts[$column] = htmlspecialchars($post, ENT_QUOTES);
    }
    return $posts;
}

function validate($data)
{
    $errors = [];
    if (empty($data['code'])) $errors['code'] = '商品コードを入力してください。';
    if (empty($data['name'])) $errors['name'] = '商品名を入力してください。';
    if (empty($data['price'])) $errors['price'] = '価格を入力してください。';
    if ($data['stock'] < 0) $errors['stock'] = '在庫数を入力してください。';
    return $errors;
}

function insert($pdo, $data)
{
    $sql = "INSERT INTO items (code, name, price, stock)
            VALUES (:code, :name, :price, :stock)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}
