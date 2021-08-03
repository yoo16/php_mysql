<?php
require_once 'config.php';

$db_connection = DB_CONNECTION;
$db_name = DB_DATABASE;
$db_host = DB_HOST;
$db_user = DB_USERNAME;
$db_password = DB_PASSWORD;

$dsn = "{$db_connection}:dbname={$db_name};host={$db_host};charset=utf8;";
try {
    $pdo = new PDO($dsn, $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    echo "接続成功";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
    exit;
}
echo PHP_EOL;
var_dump($pdo);

$sql = 'SELECT * FROM users LIMIT 10;';
$stmt = $pdo->query($sql);
var_dump($stmt);

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($users);
?>