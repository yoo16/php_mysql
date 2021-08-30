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
                        <td><?= labelGender($user['gender']) ?></td>
                        <td><?= $user['created_at'] ?></td>
                        <td><?= $user['updated_at'] ?></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </table>

        <?php include('views/components/paginate.php') ?>

    </div>
</body>

</html>