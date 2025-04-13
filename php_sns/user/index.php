<?php
require_once '../app.php';

// ユーザセッションの確認
if (!isset($_SESSION[APP_KEY]['user'])) {
    // ログインしていない場合はログイン画面にリダイレクト
    header('Location: ../login/');
    exit;
}
$user = $_SESSION[APP_KEY]['user'];
?>

<!DOCTYPE html>
<html lang="ja">

<?php include '../components/nav.php' ?>

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