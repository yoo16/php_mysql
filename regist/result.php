<?php
session_start();
if (isset($_SESSION['posts'])) {
    unset($_SESSION['posts']);
} else {
    header('Location: input.php');
}

$template = 'views/regist/result.view.php';
include 'views/layouts/app.view.php';
?>