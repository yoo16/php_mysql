<?php
require_once('../app.php');

//セッション削除
if (!empty($_SESSION['regist'])) {
    unset($_SESSION['regist']);
} else {
    header('Location: ./');
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include('../components/head.php') ?>

<body>
    <div class="container">
        <h2 class="h2">アカウント登録</h2>
        <p>
            アカウントを登録しました。
        </p>
        <a href="../login/" class="btn btn-outline-primary">ログイン</a>
    </div>
</body>

</html>