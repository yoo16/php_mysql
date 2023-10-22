<?php
function checkAuth($url)
{
    $auth_user = User::authUser();
    if (!$auth_user) {
        header("Location: {$url}");
        exit;
    } else {
        return $auth_user;
    }
}

function checkPost()
{
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        exit;
    }
}
