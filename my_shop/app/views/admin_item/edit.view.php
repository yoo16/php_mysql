<div class="container">
    <h2 class="h2">商品登録</h2>
    <form action="update.php" method="post">
        <div class="mb-3 form-floating">
            <input id="code" type="text" class="form-control" 
            name="code" value="<?= $item->value['code'] ?>">
            <label for="code">商品コード</label>
            <p class="text-danger pt-2"><?= @$errors['code'] ?></p>
        </div>
        <div class="mb-3 form-floating">
            <input id="name" type="text" class="form-control" 
            name="name" value="<?= $item->value['name'] ?>">
            <label for="name">商品名</label>
            <p class="text-danger pt-2"><?= @$errors['name'] ?></p>
        </div>
        <div class="mb-3 form-floating">
            <input id="price" type="text" class="form-control" 
            name="price" value="<?= $item->value['price'] ?>">
            <label for="price">価格</label>
            <p class="text-danger pt-2"><?= @$errors['price'] ?></p>
        </div>
        <div class="mb-3 form-floating">
            <input id="stock" type="text" class="form-control" 
            name="stock" value="<?= $item->value['stock'] ?>">
            <label for="stock">在庫</label>
            <p class="text-danger pt-2"><?= @$errors['stock'] ?></p>
        </div>
        <div>
            <button class="btn btn-primary">登録</button>
            <a class="btn btn-outline-primary" href="index.php">戻る</a>
            <input type="hidden" name="id" value="<?= $item->value['id'] ?>">
        </div>
    </form>

    <form action="delete.php" method="post" class="mt-3">
        <button class="btn btn-danger" onClick="return confirm('削除しても良いですか？')">削除</button>
        <input type="hidden" name="id" value="<?= $item->value['id'] ?>">
    </form>
</div>