<?php
require_once '../config.php';
require_once '../connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item = check($_POST);
    $errors = validate($item);
    if (!$errors) {
        insert($pdo, $item);
    }
}

function check($posts)
{
    if (empty($posts)) return;
    foreach ($posts as $column => $post) {
        $posts[$column] = htmlspecialchars($post, ENT_QUOTES);
    }
    return $posts;
}

function validate($data)
{
    $errors = [];
    if (empty($data['code'])) {
        $errors['code'] = '商品コードを入力してください。';
    }
    if (empty($data['name'])) {
        $errors['name'] = '商品名を入力してください。';
    }
    if (empty($data['price'])) {
        $errors['price'] = '価格を入力してください。';
    }
    if ($data['stock'] < 0) {
        $errors['stock'] = '在庫数を入力してください。';
    }
    return $errors;
}

function insert($pdo, $data)
{
    $sql = "INSERT INTO items (code, name, price, stock)
            VALUES (:code, :name, :price, :stock)";
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
        <h2 class="h2">商品登録</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="">商品コード</label>
                <input type="text" class="form-control" name="code" value="<?= @$item['code'] ?>">
                <p class="badge bg-danger p-2"><?= @$errors['code'] ?></p>
            </div>
            <div class="mb-3">
                <label for="">商品名</label>
                <input type="text" class="form-control" name="name" value="<?= @$item['name'] ?>">
                <p class="badge bg-danger p-2"><?= @$errors['name'] ?></p>
            </div>
            <div class="mb-3">
                <label for="">価格</label>
                <input type="text" class="form-control" name="price" value="<?= @$item['price'] ?>">
                <p class="badge bg-danger p-2"><?= @$errors['price'] ?></p>
            </div>
            <div class="mb-3">
                <label for="">在庫</label>
                <input type="text" class="form-control" name="stock" value="<?= @$item['stock'] ?>">
                <p class="badge bg-danger p-2"><?= @$errors['stock'] ?></p>
            </div>
            <button class="btn btn-primary">登録</button>
            <a class="btn btn-outline-primary" href="list.php">戻る</a>
        </form>
    </div>
</body>

</html>