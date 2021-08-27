<?php
class DB
{
    public $db_name = DB_NAME;
    public $host = DB_HOST;
    // public $port = DB_PORT;
    public $user = DB_USER;
    public $password = DB_PASS;
    public $dsn;
    public $pdo;
    public $stmt;
    public $data;
    public $table_name;

    function __construct()
    {
        $this->connection();
    }

    function connection()
    {
        $this->dsn = "mysql:dbname={$this->db_name};host={$this->host}";
        try {
            $this->pdo = new PDO($this->dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo "接続失敗: " . $e->getMessage();
            exit;
        }
        return $this->pdo;
    }

    function query($sql, $values = null)
    {
        $this->stmt = $this->pdo->prepare($sql);
        $result = [];
        try {
            $this->stmt->execute($values);
        } catch (PDOException $e) {
            $result['error'] = $sql;
        }
        return $result;
    }

    function fetchRows($sql)
    {
        $this->query($sql);
        if ($this->stmt) {
            // $rows = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $row;
            }
            return ($rows) ? $rows : array();
        } else {
            return false;
        }
    }

    function insertSQL($table_name, $columns)
    {
        $column = implode(',', $columns);
        $param = $this->insertParam($columns);
        $sql = "INSERT INTO {$table_name} ({$column}) VALUES ({$param})";
        return $sql;
    }

    public function bindParams($columns, $posts)
    {
        if (!$columns) return;
        foreach ($columns as $column) {
            if (isset($posts[$column])) {
                $key = ":{$column}";
                $params[$key] = $posts[$column];
            }
        }
        return $params;
    }

    public function insertParam($columns)
    {
        if (!$columns) return;
        $params = [];
        foreach ($columns as $column) {
            $params[] = ":{$column}";
        }
        return implode(',', $params);
    }
}
