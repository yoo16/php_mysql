<?php
require_once('../app.php');

if (!empty($_SESSION['regist'])) {
    unset($_SESSION['regist']);
    // } else {
    //     header('Location: ./');
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include('../components/head.php') ?>

<body>
    <main id="login" class="d-flex justify-content-center">
        <div class="w-50 mt-3 p-5 bg-light">
            <h2 class="h2">アカウント登録</h2>
            <p>
                アカウントを登録しました。
            </p>
            <a href="../login/" class="w-100 btn btn-outline-primary">ログイン</a>
        </div>
    </main>
</body>

</html>