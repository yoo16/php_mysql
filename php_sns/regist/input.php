<?php
require_once "../app.php";

if (isset($_SESSION[APP_KEY]['regist'])) {
    $regist = $_SESSION[APP_KEY]['regist'];
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
    <main id="regist" class="flex justify-center">
        <div class="w-1/2 mt-3 p-5">
            <h2 class="text-2xl mb-3 font-normal text-center">Sign Up</h2>
            <form action="regist/confirm.php" method="post">
                <div class="relative mb-4">
                    <input type="text" name="account_name" id="account_name" value="<?= @$regist['account_name'] ?>" class="block
                        px-2.5 pb-2.5 pt-6 mb-3
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer" placeholder=" " required>
                    <label for="account_name" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4 
                        origin-[0] start-2.5 
                        peer-focus:px-0
                        peer-focus:text-blue-600 
                        peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 
                        peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 
                        peer-focus:-translate-y-4">
                        アカウント名
                    </label>
                </div>
                <div class="relative mb-4">
                    <input type="email" name="email" value="<?= @$regist['email'] ?>" id="email" class="block
                        px-2.5 pb-2.5 pt-6 mb-3
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer" placeholder=" " required>
                    <label for="email" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4 
                        origin-[0] start-2.5 
                        peer-focus:px-0
                        peer-focus:text-blue-600 
                        peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 
                        peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 
                        peer-focus:-translate-y-4">
                        Email
                    </label>
                </div>
                <div class="relative mb-4">
                    <input type="password" name="password" id="password" class="block
                        px-2.5 pb-2.5 pt-6 mb-3 
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer" placeholder=" " required>
                    <label for="password" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4 
                        origin-[0] start-2.5 
                        peer-focus:px-0
                        peer-focus:text-blue-600 
                        peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 
                        peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 
                        peer-focus:-translate-y-4">
                        パスワード
                    </label>
                </div>

                <div class="relative mb-4">
                    <input type="text" name="name" value="<?= @$regist['name'] ?>" id="name" class="block
                        px-2.5 pb-2.5 pt-6 mb-3
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer" placeholder=" " required>
                    <label for="name" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4 
                        origin-[0] start-2.5 
                        peer-focus:px-0
                        peer-focus:text-blue-600 
                        peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 
                        peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 
                        peer-focus:-translate-y-4">
                        名前
                    </label>
                </div>

                <div>
                    <button id="submit_button" class="w-full
                        mb-2 py-2 px-4 bg-sky-500 
                        hover:bg-sky-700 
                        text-white 
                        rounded-lg
                        disabled:bg-blue-300">
                        次へ
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>