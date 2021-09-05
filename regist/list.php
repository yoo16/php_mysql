<?php
require_once 'config.php';
require_once 'connect.php';

//ユーザデータの読み込み
$users = all($pdo);

function all($pdo, $limit = 20, $offset = 0)
{
    $sql = "SELECT * FROM users LIMIT {$limit} OFFSET {$offset};";
    $users = $pdo->query($sql);
    return $users;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>ユーザ一覧</h2>
        <div>
            <a href="input.php" class="btn btn-outline-primary">新規登録</a>
        </div>
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>氏名</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button class="btn btn-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>