<?php
$protocol = 'mysql';
$dbname = 'my_shop';
$host = 'localhost';
$user = 'root';
$password = 'root';

$dsn = "{$protocol}:dbname={$dbname};host={$host}";
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
    exit;
}
