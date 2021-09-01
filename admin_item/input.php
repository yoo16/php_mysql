<?php
require_once 'models/Item.php';

session_start();

$item = new Item();

if (isset($_SESSION['item'])) {
    $item->value = $_SESSION['item'];
}
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

$template = 'views/admin_item/input.view.php';
include 'views/layouts/app.view.php';
?>