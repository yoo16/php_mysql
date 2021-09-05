<?php
require_once 'config.php';
require_once 'connect.php';

//POSTデータがあれば書き込み
if (!empty($_POST)) {
    $posts = check($_POST);
    $errors = validate($posts);
    if (!$errors && insert($pdo, $_POST)) {
        header('Location: list.php');
        exit;
    }
}

//書き込みの関数
function check($posts)
{
    if (empty($posts)) return;
    foreach ($posts as $column => $post) {
        $posts[$column] = htmlspecialchars($post, ENT_QUOTES, 'UTF-8');
    }
    return $posts;
}

function validate($data)
{
    $errors = [];
    if (empty($data['name'])) $errors['name'] = '氏名を入力してください。';
    if (empty($data['email'])) $errors['email'] = 'Emailを入力してください。';
    if (empty($data['password'])) $errors['password'] = 'パスワードを入力してください。';
    return $errors;
}

function insert($pdo, $data)
{
    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name, email, password)
            VALUES (:name, :email, :password)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
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
        <form action="" method="post">
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
        </form>
    </div>
</body>

</html>