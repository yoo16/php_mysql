<?php
session_start();

if (!empty($_SESSION['user'])) {
    unset($_SESSION['user']);
}
if (!empty($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}

header('Location: input.php');