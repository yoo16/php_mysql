<div class="container">
    <h2 class="h2 p-3 bg-light">ユーザ一覧</h2>
    <p><?= $count ?>件</p>
    <table class="table">
        <tr>
            <th>氏名</th>
            <th>メールアドレス</th>
            <th>性別</th>
            <th>作成日</th>
            <th>更新日</th>
        </tr>
        <?php if ($users) : ?>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= Form::gender($user['gender']) ?></td>
                    <td><?= $user['created_at'] ?></td>
                    <td><?= $user['updated_at'] ?></td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </table>

    <?php include('app/views/components/paginate.php') ?>
</div>