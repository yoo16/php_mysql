<?php
session_start();

if (isset($_SESSION['item'])) {
    $item = $_SESSION['item'];
}
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

$template = 'views/admin_item/input.view.php';
include 'views/layouts/app.view.php';
?>