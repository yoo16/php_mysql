<?php
// env.php ファイルの読み込み
require_once 'env.php';
// Database.php ファイルの読み込み
require_once 'lib/Database.php';

// PDOインスタンスを取得
$pdo = Database::getInstance();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="mx-auto bg-white p-6">
        <h2 class="text-2xl text-center p-6">接続情報</h2>
        <div class="grid grid-cols-2 gap-2 bg-gray-200 p-2 rounded-md">
            <div>DB_CONNECTION</div>
            <div><?= $db_connection ?></div>
            <div>DB_DATABASE</div>
            <div><?= $db_name ?></div>
            <div>DB_HOST</div>
            <div><?= $db_host ?></div>
            <div>DB_PORT</div>
            <div><?= $db_port ?></div>
            <div>DB_USERNAME</div>
            <div><?= $db_user ?></div>
            <div>DB_PASSWORD</div>
            <div><?= $db_password ?></div>
        </div>

        <h2 class="text-2xl text-center p-2">PDO</h2>
        <div class="bg-gray-200 p-6 rounded-md">
            <?= var_dump($pdo) ?>
        </div>
    </main>
</body>

</html>