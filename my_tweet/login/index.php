<?php
require_once '../app.php';

if (!empty($_SESSION['login'])) {
    unset($_SESSION['login']);
}
if (!empty($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}

header('Location: input.php');