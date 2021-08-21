<?php
session_start();

if (isset($_SESSION['item'])) $item = $_SESSION['item'];
if (isset($_SESSION['errors'])) $errors = $_SESSION['errors'];
?>

<!DOCTYPE html>
<html lang="ja">

<?php include('components/head.php') ?>

<body>
    <div class="container">
        <h2 class="h2">商品登録</h2>
        <form action="add.php" method="post">
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