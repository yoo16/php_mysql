<?php
require_once 'lib/Model.php';

class Admin extends Model
{
    public $value = [
        'login_name' => ADMIN_LOGIN_NAME,
        'password' => ADMIN_PASS,
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function auth($login_name, $password)
    {
        if ($login_name == ADMIN_LOGIN_NAME) {
            return (password_verify($password, ADMIN_PASS));
        }
    }

}
