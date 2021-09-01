<?php
require_once 'models/Item.php';

$item = new Item();
if (!empty($_GET['id'])) $item->findById($_GET['id']);
if (empty($item->value)) header('Location: list.php');

if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

$template = 'views/admin_item/edit.view.php';
include 'views/layouts/app.view.php';
