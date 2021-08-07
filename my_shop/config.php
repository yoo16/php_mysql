<?php
define('BASE_DIR', __DIR__ . '/');
set_include_path(get_include_path() . PATH_SEPARATOR . BASE_DIR);

define('DB_CONNECTION', 'mysql');
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'my_shop');

define('ADMIN_LOGIN_NAME', 'admin');
define('ADMIN_PASS', '$2y$10$kWW8LFKan0NpGOvfHA4w1eX4/zrAr7RcTW7Q48kpbQMvo9Z.kQnfC');