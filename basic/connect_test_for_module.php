<?php
require_once 'env.php';
require_once 'DB.php';

$db = new DB();
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
    <?= var_dump($db->pdo) ?>
</body>
</html>