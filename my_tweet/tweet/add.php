<?php
require_once('../app.php');

$auth_user = checkAuth('../login/');
checkPost();

$tweet = new Tweet();
$data = $tweet->check($_POST);
$data['user_id'] = $auth_user['id'];
$tweet->insert($data);
header('Location: ../');
