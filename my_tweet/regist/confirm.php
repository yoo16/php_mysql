<?php
require_once('../app.php');

//POSTリクエストチェック
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: input.php');
    exit;
}

$user = new User();
$data = $user->check($_POST);
$_SESSION['regist'] = $data;
if ($errors = $user->validateRegist($data)) {
    $_SESSION['errors'] = $errors;
    header('Location: input.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include('../components/head.php') ?>

<body>
    <div class="container">
        <h2 class="h2">アカウント登録</h2>
        <p>
            この内容で登録しますか？
        </p>
        <div class="form-group  mb-3">
            <label for="" class="form-label col-2">氏名</label>
            <?= $regist['name'] ?>
        </div>

        <div class="form-group  mb-3">
            <label for="" class="form-label col-2">メールアドレス</label>
            <?= $regist['email'] ?>
        </div>

        <div>
            <form action="add.php" method="post">
                <?php if (empty($errors)) : ?>
                    <button class="btn btn-primary">登録</button>
                <?php endif ?>
                <a href="input.php" class="btn btn-outline-primary">戻る</a>
            </form>
        </div>
    </div>
</body>

</html>