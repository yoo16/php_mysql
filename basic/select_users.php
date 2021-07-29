<?php
require_once 'connect.php';

$sql = 'SELECT * FROM users LIMIT 10;';
$users = fetchAll($pdo, $sql);

function fetchAll($pdo, $sql)
{
    $rows = [];
    // $rows = $pdo->query($sql)->fetchAll();
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows[] = $row;
    }
    return $rows;
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
        <h2>ユーザ一覧</h2>
        <table class="table">
            <tr>
                <th>氏名</th>
                <th>メールアドレス</th>
                <th>性別</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= labelGender($user['gender']) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>