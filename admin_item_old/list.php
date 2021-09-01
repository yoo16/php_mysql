<?php
require_once 'config.php';
require_once 'connect.php';

if (isset($_GET['keyword']) || isset($_GET['code'])) {
    $params = check($_GET);
    $items = search($pdo, $params);
} else {
    $items = all($pdo);
}

function all($pdo, $limit = 20, $offset = 0)
{
    $sql = "SELECT * FROM items LIMIT {$limit} OFFSET {$offset};";
    $items = $pdo->query($sql);
    return $items;
}

function search($pdo, $params, $limit = 20, $offset = 0)
{
    $sql = "SELECT * FROM items";
    $conditions = [];
    if ($params['keyword']) $conditions[] = "name LIKE '%{$params['keyword']}%'";
    if ($params['code']) $conditions[] = "code LIKE '%{$params['code']}%'";
    if ($conditions) {
        $condition = implode(' AND ', $conditions);
        $sql .= " WHERE {$condition}";
    }
    $sql .= " LIMIT {$limit} OFFSET {$offset};";
    $items = $pdo->query($sql);
    return $items;
}

function check($posts)
{
    if (empty($posts)) return;
    foreach ($posts as $column => $post) {
        $posts[$column] = htmlspecialchars($post, ENT_QUOTES);
    }
    return $posts;
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include('components/head.php') ?>

<body>
    <div class="container">
        <div class="mb-3">
            <details>
                <summary>検索</summary>
                <form action="list.php" method="get">
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">商品コード</label>
                            <input class="form-control" type="text" name="code" value="<?= @$params['code'] ?>">
                        </div>
                        <div class="col-4 form-inline">
                            <label class="form-label">キーワード</label>
                            <input class="form-control" type="text" name="keyword" value="<?= @$params['keyword'] ?>">
                        </div>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-outline-primary">検索</button>
                        <a href="list.php" class="btn btn-outline-primary">クリア</a>
                    </div>
                </form>
            </details>
        </div>

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
            <?php if ($items) : ?>
                <?php foreach ($items as $item) : ?>
                    <tr>
                        <td><a class="btn btn-outline-primary" href="edit.php?id=<?= $item['id'] ?>">編集</a></td>
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