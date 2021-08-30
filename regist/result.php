<?php
session_start();
if (isset($_SESSION['posts'])) {
    unset($_SESSION['posts']);
} else {
    header('Location: input.php');
}

$template = 'views/regist/input.view.php';
include 'views/layouts/app.view.php';
?>