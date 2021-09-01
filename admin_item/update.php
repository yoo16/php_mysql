<?php
require_once 'config.php';
require_once 'connect.php';

session_start();

function update($pdo, $data)
{
    $sql = "UPDATE items SET 
            code = :code,
            name = :name,
            price = :price,
            stock = :stock
            WHERE id = :id;";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['id']) {
        $item = check($_POST);
        $_SESSION['item'] = $item;
        $_SESSION['errors'] = $errors = validate($item);
        if (!$errors) {
            if (isset($_SESSION['item'])) unset($_SESSION['item']);
            update($pdo, $item);
        }
    }
    header("Location: edit.php?id={$item['id']}");
}