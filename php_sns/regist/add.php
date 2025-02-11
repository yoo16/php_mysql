<?php 
// app.php を読み込み
require_once '../app.php';

// POSTリクエストでなければ何も表示しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// セッションデータ取得
$regist = $_SESSION[APP_KEY]['regist'];

// データベースに接続
$model = new Model();

// users テーブルにレコードを挿入するSQL
$sql = "INSERT INTO users (name, email, password)
        VALUES (:name, :email, :password);
        ";

// データベースに登録
$stmt = $model->pdo->prepare($sql);
$stmt->execute($regist);

// 「complete.php」にリダイレクト
header('Location: complete.php');