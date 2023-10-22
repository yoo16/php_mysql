<?php
session_start();

//セッションデータ取得
if (!empty($_SESSION['regist'])) {
    $regist = $_SESSION['regist'];
}
if (!empty($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('../components/head.php') ?>

<body>
    <main id="login" class="d-flex justify-content-center">
        <div class="w-50 mt-3 p-5 bg-light">
            <form action="confirm.php" method="post">
                <h3 class="h3 mb-3 fw-normal">アカウント登録</h3>
                <div class="form-floating">
                    <input type="text" name="name" value="<?= @$regist['name'] ?>" class="form-control" id="name">
                    <label for="name">氏名</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="email" value="<?= @$regist['email'] ?>" class="form-control" id="email">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password">
                    <label for="password">パスワード</label>
                </div>

                <div>
                    <?php include('../components/error_messages.php') ?>

                    <button class="mt-2 w-100 btn btn-lg btn-primary">確認</button>
                    <a href="../login/" class="mt-2 w-100 btn btn-lg btn-outline-primary">Sign in</a>
                </div>
            </form>

        </div>
    </main>
</body>

</html>