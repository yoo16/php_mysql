<?php
require_once 'app.php';

if (!isset($_SESSION[APP_KEY]['user'])) {
    header('Location: login/input.php');
    exit;
} else {
    header('Location: home/');
    exit;
}
