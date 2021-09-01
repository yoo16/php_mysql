<div class="container">
    <h2 class="h2">商品一覧</h2>
    <div class="mb-3">
        <form action="index.php" method="get">
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
                <button class="btn btn-primary">検索</button>
                <a href="index.php" class="btn btn-outline-primary">クリア</a>
            </div>
        </form>
    </div>

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