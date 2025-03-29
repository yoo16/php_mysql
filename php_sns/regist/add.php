<?php
// app.php を読み込み
require_once '../app.php';

// POSTリクエストでなければ何も表示しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// セッションに保存
$posts = $_SESSION[APP_KEY]['regist'] = $_POST;

if ($posts) {
    // DBに登録
    $result = insert($posts);

    if (!$result) {
        // 登録に失敗した場合はエラーメッセージを表示
        $_SESSION[APP_KEY]['error'] = "登録に失敗しました。";
        // エラーメッセージを表示するために regist.php にリダイレクト
        header('Location: input.php');
        exit;
    } else {
        // 登録に成功した場合はセッションを削除
        unset($_SESSION[APP_KEY]['regist']);
        // 登録完了メッセージを表示するために complete.php にリダイレクト
        header('Location: complete.php');
    }
}


function insert($posts)
{
    // TODO: サニタイズ

    // DB接続
    $pdo = Database::getInstance();

    // users テーブルにレコードを挿入するSQL
    $sql = "INSERT INTO users (name, email, password)
        VALUES (:name, :email, :password);";

    // データベースに登録
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute($posts);
    return $result;
}