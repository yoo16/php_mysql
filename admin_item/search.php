<?php
require_once 'config.php';
require_once 'connect.php';

$sql = "SELECT * FROM users";
$keyword = (isset($_GET['keyword'])) ? $_GET['keyword'] : '';
$limit = (isset($_GET['limit'])) ? $_GET['limit'] : 10;
$offset = (isset($_GET['offset'])) ? $_GET['offset'] : 0;

$users = all($pdo, $sql, $keyword, $limit, $offset);

function all($pdo, $sql, $keyword, $limit, $offset)
{
    if ($keyword) {
        $sql .= " WHERE ";
        $sql .= "name LIKE '%{$keyword}%' OR ";
        $sql .= "email LIKE '%{$keyword}%'";
    }
    $sql .= " LIMIT {$limit}";
    $sql .= " OFFSET {$offset}";
    $sql .= ";";

    $rows = [];
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows[] = $row;
    }
    return $rows;
}

function userCount($pdo)
{
    $sql = 'SELECT count(*) FROM users;';
    $row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    var_dump($row);
    $count = $row['count'];
}

function labelGender($value)
{
    $genders = ['male' => '男性', 'female' => '女性'];
    return ($value) ? $genders[$value] : '';
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
        <h2 class="h2 p-3 bg-light">ユーザ一覧</h2>
        <form action="" method="get" class="row col-6">
            <div class="input-group mb-3">
                <input type="text" name="keyword" value="<?= @$_GET['keyword'] ?>" class="form-control" placeholder="キーワード">
                <button class="btn btn-outline-primary">検索</button>
            </div>
        </form>

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
    </div>
</body>

</html>