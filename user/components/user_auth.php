<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
if (empty($user)) {
    header('Location: login.php');
}