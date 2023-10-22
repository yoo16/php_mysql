<?php
require_once '../app.php';

if (!empty($_SESSION['login'])) {
    $user = $_SESSION['login'];
}
if (!empty($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include('../components/head.php') ?>

<body>
    <div class="container">
        <main id="login" class="d-flex justify-content-center">
            <div class="w-50 mt-3 p-5 bg-light">
                <form action="auth.php" method="post">
                    <h3 class="h3 mb-3 fw-normal">Sign In</h3>

                    <?php include('../components/error_messages.php') ?>

                    <div class="form-floating mb-1">
                        <input type="text" name="email" value="<?= @$user['email'] ?>" class="form-control border-0 border-bottom rounded-0" id="email">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-1">
                        <input type="password" name="password" class="form-control border-0 border-bottom rounded-0" id="password">
                        <label for="password">パスワード</label>
                    </div>
                    <button class="w-100 btn btn-primary">Sign In</button>
                </form>
                <div class="mt-3">
                    <a href="../regist/" class="w-100 btn btn-outline-primary">会員登録</a>
                </div>
            </div>
        </main>
    </div>

</body>

</html>