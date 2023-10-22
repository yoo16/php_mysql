<?php
require_once('../app.php');

checkPost();

$user = new User();
$post = $user->check($_POST);
$_SESSION['regist'] = $post;
if ($errors = $user->validateRegist($post)) {
    $_SESSION['errors'] = $errors;
    header('Location: input.php');
    exit;
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
                この内容で登録しますか？
            </p>
            <div class="form-group  mb-3">
                <label for="" class="form-label col-2">氏名</label>
                <?= $post['name'] ?>
            </div>

            <div class="form-group  mb-3">
                <label for="" class="form-label col-2">Email</label>
                <?= $post['email'] ?>
            </div>

            <div>
                <form action="add.php" method="post">
                    <?php if (empty($errors)) : ?>
                        <button class="w-100 mb-2 btn btn-primary">登録</button>
                    <?php endif ?>
                    <a href="input.php" class="w-100 btn btn-outline-primary">戻る</a>
                </form>
            </div>
        </div>
    </main>
</body>

</html>