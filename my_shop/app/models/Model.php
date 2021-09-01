<?php
require_once 'database/connect.php';

class Model
{
    public $pdo;
    public $value;
    public $values;

    function __construct()
    {
        $db_connection = DB_CONNECTION;
        $db_name = DB_DATABASE;
        $db_host = DB_HOST;
        $db_port = DB_HOST;
        $db_user = DB_USERNAME;
        $db_password = DB_PASSWORD;

        $dsn = "{$db_connection}:dbname={$db_name};host={$db_host};charset=utf8;port={$db_port}";
        try {
            $this->pdo = new PDO($dsn, $db_user, $db_password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo "接続失敗: " . $e->getMessage();
            exit;
        }
    }

    public function check($posts)
    {
        if (empty($posts)) return;
        foreach ($posts as $column => $post) {
            $posts[$column] = htmlspecialchars($post, ENT_QUOTES);
        }
        return $posts;
    }

    public static function paginate($count, $current_page, $limit = 10, $per_count = 10)
    {
        $page_count = ceil($count / $limit);
        $page_start = $current_page;
        $page_end = $page_start + $per_count - 1;
        if ($page_end > $page_count) {
            $page_end = $page_count;
            $page_start = $page_end - $per_count + 1;
        }
        if ($page_start < 0) $page_start = 1;

        $page_prev = ($current_page <= 1) ? 1 : $current_page - 1;
        $page_next = ($current_page < $page_count) ? $current_page + 1 : $page_count;

        $pages = range($page_start, $page_end);

        $paginate = compact(
            'page_count',
            'page_start',
            'page_end',
            'page_prev',
            'page_next',
            'pages',
        );
        return $paginate;
    }

}
