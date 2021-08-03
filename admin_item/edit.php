<?php
require_once '../config.php';
require_once '../connect.php';


if (empty($_GET['id'])) {
    header('Location: list.php');
}
$item = findById($pdo, $_GET['id']);

function findById($pdo, $id)
{
    $id = htmlspecialchars($id);
    $sql = "SELECT * FROM items WHERE id = {$id}";
    $stmt = $pdo->query($sql);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    return $item;
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
        <form action="update.php" method="post">
            <div class="mb-3">
                <label for="">商品コード</label>
                <input type="text" class="form-control" name="code" value="<?= $item['code'] ?>">
            </div>
            <div class="mb-3">
                <label for="">商品名</label>
                <input type="text" class="form-control" name="name" value="<?= $item['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="">価格</label>
                <input type="text" class="form-control" name="price" value="<?= $item['price'] ?>">
            </div>
            <div class="mb-3">
                <label for="">在庫</label>
                <input type="text" class="form-control" name="stock" value="<?= $item['stock'] ?>">
            </div>
            <button class="btn btn-primary">登録</button>
            <a href="list.php" class="btn btn-outline-primary">戻る</a>

            <input type="hidden" name="id" value="<?= $item['id'] ?>">
        </form>
    </div>
</body>

</html>