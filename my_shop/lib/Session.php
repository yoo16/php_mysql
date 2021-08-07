<?php 
class Session {
    public static function start()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            session_regenerate_id(true);
        }
    }

    public static function load($key)
    {
        self::start();
        if (isset($_SESSION[$key])) return $_SESSION[$key];
    }

    public static function save($key, $value)
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function clear($key)
    {
        self::start();
        if (isset($_SESSION[$key])) unset($_SESSION[$key]);
    }
}
?>