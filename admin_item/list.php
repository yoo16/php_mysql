<?php
require_once '../config.php';
require_once '../connect.php';

$sql = "SELECT * FROM items;";
$items = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="h2">商品一覧</h2>
        <table class="table">
            <tr>
                <th><a class="btn btn-outline-primary" href="input.php">新規</a></th>
                <th>コード</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>更新日</th>
            </tr>
            <?php foreach($items as $item): ?>
            <tr>
                <td><a class="btn btn-outline-primary" href="edit.php?id=<?= $item['id'] ?>">編集</a></td>
                <td><?= $item['code'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['price'] ?></td>
                <td><?= $item['stock'] ?></td>
                <td><?= $item['updated_at'] ?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>