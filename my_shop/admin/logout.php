<?php
require_once __DIR__.'/../config.php';
require_once 'app/app.php';

$controller = new AdminController();
$controller->logout();