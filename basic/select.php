<?php
$db_name = 'my_shop';
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_port = '3306';
//$db_host = 'host.docker.internal';
//$db_password = 'root';

$dsn = "mysql:dbname={$db_name};host={$db_host}";
try {
    $pdo = new PDO($dsn, $db_user, $db_password);
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . PHP_EOL;
    exit;
}

$sql = "SELECT * FROM items LIMIT 100;";
$items = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table>
        <?php if ($items) : ?>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <td><?= $item['id'] ?>
                    <td><?= $item['name'] ?>
                    <td><?= $item['is_active'] ?>
                    <td><?= $item['created_at'] ?>
                    <td><?= $item['updated_at'] ?>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </table>
</body>

</html>