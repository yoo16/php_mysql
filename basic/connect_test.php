<?php
require_once 'env.php';

$db_connection = DB_CONNECTION;
$db_name = DB_DATABASE;
$db_host = DB_HOST;
$db_port = DB_PORT;
$db_user = DB_USERNAME;
$db_password = DB_PASSWORD;

$dsn = "{$db_connection}:dbname={$db_name};host={$db_host};port={$db_port};charset=utf8;";
try {
    $pdo = new PDO($dsn, $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>接続成功</h3>
    <?= var_dump($pdo) ?>
</body>
</html>