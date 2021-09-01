<?php
require_once 'config.php';
require_once 'connect.php';

function all($pdo, $limit = 20, $offset = 0)
{
    $sql = "SELECT * FROM items LIMIT {$limit} OFFSET {$offset};";
    $items = $pdo->query($sql);
    return $items;
}

function search($pdo, $params, $limit = 20, $offset = 0)
{
    $sql = "SELECT * FROM items";
    $conditions = [];
    if ($params['keyword']) $conditions[] = "name LIKE '%{$params['keyword']}%'";
    if ($params['code']) $conditions[] = "code LIKE '%{$params['code']}%'";
    if ($conditions) {
        $condition = implode(' AND ', $conditions);
        $sql .= " WHERE {$condition}";
    }
    $sql .= " LIMIT {$limit} OFFSET {$offset};";
    $items = $pdo->query($sql);
    return $items;
}

function check($posts)
{
    if (empty($posts)) return;
    foreach ($posts as $column => $post) {
        $posts[$column] = htmlspecialchars($post, ENT_QUOTES);
    }
    return $posts;
}

if (isset($_GET['keyword']) || isset($_GET['code'])) {
    $params = check($_GET);
    $items = search($pdo, $params);
} else {
    $items = all($pdo);
}

$template = 'views/admin_item/list.view.php';
include 'views/layouts/app.view.php';
?>