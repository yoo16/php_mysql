<?php
require_once "../app.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit;
}

$post = $_POST;
var_dump($post);
