<?php
session_start();

//セッションデータ取得
if (!empty($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
if (!empty($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1 class="h1 text-center p-3">ユーザ登録</h1>
        <form action="add.php" method="post">
            <div class="mb-3 form-floating">
                <input id="code" type="text" class="form-control" name="name" value="<?= @$user['name'] ?>">
                <label for="code">氏名</label>
                <p class="text-danger pt-2"><?= @$errors['name'] ?></p>
            </div>
            <div class="mb-3 form-floating">
                <input id="code" type="text" class="form-control" name="email" value="<?= @$user['email'] ?>">
                <label for="code">Email</label>
                <p class="text-danger pt-2"><?= @$errors['email'] ?></p>
            </div>
            <div class="mb-3 form-floating">
                <input id="code" type="password" class="form-control" name="password">
                <label for="code">パスワード</label>
                <p class="text-danger pt-2"><?= @$errors['password'] ?></p>
            </div>
            <button class="btn btn-primary">登録</button>
            <a href="list.php" class="btn btn-outline-primary">戻る</a>
        </form>
    </div>
</body>

</html>