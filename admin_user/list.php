<?php
require_once 'config.php';
require_once 'connect.php';

function all($pdo, $limit = 10, $offset = 0)
{
    $sql = "SELECT * FROM users LIMIT {$limit} OFFSET {$offset};";
    $rows = [];
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows[] = $row;
    }
    return $rows;
}

function userCount($pdo)
{
    $sql = "SELECT count(id) AS count FROM users;";
    $row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    return $row['count'];
}

function labelGender($value)
{
    $genders = ['male' => '男性', 'female' => '女性'];
    return ($value) ? $genders[$value] : '';
}

function paginate($count, $current_page, $limit = 10, $per_count = 10)
{
    $page_count = ceil($count / $limit);
    $page_start = $current_page;
    $page_end = $page_start + $per_count - 1;
    if ($page_end > $page_count) {
        $page_end = $page_count;
        $page_start = $page_end - $per_count + 1;
    }
    if ($page_start < 0) $page_start = 1;

    $page_prev = ($current_page <= 1) ? 1 : $current_page - 1;
    $page_next = ($current_page < $page_count) ? $current_page + 1 : $page_count;

    $pages = range($page_start, $page_end);

    $paginate = compact(
        'page_count',
        'page_start',
        'page_end',
        'page_prev',
        'page_next',
        'pages',
    );
    return $paginate;
}

//ユーザ数
$count = userCount($pdo);

//現在のページ
$current_page = (isset($_GET['page'])) ? $_GET['page'] : 1;

//limit & offset
$limit = 10;
$offset = ($current_page > 1) ? $current_page - 1 : 0;

//ユーザ一覧データ
$users = all($pdo, $limit, $offset);

//paginate
$paginate = paginate($count, $current_page, $limit, 5);
extract($paginate);
?>

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

        <?php include('components/paginate.php') ?>

    </div>
</body>

</html>