<?php
require_once __DIR__.'/../config.php';
require_once 'app/app.php';
require_once 'app/controllers/AdminController.php';

$controller = new AdminController();
$controller->login();
?>