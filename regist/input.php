<?php
session_start();
$member = [
    'name' => '',
    'email' => '',
    'password' => '',
    'gender' => 'male',
];

if (isset($_SESSION['posts'])) {
    $member = $_SESSION['posts'];
}
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

function checked($value, $target)
{
    if ($value == $target) {
        return 'checked';
    }
}

function selected($value, $target)
{
    if ($value == $target) {
        return 'selected';
    }
}

$template = 'views/regist/input.view.php';
include 'views/layouts/app.view.php';
?>