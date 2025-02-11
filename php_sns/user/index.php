<?php 
require_once '../app.php';

if (empty($_SESSION[APP_KEY]['user'])) {
    header('Location: ../login/');
} else {
    $user = $_SESSION[APP_KEY]['user'];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_TITLE ?></title>
    <base href="<?= BASE_URL ?>">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<main class="flex justify-center">
        <div class="w-full mt-3 p-5">
            <h2 class="text-2xl mb-3 font-normal text-center">ユーザホーム</h2>
            <div class="mb-4">
                <p class="text-center text-gray-700 text-md"><?= $user['name'] ?>さん</p>
            </div>
            <div class="mb-4 flex justify-center">
                <a href="user/logout.php" class="w-full
                        mx-1 mb-4 py-2 px-4
                        text-gray-500 
                        text-center
                        bg-gray-100
                        hover:bg-gray-200 
                        rounded">
                    ログアウト
                </a>
            </div>
        </div>
    </main>
</body>

</html>