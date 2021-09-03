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

function validate($data)
{
    $errors = [];
    if (empty($data['code'])) $errors['code'] = '商品コードを入力してください。';
    if (empty($data['name'])) $errors['name'] = '商品名を入力してください。';
    if ($data['price'] < 0) $errors['price'] = '価格を入力してください。';
    if ($data['stock'] < 0) $errors['stock'] = '在庫数を入力してください。';
    return $errors;
}

/**
 * 商品コード検索
 */
function findByCode($pdo, $code)
{
    $sql = "SELECT * FROM items WHERE code = :code";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['code' => $code]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findById($pdo, $id)
{
    $sql = "SELECT * FROM items WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    return $item;
}

//POSTリクエストでない場合は、一覧画面にリダイレクト
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: list.php');
    exit;
}

if ($_POST['id']) {
    $posts = $_POST;
    $errors = validate($posts);

    //現在の商品を取得
    $item = findById($pdo, $_POST['id']);

    if (!empty($posts['code']) && $item['code'] != $posts['code']) {
        $find_item = findByCode($pdo, $posts['code']);
        if ($find_item) {
            $errors['code'] = '商品コードがすでに登録されています';
        }
    }

    //セッション登録
    $_SESSION['item'] = $posts;
    $_SESSION['errors'] = $errors;

    //エラーがなかったら更新
    if (!$errors) {
        if (update($pdo, $posts)) {
            //更新が成功したら、セッション削除
            unset($_SESSION['item']);
        }
    }

    header("Location: edit.php?id={$posts['id']}");
}