<?php
class Database
{
    private static ?PDO $pdo = null;

    public static function getInstance(): PDO
    {
        if (self::$pdo === null) {
            $dsn = "mysql:dbname=" . DB_DATABASE . ";host=" . DB_HOST . ";charset=utf8;port=" . DB_PORT;
            try {
                self::$pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (PDOException $e) {
                die("接続失敗: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
