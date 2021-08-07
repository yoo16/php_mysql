<?php
class DB
{
    public $pdo;
    public $db_connection = DB_CONNECTION;
    public $db_name = DB_DATABASE;
    public $db_host = DB_HOST;
    public $db_port = DB_HOST;
    public $db_user = DB_USERNAME;
    public $db_password = DB_PASSWORD;
    public $charset = 'utf8';

    function __construct()
    {
        $dsn = "{$this->db_connection}:";
        $dsn .= "dbname={$this->db_name};";
        $dsn .= "host={$this->db_host};";
        $dsn .= "port={$this->db_port};";
        $dsn .= "charset={$this->charset};";
        try {
            $this->pdo = new PDO($dsn, $this->db_user, $this->db_password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo "接続失敗: " . $e->getMessage();
            exit;
        }
    }

    public function query($sql, $posts = null)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($posts);
        return $stmt;
    }

    public function fetch($sql, $posts = null)
    {
        $stmt = $this->query($sql, $posts);
        if ($stmt) return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}