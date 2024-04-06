<?php
require_once 'env.php';
require_once 'DB.php';

$db = new DB();

$password = "password";

$post["account_name"] = "user2";
$post["email"] = "user2@test.com";
$post["password"] = password_hash($password, PASSWORD_DEFAULT);
$post["name"] = "ユーザ2";

$sql = "INSERT INTO users (account_name, email, password, name)
        VALUES(:account_name, :email, :password, :name);";

$stmt = $db->pdo->prepare($sql);
$result = $stmt->execute($post);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Insert</title>
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
