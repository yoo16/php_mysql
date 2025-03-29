<?php
require_once "../app.php";
?>

<!DOCTYPE html>
<html lang="ja">

<?php include('../components/head.php') ?>

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
            <h2 class="text-2xl mb-3 font-normal text-center">Sign in</h2>
            <form action="login/auth.php" method="post">
                <div class="relative mb-4">
                    <div class="relative mb-4">
                        <input type="email" name="email" id="email" class="block
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


                    <div>
                        <button id="submit_button" class="w-full
                        mb-2 py-2 px-4 bg-sky-500 
                        hover:bg-sky-700 
                        text-white 
                        rounded-lg
                        disabled:bg-blue-300">
                            Sign in
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>