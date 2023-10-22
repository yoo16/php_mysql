<?php
require_once('../app.php');

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    exit;
}

$auth_user = User::authUser();
if (!$auth_user) {
    header('Location: ../login/');
    exit;
}

$tweet = new Tweet();
$data = $tweet->check($_POST);
$data['user_id'] = $auth_user['id'];
$tweet->insert($data);
header('Location: ../');
