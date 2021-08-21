<!DOCTYPE html>
<html lang="ja">

<?php include('app/views/components/head.php') ?>

<body>
    <?php include('app/views/components/admin_nav.php') ?>

    <div class="container">
        <h2 class="h2 p-3 bg-light">ユーザ一覧</h2>
        <p><?= $count ?>件</p>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th class="w-25">氏名</th>
                    <th class="w-25">メールアドレス</th>
                    <th>性別</th>
                    <th>作成日</th>
                    <th>更新日</th>
                </tr>
                <?php if ($users) : ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= Form::labelGender($user['gender']) ?></td>
                            <td><?= $user['created_at'] ?></td>
                            <td><?= $user['updated_at'] ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </table>
        </div>

        <?php include('app/views/components/paginate.php') ?>
    </div>
</body>

</html>