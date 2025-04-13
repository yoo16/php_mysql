<?php
// env.php ファイルの読み込み
require_once '../env.php';
// Database.php ファイルの読み込み
require_once '../Database.php';

$users = get();

// ユーザデータを取得する関数
function get($limit = 10)
{
    try {
        // DB接続
        $pdo = Database::getInstance();
        // SQL作成
        $sql = "SELECT * FROM users LIMIT {$limit};";
        // queryメソッドでSQLを実行し、PDOStatementオブジェクトを取得
        $stmt = $pdo->query($sql);
        // Userデータを取得
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // 取得したデータを返却
        return $users;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        exit('システムエラーが発生しました。');
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザ一覧</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="mx-auto bg-white p-6">
        <h2 class="py-2 text-2xl mt-6">ユーザ一覧</h2>
        <div class="overflow-hidden">
            <div class="grid grid-cols-4 bg-gray-200 p-2 rounded-t">
                <div>id</div>
                <div>account_name</div>
                <div>email</div>
                <div>display_name</div>
            </div>
            <?php foreach ($users as $user): ?>
                <div class="grid grid-cols-4 border-b border-gray-200 p-2">
                    <div><?= $user['id'] ?></div>
                    <div><?= $user['account_name'] ?></div>
                    <div><?= $user['email'] ?></div>
                    <div><?= $user['display_name'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>