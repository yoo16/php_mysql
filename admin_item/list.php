<?php
require_once 'models/Item.php';

$item = new Item();

if (isset($_GET['keyword']) || isset($_GET['code'])) {
    $params = $item->check($_GET);
    $items = $item->search($params);
} else {
    $items = $item->all();
}

$template = 'views/admin_item/list.view.php';
include 'views/layouts/app.view.php';
?>