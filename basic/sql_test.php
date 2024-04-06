<?php
require_once 'env.php';
require_once 'DB.php';

$db = new DB();

$sql = "SELECT * FROM users LIMIT 10;";
$stmt = $db->pdo->query($sql);

// データフェッチ
// fetchAll
// $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// fetch
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $users[] = $row;
}

// Prepare
if (isset($_GET['user_id']) && $_GET['user_id'] > 0) {
    $sql = "SELECT * FROM users WHERE id = :id;";
    $stmt = $db->pdo->prepare($sql);
    // user_id バインド
    // $stmt->bindValue(":id", $_GET['user_id']);
    // $stmt->execute($data);
    $data['id'] = $_GET['user_id'];
    $stmt->execute($data);
    // データフェッチ
    $select_user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Query</title>
</head>

<body>
    <h3>SQL</h3>
    <p>
        <?= $stmt->queryString ?>
    </p>

    <h3>users</h3>
    <ul>
        <?php foreach ($users as $key => $user) : ?>
            <dt><?= $user['id'] ?></dt>
            <!-- 「user_id」クエリパラメータ付きのリンク -->
            <li><a href="?user_id=<?= $user['id'] ?>"><?= $user['account_name'] ?></a></li>
            <li><?= $user['name'] ?></li>
            <li><?= $user['email'] ?></li>
            <li><?= $user['password'] ?></li>
        <?php endforeach ?>
    </ul>

    <h3>select user</h3>
    <?php if (isset($select_user) && $select_user["id"] > 0) : ?>
        <ul>
            <dt><?= $select_user['id']  ?></dt>
            <li><?= $select_user['account_name']  ?></li>
            <li><?= $select_user['name']  ?></li>
            <li><?= $select_user['email']  ?></li>
            <li><?= $select_user['password']  ?></li>
        </ul>
    <?php endif ?>
</body>

</html>