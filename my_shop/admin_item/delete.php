<?php
require_once '../app.php';
require_once 'app/controllers/Admin/ItemController.php';

$controller = new ItemController();
$controller->delete();