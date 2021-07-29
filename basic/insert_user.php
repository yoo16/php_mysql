<?php
require_once 'connect.php';

$user = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST;
    $errors = validate($user);
    if (empty($errors)) {
        insert($pdo, $user);
    }
}

function validate($user)
{
    $errors = [];
    if (empty($user['name'])) {
        $errors['name'] = 'ユーザ名を入力してください';
    }
    if (empty($user['email'])) {
        $errors['email'] = 'メールアドレスを入力してください';
    }
    if (empty($user['password'])) {
        $errors['password'] = 'パスワードを入力してください';
    }
    return $errors;
}

function insert($pdo, $posts)
{
    $sql = "INSERT INTO users (name, email, password, gender)
        VALUES (:name, :email, :password, :gender);";
    $stmt = $pdo->prepare($sql);
    try {
        return $stmt->execute($posts);
    } catch (PDOException $e) {
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="h2">会員登録</h2>

        <form action="" method="post">
            <div class="mb-3">
                <label for="">氏名</label>
                <input type="text" class="form-control" name="name" value="<?= @$user['name'] ?>">
                <p class="text-danger"><?= @$errors['name'] ?></p>
            </div>

            <div class="mb-3">
                <label for="">メールアドレス</label>
                <input type="text" class="form-control" name="email" value="<?= @$user['email'] ?>">
                <p class="text-danger"><?= @$errors['email'] ?></p>
            </div>

            <div class="mb-3">
                <label for="">パスワード</label>
                <input type="password" class="form-control" name="password">
                <p class="text-danger"><?= @$errors['password'] ?></p>
            </div>

            <div class="mb-3">
                <div>
                    <label for="">性別</label>
                </div>
                <div class="form-check form-check-inline">
                    <input id="gender_male" class="form-check-input" type="radio" name="gender" value="male">
                    <label for="gender_male" class="form-check-label">男性</label>
                </div>

                <div class="form-check form-check-inline">
                    <input id="gender_female" class="form-check-input" type="radio" name="gender" value="female">
                    <label for="gender_female" class="form-check-label">女性</label>
                </div>
            </div>

            <button class="btn btn-primary">確認</button>
        </form>
    </div>
</body>

</html>