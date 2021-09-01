<?php
require_once '../app.php';
require_once 'app/controllers/Admin/UserController.php';

$controller = new UserController();
$controller->index();