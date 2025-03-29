<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザ検索</title>
    <!-- ✅ TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="mx-auto bg-white p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-700">Menu</h2>
        <ul class="space-y-2">
            <li><a href="connect_test.php" class="text-blue-600" target="_blank">PDO接続テスト</a></li>
            <li><a href="connect_test.php" class="text-blue-600" target="_blank">PDO接続テスト（クラス化）</a></li>
            <li><a href="select_users.php" class="text-blue-600" target="_blank">SELECT: ユーザ一覧</a></li>
            <li><a href="find_user.php" class="text-blue-600" target="_blank">WHERE: ユーザ検索</a></li>
            <li><a href="insert_user.php" class="text-blue-600" target="_blank">INSERT: ユーザ追加</a></li>
            <li><a href="update_user.php" class="text-blue-600" target="_blank">UPDATE: ユーザ更新</a></li>
            <li><a href="delete_user.php" class="text-blue-600" target="_blank">DELETE: ユーザ削除</a></li>
            <li><a href="user_tweets.php" class="text-blue-600" target="_blank">JOIN: 投稿一覧</a></li>
        </ul>
    </main>
</body>

</html>