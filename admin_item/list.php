<?php
require_once 'config.php';
require_once 'connect.php';

$items = all($pdo);

function all($pdo, $limit=20, $offset=0)
{
    $sql = "SELECT * FROM items LIMIT {$limit} OFFSET {$offset};";
    $items = $pdo->query($sql);
    return $items;
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include('components/head.php') ?>

<body>
    <div class="container">
        <h2 class="h2">商品一覧</h2>
        <table class="table">
            <tr>
                <th><a class="btn btn-outline-primary" 
                href="input.php">新規</a></th>
                <th>コード</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>更新日</th>
            </tr>
            <?php if ($items) : ?>
                <?php foreach ($items as $item) : ?>
                    <tr>
                        <td><a class="btn btn-outline-primary" 
                        href="edit.php?id=<?= $item['id'] ?>">編集</a></td>
                        <td><?= $item['code'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['stock'] ?></td>
                        <td><?= $item['updated_at'] ?></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </table>
    </div>
</body>

</html>