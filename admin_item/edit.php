<?php
require_once 'config.php';
require_once 'connect.php';

if (isset($_GET['id'])) $item = findById($pdo, $_GET['id']);
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