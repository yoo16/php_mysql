<?php
require_once 'env.php';
require_once 'DB.php';

$db = new DB();

$post["id"] = 2;
$post["name"] = "Alice";

$sql = "UPDATE users SET name = :name WHERE id = :id";

$stmt = $db->pdo->prepare($sql);
$result = $stmt->execute($post);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Update</title>
</head>

<body>
    <h2>SQL</h2>
    <p>
        <?= $sql ?>
    </p>
    <h2>結果</h2>
    <p>
        <?= $result ?>
    </p>
</body>

</html>