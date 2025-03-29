<?php
require_once 'env.php';
require_once 'lib/Database.php';

$user_id = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POSTリクエストの場合、ユーザデータを登録
    // var_dump($_POST);
    $user_id = insert($_POST);
}

// POSTリクエストの場合、ユーザデータを登録
function insert($posts)
{
    $posts['password'] = password_hash($posts['password'], PASSWORD_DEFAULT);
    // DB接続
    $pdo = Database::getInstance();
    // SQL作成
    $sql = "INSERT INTO users (account_name, email, password, display_name)
        VALUES(:account_name, :email, :password, :display_name);";

    // SQLを設定して、プリペアードステートメントを生成
    $stmt = $pdo->prepare($sql);
    // SQL実行
    $result = $stmt->execute($posts);
    // 成功した場合は、登録したユーザのIDを取得
    if ($result) {
        $user_id = $pdo->lastInsertId();
        // 登録したユーザのIDを返却
        return $user_id;
    }
    return;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザ追加</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="mx-auto bg-white  p-6">
        <h2 class="text-2xl mb-6">新規追加</h2>
        <form action="" method="post" class="mb-8 space-y-4">
            <div>
                <label for="account_name" class="block">アカウント名</label>
                <input type="text" name="account_name" id="account_name" required class="border p-2 w-full">
            </div>

            <div>
                <label for="email" class="block">メールアドレス</label>
                <input type="email" name="email" id="email" required class="border p-2 w-full">
            </div>

            <div>
                <label for="display_name" class="block">表示名</label>
                <input type="text" name="display_name" id="display_name" required class="border p-2 w-full">
            </div>

            <div>
                <label for="password" class="block">パスワード</label>
                <input type="password" name="password" id="password" required class="border p-2 w-full">
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">登録</button>
            </div>
        </form>

        <h2 class="text-2xl mb-6">結果</h2>
        <div class="bg-gray-100 p-4 rounded-md">
            <?php if (!empty($user_id)): ?>
                <?= $user_id ?>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>