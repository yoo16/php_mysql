<?php
require_once "../app.php";

if (isset($_SESSION[APP_KEY]['user'])) {
    unset($_SESSION[APP_KEY]['user']);
}

header('Location: ../login/');
