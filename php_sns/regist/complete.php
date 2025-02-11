<?php
require_once "../app.php";

if (isset($_SESSION[APP_KEY]['regist'])) {
    unset($_SESSION[APP_KEY]['regist']);
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
    <main id="register" class="flex justify-center">
        <div class="w-1/2 mt-3 p-5">
            <h2 class="text-2xl mb-3 font-normal text-center">ユーザ登録完了</h2>
            <div class="mb-4">
                <p class="text-center text-gray-700 text-md">ユーザ登録が完了しました。</p>
            </div>
            <div class="mb-4 flex justify-center">
                <a href="login/" class="w-full
                        mx-1 mb-4 py-2 px-4
                        text-gray-500 
                        text-center
                        bg-gray-100
                        hover:bg-gray-200 
                        rounded">
                    ログイン
                </a>
                <a href="" class="w-full
                        mx-1 mb-4 py-2 px-4
                        text-gray-500 
                        text-center
                        bg-gray-100
                        hover:bg-gray-200 
                        rounded">
                    トップ
                </a>
            </div>
        </div>
    </main>
</body>

</html>