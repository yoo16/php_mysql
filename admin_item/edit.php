<?php
require_once 'config.php';
require_once 'connect.php';

if (!empty($_GET['id'])) $item = findById($pdo, $_GET['id']);
if (empty($item)) header('Location: list.php');

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
<html lang="ja">

<?php include('components/head.php') ?>

<body>
    <div class="container">
        <h2 class="h2">商品登録</h2>
        <form action="update.php" method="post">
            <div class="mb-3 form-floating">
                <input id="code" type="text" class="form-control" name="code" value="<?= $item['code'] ?>">
                <label for="code">商品コード</label>
                <p class="text-danger pt-2"><?= @$errors['code'] ?></p>
            </div>
            <div class="mb-3 form-floating">
                <input id="name" type="text" class="form-control" name="name" value="<?= $item['name'] ?>">
                <label for="name">商品名</label>
                <p class="text-danger pt-2"><?= @$errors['name'] ?></p>
            </div>
            <div class="mb-3 form-floating">
                <input id="price" type="text" class="form-control" name="price" value="<?= $item['price'] ?>">
                <label for="price">価格</label>
                <p class="text-danger pt-2"><?= @$errors['price'] ?></p>
            </div>
            <div class="mb-3 form-floating">
                <input id="stock" type="text" class="form-control" name="stock" value="<?= $item['stock'] ?>">
                <label for="stock">在庫</label>
                <p class="text-danger pt-2"><?= @$errors['stock'] ?></p>
            </div>
            <button class="btn btn-primary">登録</button>
            <a class="btn btn-outline-primary" href="list.php">戻る</a>
            <input type="hidden" value="<?= $item['id'] ?>">
        </form>
    </div>
</body>

</html>