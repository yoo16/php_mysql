<?php
require_once 'env.php';
require_once 'lib/Database.php';

// POSTリクエストの場合、ユーザデータを更新
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = update($_POST);
}

// ユーザデータを更新する関数
function update($posts)
{
    // DB接続
    $pdo = Database::getInstance();
    // SQL作成
    $sql = "UPDATE users SET account_name = :account_name WHERE id = :id;";
    try {
        // SQLを設定して、プリペアードステートメントを生成
        $stmt = $pdo->prepare($sql);
        // SQL実行
        return $stmt->execute($posts);
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $error = "ユーザの更新に失敗しました。" . $e->getMessage();
        return $error;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザ更新</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="mx-auto bg-white  p-6">
        <h2 class="text-2xl mb-6">ユーザ更新</h2>
        <form action="" method="post" class="mb-8">
            <div class="flex items-center gap-4">
                <input
                    type="text"
                    name="id"
                    id="id"
                    class="w-48 px-4 py-2 border border-gray-300 rounded-md"
                    placeholder="id">
                <input
                    type="text"
                    name="account_name"
                    id="account_name"
                    class="w-48 px-4 py-2 border border-gray-300 rounded-md"
                    placeholder="account_name">
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded">
                    更新
                </button>
            </div>
        </form>

        <h2 class="py-2 text-2xl">結果</h2>
        <?php if (isset($result)): ?>
            <div class="border-b border-gray-200 p-2">
                <?= $result ?>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>